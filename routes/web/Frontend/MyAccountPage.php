<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\MyAccountPageController;
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



Route::middleware('auth')->controller(MyAccountPageController::class)->group(function () {

    Route::get('/my-account',  'index')->name('myAccountPage');
    Route::post('/my-account/update-info', 'updateAccountInformation')->name('updateAccountInformation');
    Route::post('/my-account/update-phone-number',  'updateAccountPhoneNumber')->name('updateAccountPhoneNumber');
    Route::post('/my-account/update-password',  'updateAccountPassword')->name('updateAccountPassword');
});