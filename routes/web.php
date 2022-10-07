<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

//Authentication System
Route::middleware('guest')->group(function(){
    Route::get('signup' , [UserController::class, 'getSignup'])->name('user.getSignup');
    Route::post('signup' , [UserController::class, 'postSignup'])->name('user.postSignup');
    Route::get('login' , [UserController::class, 'getLogin'])->name('user.getLogin');
    Route::post('login' , [UserController::class, 'postLogin'])->name('user.postLogin');
});
Route::middleware('auth')->group(function(){
    Route::get('logout' , [UserController::class, 'logout'])->name('user.logout');
});
Route::get('about' , [PageController::class, 'getAbout'])->name('about');
Route::get('contact' , [ContactController::class, 'getContact'])->name('getContact');
Route::post('contact' , [ContactController::class, 'postContact'])->name('postContact');