<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function presentPrice($price)
{
    return '$' . round($price / 100, 2);
}

function presentImage($path)
{
    return $path ? asset('storage/' . $path) : asset('img/not-found-product.png');
}

function getCheckoutNumbers()
{

    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $discountCode = session()->get('coupon')['name'] ?? 0;
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
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

function getStockLevel($quantity)
{

    if ($quantity >= setting('site.stock_threshold')) {
        $stockLevel = "<div class='badge badge-success'>In stock</div>";
    } elseif ($quantity < setting('site.stock_threshold') && $quantity > 0) {
        $stockLevel = "<div class='badge badge-warning'>Low stock</div>";
    } else {
        $stockLevel = "<div class='badge badge-secondary'>Not available</div>";
    }

    return $stockLevel;
}
