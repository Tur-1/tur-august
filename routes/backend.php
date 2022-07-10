<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Backend\Users\Http\Controllers\UserController;
use App\Modules\Backend\Brands\Http\Controllers\BrandController;
use App\Modules\Backend\Colors\Http\Controllers\ColorController;
use App\Modules\Backend\Orders\Http\Controllers\OrdersController;
use App\Modules\Backend\Banners\Http\Controllers\BannerController;
use App\Modules\Backend\Coupons\Http\Controllers\CouponController;
use App\Modules\Backend\Products\Http\Controllers\ProductController;
use App\Modules\Backend\Categories\Http\Controllers\CategoryController;
use App\Modules\Backend\Dashboard\Http\Controllers\DashboardController;
use App\Modules\Backend\Reviews\Http\Controllers\ProductReviewController;
use App\Modules\Backend\SizeOptions\Http\Controllers\SizeOptionController;
use App\Modules\Backend\OrderStatus\Http\Controllers\OrderStatusController;
use App\Modules\Backend\Categories\Http\Controllers\CategorySectionController;


Route::get('/', function () {
    return redirect()->route('admin.dashboardPage');
});

Route::get('dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboardPage');

Route::get('customers', [UserController::class, 'customers'])->name('customers');

Route::resource('users', UserController::class);

Route::resource('colors', ColorController::class);

Route::resource('brands', BrandController::class);

Route::resource('banners', BannerController::class);

Route::resource('orders', OrdersController::class);

Route::resource('sizeOptions', SizeOptionController::class);

Route::resource('categories', CategoryController::class);

Route::resource('categories/sections', CategorySectionController::class);

Route::resource('products', ProductController::class);

Route::resource('order/status', OrderStatusController::class)->parameters(['status' => 'orderStatus']);

Route::resource('coupons', CouponController::class);

Route::post('reply/{review_id}', [ProductReviewController::class, 'reply'])->name('reviews.reply');
Route::resource('reviews', ProductReviewController::class);