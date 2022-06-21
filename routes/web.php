<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ShopPageController;
use App\Http\Controllers\Frontend\CheckoutPageController;

use App\Http\Controllers\Frontend\ProductDetailPageController;

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

Auth::routes();

Route::get('/', [HomePageController::class, 'index'])->name('homePage');

Route::get('/shop/{category_slug}', [ShopPageController::class, 'index'])->name('shopPage');

Route::get('/product-detail/{product_slug}', [ProductDetailPageController::class, 'index'])->name('productDetailPage');