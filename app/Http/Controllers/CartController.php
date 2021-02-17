<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $mightAlsoLike = Product::inRandomOrder()->take(4)->get();

        return view('cart', compact('mightAlsoLike'));
    }


    public function store(Product $product)
    {

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
           return  $cartItem->id === $product->id;
        });

        if ($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        }

        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success_message',  $product->name.' added to cart successfully');
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
            return  $cartItem->id === $item->id;
        });

        if ($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', 'Item is already saved for later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success_message',  $item->name.' has been saved for later');
    }
}
