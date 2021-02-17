<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\saveForLaterController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => app()->getLocale()], function (){

    Route::get('/',[LandingPageController::class, 'index'])->name('landing-page');

    Route::get('/shop',[ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/{product}',[ShopController::class, 'show'])->name('shop.show');

    Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}',[CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product}',[CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/switchToSaveForLater/{product}',[CartController::class, 'switchToSaveForLater'])->name('cart.switchToSaveForLater');

    Route::delete('/saveForLater/{product}',[saveForLaterController::class, 'destroy'])->name('saveForLater.destroy');
    Route::post('/saveForLater/switchToCart/{product}',[saveForLaterController::class, 'switchToCart'])->name('saveForLater.switchToCart');


    //Route::view('/products', 'products');
//    Route::view('/product', 'product');
//    Route::view('/cart', 'cart');
//    Route::view('/checkout', 'checkout');
//    Route::view('/thankyou', 'thankyou');
});
