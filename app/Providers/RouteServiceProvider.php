<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api/api.php'));
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            $this->frontendPagesRoutes();

            Route::middleware(['web', 'auth', 'isAdmin'])
                ->prefix('/admin/')
                ->name('admin.')
                ->group(base_path('routes/backend.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */

    protected  function frontendPagesRoutes()
    {


        // Home page
        Route::middleware('web')
            ->group(base_path('routes/web/Frontend/HomePageRoute.php'));


        // shop page
        Route::middleware('web')
            ->group(base_path('routes/web/Frontend/ShopPageRoute.php'));

        //  wishlist page
        Route::middleware('web')
            ->group(base_path('routes/web/Frontend/WishlistPageRoute.php'));

        // shopping cart page
        Route::middleware('web')
            ->group(base_path('routes/web/Frontend/ShoppingCartPageRoute.php'));

        // my account page
        Route::middleware('web')
            ->group(base_path('routes/web/Frontend/MyAccountPageRoute.php'));

        // checkout page
        Route::middleware('web')
            ->group(base_path('routes/web/Frontend/CheckoutPageRoute.php'));

        // product detail page
        Route::middleware('web')
            ->group(base_path('routes/web/Frontend/ProductDetailPageRoute.php'));
    }
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}