<?php

namespace App\Providers;

use App\Models\product\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();

        $this->app->singleton('categoriesHasProducts', function ($app) {
            if (!Route::is('admin.*')) {
                return  Category::childrenHasProducts();
            }
        });
        $this->app->singleton('inWishlist', function ($app) {
            $inWishlist = [];
            if (Route::is('shopPage') || Route::is('productDetailPage')) {
                $inWishlist = auth()->check() ? auth()->user()->wishlist()->pluck('product_id')->toArray() : [];
            }
            return $inWishlist;
        });
    }
}