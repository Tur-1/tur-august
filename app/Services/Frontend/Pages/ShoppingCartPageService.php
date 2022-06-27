<?php

namespace App\Services\Frontend\Pages;

use App\Http\Resources\ShoppingCart\ShoppingCartItemsResource;
use Illuminate\Support\Carbon;

class ShoppingCartPageService
{
    public function getUserShoppingCart()
    {
        // dd(auth()->user()->shoppingCartProducts, ShoppingCartItemsResource::collection(auth()->user()->shoppingCartProducts)->resolve());
        return ShoppingCartItemsResource::collection(auth()->user()->shoppingCartProducts);
    }
}