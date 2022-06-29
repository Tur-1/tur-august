<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use App\Traits\Product\ProductTrait;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\Product\ProductsListResource;
use App\Services\Frontend\Pages\WishlistPageService;

class WishlistPageController extends Controller
{
    use ProductTrait;

    public function index()
    {

        $products = [];
        $inWishlist = app('inWishlist');
        if ($inWishlist > 0) {
            $products = ProductsListResource::collection(auth()->user()->wishlistProducts)->resolve();
        }
        // if (!auth()->check()) {
        //     $inWishlist  =  Session::get('wishlist');
        //     $products =  Product::query()->whereIn('id', $inWishlist)
        //         ->WithShopPageFields()
        //         ->WithMainProductImage()
        //         ->WithBrandName()
        //         ->Active()->get();

        //     $products = ProductsListResource::collection($products)->resolve();
        // }
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