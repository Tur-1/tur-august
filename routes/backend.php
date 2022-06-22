<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SizeOptionController;
use App\Http\Controllers\Backend\OrderStatusController;
use App\Http\Controllers\Backend\CategorySectionController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductReviewController;

Route::view('dashboard', 'Backend.pages.dashboard.dashboard-page');

Route::get('customers', [UserController::class, 'customers'])->name('customers');

Route::resource('users', UserController::class);

Route::resource('colors', ColorController::class);

Route::resource('brands', BrandController::class);

Route::resource('sizeOptions', SizeOptionController::class);

Route::resource('categories', CategoryController::class);

Route::resource('categories/sections', CategorySectionController::class);

Route::resource('products', ProductController::class);

Route::resource('order/status', OrderStatusController::class)->parameters(['status' => 'orderStatus']);

Route::resource('coupons', CouponController::class);

Route::post('reply/{review_id}', [ProductReviewController::class, 'reply'])->name('reviews.reply');
Route::resource('reviews', ProductReviewController::class);