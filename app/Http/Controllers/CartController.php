<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller{
    public function getAll(){
        $CartHasCoupon = false;
        $AppliedCoupon = null;
        $CouponDiscount = null;
        $OfferDiscount = null;
        $Cart = Cart::where('user_id' , getUserId())->where('status' , 'active')->get();
        $CartSubTotalArray = $Cart->map(function($item) {
            if($item->Product != null){
                if($item->Product->status == 'Available'){
                    return $item->Product->finalPrice;
                }else{
                    return 0;
                }
            }else{
                $item->delete();
            }
        });
        $SubTotal = $CartSubTotalArray->sum();
        //Check id there is a coupon code applied
        if(isset($Cart->first()->applied_coupon)){//There is an applied coupon
            $CartHasCoupon = true;
            $AppliedCoupon = $Cart->first()->applied_coupon;
            $CouponData = explode('-',$Cart->first()->coupon_amount);
            if($CouponData[1] == 'fixed'){
                $CouponDiscount = $CouponData[0];
            }elseif($CouponData[1] == 'percent'){
                $CouponDiscount = ($Total * $CouponData[0]) / 100;
            }else{
                $CouponDiscount = $CouponData[0];
            }
        }
        $Total = ($CartSubTotalArray->sum()) - $CouponDiscount;
        return view('order.cart',compact('Cart' ,'Total' ,'CartHasCoupon' ,'AppliedCoupon','CouponDiscount','SubTotal'));
    }
    public function addToCart(Request $r){
        /*
            Add an Item to Cart
            #1 Check if the requested data available in inventory
            #2 Check if the item already exist, if so add to the current value
        */
        //Validate the Request
        $Rules = [
            'user_id' => 'required',
            'product_id' => 'required|numeric'
        ];
        $Validator = Validator::make($r->all() , $Rules);
        if($Validator->fails()){
            return response('Something went wrong, Please refresh the page and try again' , 400);
        }else{
            //Check if the product is available in inventory
            $Inventory = Product::find($r->product_id);
            if($Inventory){
                if($Inventory->CartReady){
                    //Create Cart Data
                    $CartData = $r->all();
                    $CartData['product_id'] = $Inventory->id;
                    Cart::create($CartData);
                    return response('Item added to your cart!' , 200);
                }else{
                    return response('This product is not available for sale right now' , 400);
                }
            }else{
                return response('This product is not available for sale right now' , 400);
            }
        }
    }
    public function delete(Request $r){
        $TheCart = Cart::findOrFail($r->cart_id);
        //Make the item available again
        $TheCart->Product->update([
            'status' => 'Available'
        ]);
        //Remove the item from cart
        $TheCart->update([
            'status' => 'deleted'
        ]);
        return response('Item deleted successfully' , 200);
    }
}
