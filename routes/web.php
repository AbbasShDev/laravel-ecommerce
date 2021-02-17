<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => app()->getLocale()], function (){

    Route::get('/',[LandingPageController::class, 'index'])->name('landing-page');

    Route::get('/shop',[ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/{product}',[ShopController::class, 'show'])->name('shop.show');

    //Route::view('/products', 'products');
    Route::view('/product', 'product');
    Route::view('/cart', 'cart');
    Route::view('/checkout', 'checkout');
    Route::view('/thankyou', 'thankyou');
});
