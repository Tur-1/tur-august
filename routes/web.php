<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialLoginController;


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

Route::middleware('guest')->controller(SocialLoginController::class)->group(function () {

    // github
    Route::get('sign-in/github', 'github')->name('social.github');
    Route::get('sign-in/github/redirect', 'githubRedirect')->name('social.github.redirect');

    // google
    Route::get('sign-in/google', 'google')->name('social.google');
    Route::get('sign-in/google/redirect', 'googleRedirect')->name('social.google.redirect');
});