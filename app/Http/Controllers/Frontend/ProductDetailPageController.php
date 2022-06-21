<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use App\Services\Frontend\Pages\ProductDetailPageService;

class ProductDetailPageController extends Controller
{
    public function index($slug, ProductDetailPageService $productDetailPageService)
    {

        $productDetail =  $productDetailPageService->getProductDetail($slug);

        $relatedProducts = $productDetailPageService->getRelatedProducts();

        $breadcrumb = $productDetailPageService->getBreadcrumb();


        return Inertia::render('Frontend/ProductDetailPage/Index', compact('productDetail', 'breadcrumb', 'relatedProducts'));
    }
}