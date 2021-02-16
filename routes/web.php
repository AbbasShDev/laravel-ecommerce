<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::prefix(app()->getLocale())->group(function (){

    Route::view('/', 'main');
    Route::view('/products', 'products');
    Route::view('/product', 'product');
    Route::view('/cart', 'cart');
    Route::view('/checkout', 'checkout');
    Route::view('/thankyou', 'thankyou');
});
