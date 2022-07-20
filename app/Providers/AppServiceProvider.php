<?php

namespace App\Providers;

use App\Models\user\User;
use App\Models\product\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Models\user\Observers\UserObserver;
use Illuminate\Http\Resources\Json\JsonResource;

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

        if (App::environment('production')) {
            URL::forceScheme('https');
        }
        JsonResource::withoutWrapping();

        $this->app->singleton('categoriesHasProducts', function ($app) {
            if (!Route::is('admin.*')) {
                return  Category::childrenHasProducts();
            }
        });
        $this->app->singleton('inWishlist', function ($app) {
            $inWishlist = [];
            if (Route::is('shopPage') || Route::is('productDetailPage') || Route::is('wishlistPage')) {
                $inWishlist = auth()->check() ? auth()->user()->wishlist()->pluck('product_id')->toArray() : [];
            }
            return $inWishlist;
        });

        User::observe(UserObserver::class);
    }
}