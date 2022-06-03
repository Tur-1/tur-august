<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\product\Product;
use App\Services\Frontend\Pages\ProductDetailService;

class ProductDetailController extends Controller
{
    public function index(ProductDetailService $productDetailService)
    {

        return inertia('Frontend/ProductDetailPage/Index');
    }
}