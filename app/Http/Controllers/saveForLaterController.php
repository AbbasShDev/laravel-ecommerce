<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class saveForLaterController extends Controller
{
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return redirect()->back()->with('success_message', __('shop.item_has_been_removed_from_saved_for_later'));
    }

    public function switchToCart($id)
    {
        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($item) {
            return  $cartItem->id === $item->id;
        });

        if ($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('success_message', __('shop.item_is_already_in_your_cart'));
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success_message',  '('.$item->model->getTranslatedAttribute('name') . ') ' . __('shop.has_been_moved_to_cart'));
    }
}
