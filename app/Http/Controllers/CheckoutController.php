<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller {

    public function index()
    {

        if (Cart::instance('default')->count() == 0){
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is(app()->getLocale().'/guest-checkout')){
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
//                    to be changed
                    'content'  => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('coupon'))->toJson()
                ]
            ]);

            Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! your payment has been successfully accepted.');

        } catch (CardErrorException $e) {
            return redirect()->back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    private function getCheckoutNumbers()
    {

        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subtotal() - $discount);
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        return collect([
            'discount'    => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax'      => $newTax,
            'newTotal'    => $newTotal,
        ]);
    }
}
