<?php

namespace App\Providers;

use App\Models\user\Role;
use App\Models\user\User;
use App\Models\order\Order;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Models\Banner\Banner;
use App\Models\Coupon\Coupon;
use App\Models\product\Brand;
use App\Models\product\Color;
use App\Policies\BrandPolicy;
use App\Policies\ColorPolicy;
use App\Policies\OrderPolicy;
use App\Policies\BannerPolicy;
use App\Policies\CouponPolicy;
use App\Models\product\Product;
use App\Policies\ProductPolicy;
use App\Models\product\Category;
use App\Policies\CategoryPolicy;
use App\Models\order\OrderStatus;
use App\Models\product\SizeOption;
use App\Policies\SizeOptionPolicy;
use App\Policies\OrderStatusPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\product\ProductReview;
use App\Policies\ProductReviewPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class =>  UserPolicy::class,
        Role::class => RolePolicy::class,
        Category::class => CategoryPolicy::class,
        Brand::class => BrandPolicy::class,
        Color::class =>  ColorPolicy::class,
        Product::class => ProductPolicy::class,
        SizeOption::class => SizeOptionPolicy::class,
        Coupon::class => CouponPolicy::class,
        Order::class => OrderPolicy::class,
        Banner::class => BannerPolicy::class,
        OrderStatus::class => OrderStatusPolicy::class,
        ProductReview::class => ProductReviewPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}