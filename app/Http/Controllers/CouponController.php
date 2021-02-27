<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateCoupon;
use App\Models\Coupon;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function store(Request $request)
    {
       $coupon = Coupon::where('code', $request->coupon_code)->first();

       if (!$coupon){
           return redirect()->route('checkout.index')->withErrors('Invalid coupon code, try again!');
       }

        dispatch_now(new UpdateCoupon($coupon));

       return redirect()->route('checkout.index')->with('success_message', 'Coupon('.$coupon->code.') has been applied');

    }


    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->route('checkout.index')->with('success_message', 'Coupon has been removed');

    }
}
