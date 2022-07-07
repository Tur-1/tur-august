<?php

namespace App\Modules\Frontend\Wishlist\Services;

use Illuminate\Support\Facades\Session;


class WishlistPageService
{

    public function attachProductToWishlist($product_id = null)
    {
        if (is_null($product_id)) {
            $wishlist = Session::get('wishlist');
            $product_id = $wishlist['product_id'];
            if (!auth()->user()->WishlistHas($product_id)) {
                auth()->user()->wishlist()->attach($product_id);
            }
            Session::remove('wishlist');
            return;
        }


        if (!is_null($product_id)) {
            if (auth()->user()->WishlistHas($product_id)) {

                auth()->user()->wishlist()->detach($product_id);
            } else {

                auth()->user()->wishlist()->attach($product_id);
            }
        }
    }
}
