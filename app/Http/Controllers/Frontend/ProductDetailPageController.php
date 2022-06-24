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
        $reviews = $productDetailPageService->reviews();

        $relatedProducts = $productDetailPageService->getRelatedProducts();
        $breadcrumb = $productDetailPageService->getBreadcrumb();

        return Inertia::render('ProductDetailPage/Index', compact('productDetail', 'breadcrumb', 'relatedProducts', 'reviews'));
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
