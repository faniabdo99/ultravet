<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller{
    //Non-Admin Methods
    public function applyCoupon(Request $r){
        //Check if the user is logged in ...
        $UserId = getUserId();
        $CouponCode = $r->coupuon_code;

        //Get the Coupon
        $TheCoupon = Coupon::where('title', $CouponCode)->where('amount', '>', '0')->where('active', 1)->first();
        if (!$TheCoupon) {
            return back()->withErrors('This Coupon Code is Invalid !');
        }
        //Apply The Discount
        $UserCart = Cart::where('user_id', $UserId)->where('status', 'active')->get();
        if (isset($UserCart->first()->applied_coupon)) {
            return back()->withErrors('You Already Using a Coupon!');
        }
        $CartSubTotalArray = $UserCart->map(function ($item) {
            return ($item->Product->final_price);
        });
        if ($UserCart->count() > 0) {
            //Check if coupon is bigger than the actual cart
            if ($TheCoupon->type == 'fixed') {
                if ($CartSubTotalArray->sum() < $TheCoupon->value) {
                    return back()->withErrors('The coupon discount is more than your cart total!');
                }
            }
            $UserCart->map(function ($item) use ($TheCoupon) {
                $item->update([
                    'applied_coupon' => $TheCoupon->title,
                    'coupon_amount'  => $TheCoupon->value . '-' . $TheCoupon->type
                ]);
            });
            //Decrease The Coupon Amount By One
            $TheCoupon->decrement('amount' , 1);
            return back()->withSuccess('The coupon ' . $TheCoupon->title . ' Applied successfully');
        } else {
            return back()->withErrors('You don\'t have anything in your cart!');
        }
    }
}
