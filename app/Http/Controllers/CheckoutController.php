<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
            'discount'    => $this->getCheckoutNumbers()->get('discount'),
            'newSubtotal' => $this->getCheckoutNumbers()->get('newSubtotal'),
            'newTax'      => $this->getCheckoutNumbers()->get('newTax'),
            'newTotal'    => $this->getCheckoutNumbers()->get('newTotal'),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug . ',' . $item->qty;
        })->values()->toJson();

        try {
            $charge = Stripe::charges()->create([
                'amount'        => $this->getCheckoutNumbers()->get('newTotal') / 100,
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


            $this->addToOrdersTable($request);
            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! your payment has been successfully accepted.');

        } catch (CardErrorException $e) {

            $this->addToOrdersTable($request, $e->getMessage());

            return redirect()->back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    private function getCheckoutNumbers()
    {

        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $discountCode = session()->get('coupon')['name'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        return collect([
            'discount'     => $discount,
            'discountCode' => $discountCode,
            'newSubtotal'  => $newSubtotal,
            'newTax'       => $newTax,
            'newTotal'     => $newTotal,
        ]);
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
            'billing_discount'      => $this->getCheckoutNumbers()->get('discount'),
            'billing_discount_code' => $this->getCheckoutNumbers()->get('discountCode'),
            'billing_subtotal'      => $this->getCheckoutNumbers()->get('newSubtotal'),
            'billing_tax'           => $this->getCheckoutNumbers()->get('newTax'),
            'billing_total'         => $this->getCheckoutNumbers()->get('newTotal'),
            'error'                 => $error,
        ]);

        //insert into pivot table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id'   => $order->id,
                'product_id' => $item->model->id,
                'quantity'   => $item->qty,
            ]);
        }

    }
}
