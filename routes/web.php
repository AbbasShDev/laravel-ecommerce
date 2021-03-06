<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChangeLang;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\saveForLaterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'localized'], function () {

    Route::group(['prefix' => 'admin'], function () {
        Voyager::routes();
    });

    Auth::routes();

    Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/switchToSaveForLater/{product}', [CartController::class, 'switchToSaveForLater'])->name('cart.switchToSaveForLater');

    Route::delete('/saveForLater/{product}', [saveForLaterController::class, 'destroy'])->name('saveForLater.destroy');
    Route::post('/saveForLater/switchToCart/{product}', [saveForLaterController::class, 'switchToCart'])->name('saveForLater.switchToCart');

    Route::post('/coupon', [CouponController::class, 'store'])->name('coupon.store');
    Route::delete('/coupon', [CouponController::class, 'destroy'])->name('coupon.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index')->middleware('auth');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');


    Route::get('/guest-checkout', [CheckoutController::class, 'index'])->name('guest-checkout.index');

    Route::get('/thankyou', [ConfirmationController::class, 'index'])->name('confirmation.index');

    Route::get('/search', [ShopController::class, 'search'])->name('search');

    Route::post('/change-lang', ChangeLang::class)->name('change-lang');

    Route::middleware('auth')->group(function () {

        Route::get('/my-profile', [UsersController::class, 'edit'])->name('users.edit');
        Route::patch('/my-profile', [UsersController::class, 'update'])->name('users.update');
        Route::patch('/my-profile/change-password', [UsersController::class, 'updatePassword'])->name('users.updatePassword');
        Route::patch('/my-profile/change-address', [UsersController::class, 'updateAddress'])->name('users.updateAddress');

        Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');

    });

});
