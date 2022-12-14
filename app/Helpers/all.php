<?php

use App\Models\Cart;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Setting;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Cookie;
function getBrands($featured = false) {
    if($featured){
        $Brands = Brand::featured()->get();
    }else{
        $Brands = Brand::all();
    }
    return $Brands;
}
function getFeaturedProducts(){
    return Product::featured()->latest()->get();
}
function getUserId(){
    if(auth()->check()){
        return auth()->user()->id;
    }else{
        if(!Cookie::has('guest_id')){
            Cookie::queue(Cookie::make('guest_id', md5(rand(1,500))));
        }
        //Get the cookie value
        return Cookie::get('guest_id');
    }
}
function getCurrency(){
    if(session()->has('currency')){
        if(session()->get('currency') == 'USD'){
            $CurrencySymbol = '$';
            $CurrencyCode = 'USD';
        }elseif(session()->get('currency') == 'LBP'){
            $CurrencySymbol = ' L.L';
            $CurrencyCode = 'LBP';
        }
    }else{
        session(['currency' => 'USD']);
        $CurrencySymbol = '$';
        $CurrencyCode = 'USD';
    }
    return ['symbol' => $CurrencySymbol,'code' => $CurrencyCode];
}
function isInUserCart($user_id , $product_id){
    $TheItem = Cart::where('user_id',$user_id)->where('product_id' , $product_id)->where('status' , 'active')->first();
    if($TheItem){
        return true;
    }else{
        return false;
    }
}
function isInUserWishlist($user_id , $product_id){
    $TheItem = Wishlist::where('user_id',$user_id)->where('product_id' , $product_id)->first();
    if($TheItem){
        return true;
    }else{
        return false;
    }
}
function userCart($user_id, $limit = null){
    if ($limit){
        return Cart::where('user_id',$user_id)->where('status' , 'active')->limit($limit)->get();
    }else{
        return Cart::where('user_id',$user_id)->where('status' , 'active')->get();
    }
}
function getCartTotal(){
    $Cart = Cart::where('user_id' , getUserId())->where('status' , 'active')->get();
    $CartSubTotalArray = $Cart->map(function($item) {
        if($item->Product != null){
            if($item->Product->status == 'available'){
                return $item->Product->finalPrice * $item->qty;
            }else{
                return 0;
            }
        }else{
            $item->delete();
        }
    });
    return $CartSubTotalArray->sum();
}
function getExchangeRate(){
    return Setting::first()->lb_usd_exchange_rate ?? 150;
}
function convertCurrency($amount , $to){
    if($to == 'usd'){
        return $amount;
    }else{
        return number_format(round(intval($amount) * getExchangeRate() , 3));
    }
}
function getCurrencySymbol($currency){
    if ($currency == 'lbp') {
        return ' L.L';
    }else{
        return '$';
    }
}
function getSystemSettings(string $attribute){
    return Setting::first()->$attribute;
}
