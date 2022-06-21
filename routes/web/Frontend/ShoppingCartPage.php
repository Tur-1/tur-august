<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ShoppingCartPageController;
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



Route::middleware('auth')->controller(ShoppingCartPageController::class)->group(function () {

    Route::get('/cart', 'index')->name('shoppingCartPage');

    Route::post('/add-to-cart', 'addToShoppingCart')->name('addToShoppingCart');
});