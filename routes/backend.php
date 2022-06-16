<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CategorySectionController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeOptionController;
use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'Backend.pages.dashboard.dashboard-page');

Route::resource('colors', ColorController::class);

Route::resource('brands', BrandController::class);

Route::resource('sizeOptions', SizeOptionController::class);


Route::resource('categories', CategoryController::class);

Route::resource('categories/sections', CategorySectionController::class);

Route::resource('products', ProductController::class);