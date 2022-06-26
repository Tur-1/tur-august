<?php

namespace App\Services\Frontend\Inertia;

use Illuminate\Support\Facades\Route;
use App\Http\Resources\Category\CategoriesResource;

class ShareInertiaDataService
{
    public function getAuthenticatedUser()
    {
        return [
            'name' => auth()->check() ? auth()->user()->name : '',
            'avatar' => auth()->check() ? auth()->user()->avatar_url : asset('assets/images/avatars/avatar_male.png'),
        ];
    }
    public function getCartCounter()
    {
        $cartCounter = 0;
        if (!Route::is('admin.*') && auth()->check()) {
            $cartCounter = auth()->user()->shoppingCart()->count('product_id');
        }
        return $cartCounter;
    }
    public function getProductsInWishlist()
    {
        $inWishlist = [];
        if (Route::is('shopPage') || Route::is('productDetailPage')) {
            $inWishlist = auth()->check() ? auth()->user()->wishlist()->pluck('product_id')->toArray() : [];
        }
        return $inWishlist;
    }
    public function getCategoriesSections()
    {
        $sections = [];
        if (!empty(app('categoriesHasProducts'))) {
            $sections = CategoriesResource::collection(app('categoriesHasProducts')->where("is_section", true));
        }
        return $sections;
    }
}