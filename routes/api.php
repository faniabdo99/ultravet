<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;

Route::post('post-add-newsletter', [NewsletterController::class, 'postNew'])->name('newsletter.postNew');