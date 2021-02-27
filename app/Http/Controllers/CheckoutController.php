<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderPlaced;
use App\Models\Order;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $order->products()->attach($item->model->id, ['quantity' => $item->qty] );
        }

        return $order;
    }
}
