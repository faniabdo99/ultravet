<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
// Helpers & Utilities
Route::get('switch-currency', [SettingController::class , 'getSwitchCurrency'] )->name('switchCurrency.get');
Route::get('/', [HomeController::class, 'getHome'])->name('home');
Route::get('sitemap.xml' , [SitemapController::class, 'getSitemap']);
//Authentication System
Route::middleware('guest')->group(function(){
    //User must be a guest (not logged-in) to view these routes
    Route::get('signup' , [UserController::class, 'getSignup'])->name('user.getSignup');
    Route::post('signup' , [UserController::class, 'postSignup'])->name('user.postSignup');
    Route::get('login' , [UserController::class, 'getLogin'])->name('user.getLogin');
    Route::post('login' , [UserController::class, 'postLogin'])->name('user.postLogin');
    Route::get('social-login/{driver}' , [UserController::class, 'redirectToProvider'])->name('user.socialLogin');
    Route::get('callback/{driver}' , [UserController::class, 'providerCallback']);
    Route::get('reset-password' , [UserController::class, 'getReset'])->name('user.getReset');
    Route::post('reset-password' , [UserController::class, 'postReset'])->name('user.postReset');
    Route::get('set-password/{id}/{hash}', [UserController::class, 'getSetPassword'])->name('user.getSetPassword');
    Route::post('set-password/{id}/{hash}', [UserController::class, 'postSetPassword'])->name('user.postSetPassword');
});
Route::middleware('auth')->group(function(){
    //User must be logged-in to view these routes
    Route::get('logout' , [UserController::class, 'logout'])->name('user.logout');
    Route::get('wishlist', [UserController::class, 'getWishlist'])->name('user.wishlist');
    Route::get('orders' , [UserController::class, 'getOrders'])->name('user.orders');
    Route::get('import-excel', [ImportController::class, 'getImportPage']);
    Route::post('import-excel', [ImportController::class, 'postImportPage'])->name('postImport');
});
Route::get('activate/{id}/{hash}' , [UserController::class, 'activate'])->name('user.activate');

Route::prefix('blog')->group(function(){
    Route::get('/' , [ArticleController::class, 'getBlog'])->name('blog');
    Route::get('/{slug}/{id}' , [ArticleController::class, 'getSingle'])->name('blog.single');
});
Route::prefix('products')->group(function(){
    Route::get('/' , [ProductController::class, 'getAll'])->name('product.all');
    Route::get('{slug}/{id}' , [ProductController::class, 'getSingle'])->name('product.single');
});
Route::get('about' , [PageController::class, 'getAbout'])->name('about');
Route::get('faq' , [PageController::class, 'getFaq'])->name('faq');
Route::get('contact' , [ContactController::class, 'getContact'])->name('getContact');
Route::post('contact' , [ContactController::class, 'postContact'])->name('postContact');
Route::get('terms-and-conditions', [PageController::class, 'getToc'])->name('toc');
Route::prefix('order')->group(function(){
    Route::get('cart' , [CartController::class, 'getAll'])->name('cart.all');
    Route::get('checkout' , [CheckoutController::class, 'getCheckout'])->name('checkout.get');
    Route::post('checkout' , [CheckoutController::class, 'postCheckout'])->name('checkout.post');
    Route::post('apply-coupon' , [CouponController::class, 'applyCoupon'])->name('checkout.applyCoupon');
    Route::post('update-cart-qty/{id}' , [CartController::class, 'updateCartqty'])->name('cart.updateQty');
});
