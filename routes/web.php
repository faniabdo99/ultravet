<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
Route::get('/', function () {
    return view('index');
})->name('home');
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
});
Route::get('activate/{id}/{hash}' , [UserController::class, 'activate'])->name('user.activate');


Route::get('about' , [PageController::class, 'getAbout'])->name('about');
Route::get('contact' , [ContactController::class, 'getContact'])->name('getContact');
Route::post('contact' , [ContactController::class, 'postContact'])->name('postContact');
