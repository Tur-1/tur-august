<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Traits\AlertMessages;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use App\Models\product\ProductReview;
use App\Services\Frontend\Pages\ProductDetailPageService;

class ProductDetailPageController extends Controller
{
    use AlertMessages;
    public function index($slug, ProductDetailPageService $productDetailPageService)
    {

        $productDetail =  $productDetailPageService->getProductDetail($slug);
        $sizeOptions =  $productDetailPageService->getSizeOptions();
        $breadcrumb = $productDetailPageService->getBreadcrumb();
        $productImages = $productDetailPageService->getProductImages();
        $reviews = $productDetailPageService->reviews();
        $relatedProducts = $productDetailPageService->getRelatedProducts();

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
        if (is_null($request->size_id)) {
            return;
        }
        if (!auth()->user()->shoppingCartHas($request->product_id, $request->size_id)) {

            auth()->user()->shoppingCart()->attach($request->product_id, ['size_id' => $request->size_id, 'quantity' => 1]);
        }


        $message = 'The product was added to your cart!';
    }
    public function sendComment($slug, Request $request)
    {
        $product = Product::where('slug', $slug)->select('id')->first();
        if (is_null($product) || is_null($slug)) {
            return $this->redirectBackWithErrorMsg('please try again !');
        }


        $request->validate(['comment' => 'required|string']);
        $currentDate = Carbon::now('GMT+3');
        ProductReview::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'comment' => $request->comment,
            'create_at' =>  $currentDate
        ]);


        return $this->redirectBackWithSuccessMsg('Your comment has been added successfully');
    }
}