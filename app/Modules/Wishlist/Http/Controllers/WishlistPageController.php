<?php

namespace App\Modules\Wishlist\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\product\Traits\ProductScopesTrait;
use App\Modules\Wishlist\Services\WishlistPageService;
use App\Modules\Shop\Http\Resources\ShopProductsResource;

class WishlistPageController extends Controller
{
    use ProductScopesTrait;

    public function index()
    {

        $products = [];
        $inWishlist = app('inWishlist');
        if ($inWishlist > 0) {
            $products = ShopProductsResource::collection(auth()->user()->wishlistProducts)->resolve();
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