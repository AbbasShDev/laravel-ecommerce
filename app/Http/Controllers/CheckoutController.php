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
use Illuminate\Support\Facades\App;
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
        $paymentQuery = request()->query('payment');

        if ($paymentQuery && $paymentQuery != 'credit-debit') {
            return redirect()->route('checkout.index');
        }

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

        if ($this->productsNotAvailable()) {
            return redirect()->back()->withErrors(__('checkout.sorry_items_not_available'));
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

            return redirect()->route('confirmation.index')->with('success_message', __('checkout.payment_successfully_accepted'));

        } catch (CardErrorException $e) {

            $this->addToOrdersTable($request, $e->getMessage());

            return redirect()->back()->withInput()->withErrors(__('checkout.error') . $e->getMessage());
        }
    }

    public function paypalCreate(Request $request)
    {

        if ($this->productsNotAvailable()) {
            $errorMessage = __('checkout.sorry_items_not_available');

            return session()->flash('errors', collect([$errorMessage]));
        }


        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(config('paypal.paypal_key'), config('paypal.paypal_secret'),)
        );

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $itemsAry = [];
        //insert into pivot table
        foreach (Cart::content() as $item) {
            $setItem = new Item();
            $setItem->setName($item->name)
                ->setCurrency('USD')
                ->setQuantity(intval($item->qty))
                ->setSku(strval($item->id)) // Similar to `item_number` in Classic API
                ->setPrice($item->price / 100);
            $itemsAry[] = $setItem;
        }

        if (getCheckoutNumbers()->get('discount') > 0) {
            $itemTmp = new Item();
            $itemTmp->setName('Discount')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice(-getCheckoutNumbers()->get('discount') / 100);
            $itemsAry[] = $itemTmp;
        }


        $itemList = new ItemList();
        $itemList->setItems($itemsAry);

        $details = new Details();
        $details->setTax(round(getCheckoutNumbers()->get('newTax') / 100, 2))
            ->setSubtotal(round(getCheckoutNumbers()->get('newSubtotal') / 100, 2));

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(round(getCheckoutNumbers()->get('newTotal') / 100, 2))
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('checkout.index'))
            ->setCancelUrl(route('checkout.index'));

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


        try {

            $result = $payment->execute($execution, $apiContext);

            //Decrease products' quantities
            $this->decreaseQuantities();

            //insert into orders
            $order = Order::create([
                'user_id'               => auth()->user() ? auth()->user()->id : null,
                'billing_discount'      => getCheckoutNumbers()->get('discount'),
                'billing_discount_code' => getCheckoutNumbers()->get('discountCode'),
                'billing_subtotal'      => getCheckoutNumbers()->get('newSubtotal'),
                'billing_tax'           => getCheckoutNumbers()->get('newTax'),
                'billing_total'         => getCheckoutNumbers()->get('newTotal'),
                'payment_gateway'       => 'paypal',
                'error'                 => null,
            ]);

            //insert into pivot table
            foreach (Cart::content() as $item) {
                $order->products()->attach($item->model->id, ['quantity' => $item->qty]);
            }
            Cart::instance('default')->destroy();
            session()->forget('coupon');

            //Mail::send(new OrderPlaced($order));

            session()->flash('success_message', __('checkout.payment_successfully_accepted'));

        } catch (Exception $ex) {

            //insert into orders
            $order = Order::create([
                'user_id'               => auth()->user() ? auth()->user()->id : null,
                'billing_discount'      => getCheckoutNumbers()->get('discount'),
                'billing_discount_code' => getCheckoutNumbers()->get('discountCode'),
                'billing_subtotal'      => getCheckoutNumbers()->get('newSubtotal'),
                'billing_tax'           => getCheckoutNumbers()->get('newTax'),
                'billing_total'         => getCheckoutNumbers()->get('newTotal'),
                'payment_gateway'       => 'paypal',
                'error'                 => $ex->getMessage(),
            ]);
            session()->flash('errors', collect([__('checkout.error') . $ex->getMessage()]));

        }

        return $result;

    }


    protected function addToOrdersTable($request, $error = null)
    {

        //insert into orders
        $order = Order::create([
            'user_id'               => auth()->user()->id ?? null,
            'billing_email'         => $request->email,
            'billing_name'          => $request->name,
            'billing_address'       => $request->address,
            'billing_city'          => $request->city,
            'billing_province'      => $request->province,
            'billing_postalcode'    => $request->postalcode,
            'billing_phone'         => $request->phone,
            'billing_name_on_card'  => $request->name_on_card,
            'shipping_address'      => auth()->user()->shipping_address ?? null,
            'shipping_city'         => auth()->user()->shipping_city ?? null,
            'shipping_province'     => auth()->user()->shipping_province ?? null,
            'shipping_postalcode'   => auth()->user()->shipping_postalcode ?? null,
            'shipping_phone'        => auth()->user()->shipping_phone ?? null,
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

            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }

}
