<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\saveForLaterController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => app()->getLocale()], function (){

    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });

    Auth::routes();

    Route::get('/home',function (){
        return view('home');
    });

    Route::get('/',[LandingPageController::class, 'index'])->name('landing-page');

    Route::get('/shop',[ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/{product}',[ShopController::class, 'show'])->name('shop.show');

    Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}',[CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{product}',[CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{product}',[CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/switchToSaveForLater/{product}',[CartController::class, 'switchToSaveForLater'])->name('cart.switchToSaveForLater');

    Route::delete('/saveForLater/{product}',[saveForLaterController::class, 'destroy'])->name('saveForLater.destroy');
    Route::post('/saveForLater/switchToCart/{product}',[saveForLaterController::class, 'switchToCart'])->name('saveForLater.switchToCart');

    Route::post('/coupon', [CouponController::class,'store'])->name('coupon.store');
    Route::delete('/coupon', [CouponController::class,'destroy'])->name('coupon.destroy');

    Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout',[CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/thankyou',[ConfirmationController::class, 'index'])->name('confirmation.index');


//    Route::view('/thankyou', 'thankyou');
});

