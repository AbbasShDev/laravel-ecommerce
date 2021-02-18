<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('checkout');
    }


    public function create()
    {
        //
    }


    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function ($item){
            return $item->model->slug.','.$item->qty;
        })->values()->toJson();

        try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::total() / 100,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' =>$request->email,
                'metadata' => [
//                    to be changed
                    'content' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ]
            ]);

            Cart::instance('default')->destroy();

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! your payment has been successfully accepted.');

        }catch (CardErrorException $e){
            return redirect()->back()->withErrors('Error! '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
