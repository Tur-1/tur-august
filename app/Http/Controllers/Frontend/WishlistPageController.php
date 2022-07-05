<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\Product\ProductsListResource;
use App\Models\product\Traits\ProductScopesTrait;
use App\Services\Frontend\Pages\WishlistPageService;

class WishlistPageController extends Controller
{
    use ProductScopesTrait;

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
        if ($this->isProductDoesntExist($request->product_id)) {
            return;
        }
        if (!auth()->check()) {
            Session::put('wishlist', ['product_id' => $request->product_id]);

            return  redirect()->back()->with('requireAuth', ['status' => true, 'time' => time()]);
        }

        (new WishlistPageService())->attachProductToWishlist($request->product_id);
    }
}