<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class WishlistPageController extends Controller
{
    public function index()
    {
        $products = [];
        if (count(app('wishlistProductsIds')) > 0) {
            $products = auth()->user()->wishlistProducts;
        }



        return Inertia::render('Frontend/WishlistPage/Index', compact('products'));
    }
    public function addToWishlist(Request $request)
    {

        if (auth()->user()->WishlistHas($request->product_id)) {

            auth()->user()->wishlist()->detach($request->product_id);
        } else {

            auth()->user()->wishlist()->attach($request->product_id);
        }
    }
}