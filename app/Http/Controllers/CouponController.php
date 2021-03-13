<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateCoupon;
use App\Models\Coupon;

use Illuminate\Http\Request;

class CouponController extends Controller {

    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('start_at', '<=', now())
            ->where('expire_at', '>=', now())
            ->first();

        if ( ! $coupon) {
            return redirect()->route('cart.index')->withErrors(__('shop.invalid_coupon_code_try_again'));
        }

        dispatch_now(new UpdateCoupon($coupon));

        return redirect()->route('cart.index')->with('success_message', __('shop.coupon_has_been_applied').' ( '.$coupon->code .' )');

    }

    public function destroy()
    {
        session()->forget('coupon');

        return redirect()->route('cart.index')->with('success_message', __('shop.coupon_has_been_removed'));

    }
}
