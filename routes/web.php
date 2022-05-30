<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'login'], function() {
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::get('/cart/edit/{id}', [CartController::class, 'edit']);
    Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
    Route::post('/cart/save/{id}', [CartController::class, 'save']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/details/{id}', [CartController::class, 'addToCart']);
    Route::get('/details/{id}', [ProductController::class, 'details']);
    Route::get('/logout', [UserController::class, 'logout']);
});
Route::group(['middleware' => 'loggedIn'], function() {
    Route::get('/login', function() {
        return view('signin');
    });
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/signup', [UserController::class, 'index']);
    Route::post('/signup', [UserController::class, 'signup']);
});
Route::get('/products', [ProductController::class, 'index']);
Route::get('/search', [ProductController::class, 'search']);
Route::get('/', function () {
    return view('home');
});
