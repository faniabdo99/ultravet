<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller {

    public function getAll() {
        $CartHasCoupon = false;
        $AppliedCoupon = null;
        $CouponDiscount = 0;
        $Cart = Cart::where('user_id', getUserId())->where('status', 'active')->get();
        $CartSubTotalArray = $Cart->map(function ($item) {
            if (!$item->Product->trashed() && $item->Product->slug != 'deleted-product' && $item->Product->CartReady) {
                if ($item->Product->status == 'available') {
                    return $item->Product->finalPrice * $item->qty;
                } else {
                    return 0;
                }
            } else {
                $item->delete();
            }
        });
        $SubTotal = $CartSubTotalArray->sum();
        //Check id there is a coupon code applied
        if (isset($Cart->first()->applied_coupon)) {
            //There is an applied coupon
            $CartHasCoupon = true;
            $AppliedCoupon = $Cart->first()->applied_coupon;
            $CouponData = explode('-', $Cart->first()->coupon_amount);
            if ($CouponData[1] == 'fixed') {
                $CouponDiscount = $CouponData[0];
            } elseif ($CouponData[1] == 'percent') {
                $CouponDiscount = ($SubTotal * $CouponData[0]) / 100;
            } else {
                $CouponDiscount = $CouponData[0];
            }
        }
        $Total = ($CartSubTotalArray->sum()) - $CouponDiscount;
        return view('order.cart', compact('Cart', 'Total', 'CartHasCoupon', 'AppliedCoupon', 'CouponDiscount', 'SubTotal'));
    }

    public function addToCart(Request $r) {
        /*
            Add an Item to Cart
            #1 Check if the requested data available in inventory
            #2 Check if the item already exist, if so add to the current value
        */
        $r->qty = ($r->qty) ? intval($r->qty) : 1;
        //Validate the Request
        $Rules = [
            'user_id' => 'required',
            'product_id' => 'required|numeric'
        ];
        $Validator = Validator::make($r->all(), $Rules);
        if ($Validator->fails()) {
            return response('Something went wrong, Please refresh the page and try again', 400);
        } else {
            //Check if the product is available in inventory
            $TheProduct = Product::find($r->product_id);
            if ($TheProduct) {
                if ($TheProduct->CartReady && $TheProduct->qty >= $r->qty) {
                    // Decrease the product count
                    $TheProduct->decrement('qty', $r->qty);
                    // Add the item to the cart (or update existing cart).
                    if(!isInUserCart($r->user_id, $TheProduct->id) || count($r->all()) > 3){
                        // Create new cart item
                        Cart::create([
                            'product_id' => $TheProduct->id,
                            'user_id' => $r->user_id,
                            'status' => 'active',
                            'product_variations' => (count($r->all()) > 3) ? serialize($r->all()) : null,
                            'qty' => $r->qty
                        ]);
                    }else{
                        // Update cart record
                        $TheCartItem = Cart::where('user_id',$r->user_id)->where('product_id' , $TheProduct->id)->where('status' , 'active')->first();
                        $TheCartItem->increment('qty', $r->qty);
                    }
                    // Return the response
                    return response('Item added to your cart!', 200);
                } else {
                    return response('This amount is not available for sale right now', 400);
                }
            } else {
                return response('This product is not available for sale right now', 400);
            }
        }
    }

    public function addOneQty(Request $r){
        // Check if the item_id is there
        $TheCartItem = Cart::find($r->item_id);
        if(!$TheCartItem){
            return response('There is no such cart item!', 404);
        }
        // Ensure the product has enough qty
        $TheProduct = $TheCartItem->Product;
        if($TheProduct->qty <= 0){
            // Deny the request
            return response('This is the last item in stock!', 400);
        }
        // Update the item_id record
        $TheCartItem->increment('qty' , 1);
        $TheProduct->decrement('qty' , 1);
        // Return a success
        return response($TheCartItem, 200);
    }

    public function removeOneQty(Request $r){
        // Check if the item_id is there
        $TheCartItem = Cart::find($r->item_id);
        if(!$TheCartItem){
            return response('There is no such cart item!', 404);
        }
        if($TheCartItem->qty == 0){
            return response('You already have 0 items in your cart!', 400);
        }
        // Fetch the product
        $TheProduct = $TheCartItem->Product;
        // Update the item_id record
        $TheCartItem->decrement('qty' , 1);
        $TheProduct->increment('qty' , 1);
        // Return a success
        return response($TheCartItem, 200);
    }

    public function fetchCartTotal(Request $r){
        if(!$r->hasHeader('Auth')){
            return response('User authentication is not valid!', 403);
        }
        // Get the user cart by the user id
        $TheCart = Cart::where('user_id' , $r->header('Auth'))->where('status' , 'active')->get();
        $CartSubTotalArray = $TheCart->map(function ($item) {
            if ($item->Product != null) {
                if ($item->Product->status == 'available') {
                    return $item->Product->finalPrice * $item->qty;
                } else {
                    return 0;
                }
            } else {
                $item->delete();
            }
        });
        return response(['total' => convertCurrency($CartSubTotalArray->sum(), session()->get('currency'))], 200);
    }

    public function fetchLatestCart(Request $r){
        if(!$r->hasHeader('Auth')){
            return response('User authentication is not valid!', 403);
        }
        // Get the user cart by the user id
        $TheCart = Cart::where('user_id' , $r->header('Auth'))->where('status' , 'active')->get();
        $ClearedCart = $TheCart->map(function ($item) {
            if ($item->Product != null) {
                if ($item->Product->status == 'available') {
                    return $item;
                } else {
                    return 0;
                }
            } else {
                $item->delete();
            }
        });
        return response($ClearedCart, 200);
    }
    public function delete(Request $r) {
        $TheCart = Cart::findOrFail($r->cart_id);
        //Make the item available again
        $TheCart->Product->increment('qty', $TheCart->qty);
        $TheCart->Product->update(['status' => 'available']);
        //Remove the item from cart
        $TheCart->update([
            'status' => 'deleted'
        ]);
        return response('Item deleted successfully', 200);
    }
}
