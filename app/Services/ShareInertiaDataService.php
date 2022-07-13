<?php

namespace App\Services;

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
        if (!Route::is('admin.*') && !Route::is('shoppingCartPage') && !Route::is('checkoutPage') && auth()->check()) {
            $cartCounter = auth()->user()->shoppingCart()->count('product_id');
        }
        return $cartCounter;
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