<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;

Route::post('post-add-newsletter', [NewsletterController::class, 'postNew'])->name('newsletter.postNew');
Route::post('add-item-to-cart' , [CartController::class, 'addToCart'])->name('cart.add');
Route::post('delete-item-from-cart' , [CartController::class, 'delete'])->name('cart.delete');
// Wishlist routes
Route::post('add-to-wishlist', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
// Search
Route::post('search', [ProductController::class, 'postSearch'])->middleware('throttle:100,5')->name('product.search');
// Cart
Route::post('add-one-qty' , [CartController::class, 'addOneQty'])->name('cart.addOneQty');
Route::post('remove-one-qty' , [CartController::class, 'removeOneQty'])->name('cart.removeOneQty');
Route::post('fetch-cart-total' , [CartController::class, 'fetchCartTotal'])->name('cart.fetchTotal');
Route::post('fetch-latest-cart', [CartController::class, 'fetchLatestCart'])->name('cart.fetchLatest');
// Products
Route::post('product-variation/{id}', [ProductController::class, 'getProductVariationData'])->name('product.variation');
