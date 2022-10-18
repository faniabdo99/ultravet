<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CartController;

Route::post('post-add-newsletter', [NewsletterController::class, 'postNew'])->name('newsletter.postNew');
Route::post('add-item-to-cart' , [CartController::class, 'addToCart'])->name('cart.add');
Route::post('delete-item-from-cart' , [CartController::class, 'delete'])->name('cart.delete');
