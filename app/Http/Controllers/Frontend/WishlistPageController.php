<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Http\Controllers\Controller;

class WishlistPageController extends Controller
{
    public function index()
    {
        $products =  Product::SelectFrontendFields()
            ->WithMainProductImage()
            ->WithBrandName()
            ->Active()
            ->latest()
            ->get();
        return Inertia::render('Frontend/WishlistPage/Index', compact('products'));
    }
}