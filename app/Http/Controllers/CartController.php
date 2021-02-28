<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller {


    public function index()
    {

        $mightAlsoLike = Product::inRandomOrder()->take(4)->get();

        return view('cart', [
            'mightAlsoLike' => $mightAlsoLike,
            'discount'      => getCheckoutNumbers()->get('discount'),
            'newSubtotal'   => getCheckoutNumbers()->get('newSubtotal'),
            'newTax'        => getCheckoutNumbers()->get('newTax'),
            'newTotal'      => getCheckoutNumbers()->get('newTotal'),
        ]);
    }


    public function store(Product $product)
    {

        $maxInCart = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id && $cartItem->qty == 10;
        });

        if ($maxInCart->isNotEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('errors', collect(["Quantity can't be greater than 10"]));
        }

        $isExist = Cart::search(function ($cartItem, $rowId) use ($product) {

            if ($cartItem->id === $product->id && $cartItem->qty < 10) {
                Cart::update($cartItem->rowId, $cartItem->qty + 1);
            }

            return $cartItem->id === $product->id && $cartItem->qty <= 10;
        });


        if ($isExist->isNotEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('success_message', $product->name . ' added to cart successfully');
        }


        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate('App\Models\Product');

        return redirect()
            ->route('cart.index')
            ->with('success_message', $product->name . ' added to cart successfully');
    }

    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|max:10'
        ]);

        $cartItem =Cart::get($id);
        $product = Product::find($cartItem->model->id);

        if ($request->quantity > $product->quantity) {

            session()->flash('errors', collect(['We currently do not have enough items in stock']));

            return response()->json(['success' => false], 400);

        }

        if ($validator->fails()) {

            session()->flash('errors', collect(['Quantity must be between 1 and 10']));

            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity updated successfully!');

        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        Cart::remove($id);

        return redirect()->back()->with('success_message', 'Item has been removed');
    }

    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($item) {
            return $cartItem->id === $item->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already saved for later!');
        }
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success_message', $item->name . ' has been saved for later');
    }
}
