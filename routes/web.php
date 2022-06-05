<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ShopPageController;
use App\Http\Controllers\Frontend\CheckoutPageController;
use App\Http\Controllers\Frontend\WishlistPageController;
use App\Http\Controllers\Frontend\MyAccountPageController;
use App\Http\Controllers\Frontend\ProductDetailPageController;
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

Auth::routes();

Route::get('/', [HomePageController::class, 'index'])->name('homePage');

Route::get('/shop/{category_slug}', [ShopPageController::class, 'index'])->name('shopPage');

Route::get('/product-detail/{product_slug}', [ProductDetailPageController::class, 'index'])->name('productDetailPage');

Route::get('/wishlist', [WishlistPageController::class, 'index'])->name('wishlistPage');

Route::get('/cart', [ShoppingCartPageController::class, 'index'])->name('shoppingCartPage');

Route::post('/add-to-cart', [ShoppingCartPageController::class, 'addToShoppingCart'])->name('addToShoppingCart');

Route::get('/checkout', [CheckoutPageController::class, 'index'])->name('checkoutPage');

Route::get('/my-account', [MyAccountPageController::class, 'index'])->middleware('auth')->name('myAccountPage');