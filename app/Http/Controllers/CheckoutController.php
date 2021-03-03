<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderPlaced;
use App\Models\Order;
use App\Models\Product;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;

class CheckoutController extends Controller {

    public function index()
    {

        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is(app()->getLocale() . '/guest-checkout')) {
            return redirect()->route('checkout.index');
        }

        return view('checkout', [
            'discount'    => getCheckoutNumbers()->get('discount'),
            'newSubtotal' => getCheckoutNumbers()->get('newSubtotal'),
            'newTax'      => getCheckoutNumbers()->get('newTax'),
            'newTotal'    => getCheckoutNumbers()->get('newTotal'),
        ]);
    }


    public function store(CheckoutRequest $request)
    {
        if ($this->productsNotAvailable()){
            return redirect()->back()->withErrors('Sorry! One of the items in your cart is no longer available.');
        }

        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug . ',' . $item->qty;
        })->values()->toJson();

        try {
            $charge = Stripe::charges()->create([
                'amount'        => getCheckoutNumbers()->get('newTotal') / 100,
                'currency'      => 'USD',
                'source'        => $request->stripeToken,
                'description'   => 'Order',
                'receipt_email' => $request->email,
                'metadata'      => [

                    'content'  => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('coupon'))->toJson()
                ]
            ]);


            //Decrease products' quantities
            $this->decreaseQuantities();

            $order = $this->addToOrdersTable($request);
            Cart::instance('default')->destroy();
            session()->forget('coupon');


            Mail::send(new OrderPlaced($order));

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! your payment has been successfully accepted.');

        } catch (CardErrorException $e) {

            $this->addToOrdersTable($request, $e->getMessage());

            return redirect()->back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    public function paypalCreate(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(config('paypal.paypal_key'), config('paypal.paypal_secret'),)
        );

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(2);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));

        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://laravel-paypal-example.test")
            ->setCancelUrl("http://laravel-paypal-example.test");

        // Add NO SHIPPING OPTION
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1);

        $webProfile = new WebProfile();
        $webProfile->setName('test' . uniqid())->setInputFields($inputFields);

        $webProfileId = $webProfile->create($apiContext)->getId();

        $payment = new Payment();
        $payment->setExperienceProfileId($webProfileId); // no shipping
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($apiContext);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }

        return $payment;
    }

    public function paypalExecute(Request $request)
    {

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(config('paypal.paypal_key'), config('paypal.paypal_secret'),)
        );


        $paymentId = $request->paymentID;
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($request->payerID);

        // $transaction = new Transaction();
        // $amount = new Amount();
        // $details = new Details();

        // $details->setShipping(2.2)
        //     ->setTax(1.3)
        //     ->setSubtotal(17.50);

        // $amount->setCurrency('USD');
        // $amount->setTotal(21);
        // $amount->setDetails($details);
        // $transaction->setAmount($amount);

        // $execution->addTransaction($transaction);

        try {
            $result = $payment->execute($execution, $apiContext);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }

        return $result;

    }


    protected function addToOrdersTable($request, $error = null)
    {

        //insert into orders
        $order = Order::create([
            'user_id'               => auth()->user() ? auth()->user()->id : null,
            'billing_email'         => $request->email,
            'billing_name'          => $request->name,
            'billing_address'       => $request->address,
            'billing_city'          => $request->city,
            'billing_province'      => $request->province,
            'billing_postalcode'    => $request->postalcode,
            'billing_phone'         => $request->phone,
            'billing_name_on_card'  => $request->name_on_card,
            'billing_discount'      => getCheckoutNumbers()->get('discount'),
            'billing_discount_code' => getCheckoutNumbers()->get('discountCode'),
            'billing_subtotal'      => getCheckoutNumbers()->get('newSubtotal'),
            'billing_tax'           => getCheckoutNumbers()->get('newTax'),
            'billing_total'         => getCheckoutNumbers()->get('newTotal'),
            'error'                 => $error,
        ]);

        //insert into pivot table
        foreach (Cart::content() as $item) {
            $order->products()->attach($item->model->id, ['quantity' => $item->qty]);
        }

        return $order;
    }

    public function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    public function productsNotAvailable()
    {
        foreach (Cart::content() as $item) {

            $product = Product::find($item->model->id);

            if ($product->quantity < $item->qty){
                return true;
            }
        }
        return false;
    }
}
