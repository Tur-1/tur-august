<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductsListResource;
use Illuminate\Support\Facades\Session;

class WishlistPageController extends Controller
{
    public function index()
    {

        $products = [];
        $inWishlist = app('inWishlist');
        if ($inWishlist > 0) {
            $products = ProductsListResource::collection(auth()->user()->wishlistProducts)->resolve();
        }

        return Inertia::render(
            'WishlistPage/Index',
            [
                'wishlistCounter' => count($inWishlist),
                'products' =>  $products,

            ]
        );
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