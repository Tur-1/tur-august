<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Frontend\Shop\Http\Controllers\ShopPageController;
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


Route::controller(ShopPageController::class)->group(function () {

    Route::get('/shop/{category_slug}', 'index')->name('shopPage');
});
