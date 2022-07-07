<?php

namespace App\Modules\Frontend\ProductDetail\Http\Controllers;

use App\Exceptions\PageNotFoundException;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Traits\RedirectWithMessageTrait;
use App\Models\product\Traits\ProductScopesTrait;
use App\Modules\Frontend\ShoppingCart\Services\ShoppingCartPageService;
use App\Modules\Frontend\ProductDetail\Services\ProductDetailPageService;

class ProductDetailPageController extends Controller
{
    use RedirectWithMessageTrait, ProductScopesTrait;
    public function index($slug, ProductDetailPageService $productDetailPageService)
    {



        try {
            $productDetail =  $productDetailPageService->getProductDetail($slug);
            $sizeOptions =  $productDetailPageService->getSizeOptions();
            $breadcrumb = $productDetailPageService->getBreadcrumb();
            $productImages = $productDetailPageService->getProductImages();
            $reviews = $productDetailPageService->reviews();
            $relatedProducts = $productDetailPageService->getRelatedProducts();
        } catch (PageNotFoundException $ex) {
            return Inertia::render('Errors/404');
        }



        $data =  [
            'productDetail' => $productDetail,
            'productImages' =>  $productImages,
            'sizeOptions' =>  $sizeOptions,
            'breadcrumb' => $breadcrumb,
            'relatedProducts' => $relatedProducts,
            'reviews' => $reviews,
        ];
        return Inertia::render('ProductDetailPage/Index', $data);
    }
    public function addToShoppingCart(Request $request)
    {
        if (is_null($request->size_id) || $this->isProductDoesntExist($request->product_id)) return;

        if (!auth()->check()) {
            Session::put('productDetail', [
                'product_id' => $request->product_id,
                'size_id' => $request->size_id
            ]);

            return  redirect()->back()->with('requireAuth', ['status' => true, 'time' => time()]);
        }


        (new ShoppingCartPageService())->attachProductToShoppingCart($request);

        return $this->redirectBackWithSuccessMsg('The product was added to your cart!');
    }
    public function sendComment($slug, Request $request)
    {

        $request->validate(['comment' => 'required|string']);

        $product = Product::where('slug', $slug)->select('id')->first();

        if (is_null($slug) || is_null($product))  return;



        if (!auth()->check()) {
            Session::put('productReview', [
                'product_id' => $product->id,
                'comment' => $request->comment,
            ]);

            return  redirect()->back()->with('requireAuth', ['status' => true, 'time' => time()]);
        }


        (new ProductDetailPageService())->createComment($product->id, $request->comment);


        return $this->redirectBackWithSuccessMsg('Your comment has been added successfully');
    }
}
