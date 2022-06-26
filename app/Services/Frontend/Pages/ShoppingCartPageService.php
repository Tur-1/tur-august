<?php

namespace App\Services\Frontend\Pages;

use Illuminate\Support\Carbon;

class ShoppingCartPageService
{
    public function getUserShoppingCart()
    {
        return auth()->user()->shoppingCartProducts;
    }
}