<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Exceptions\PageNotFoundException;
use App\Services\Frontend\Pages\ShopPageService;
use Illuminate\Support\Facades\Route;

class ShopPageController extends Controller
{

    public function index($category_slug, ShopPageService $shopPageService)
    {

        try {

            $category = $shopPageService->getCategory($category_slug);
            $breadcrumb =  $shopPageService->getBreadcrumb();
            $sizeOptions =  $shopPageService->getSizeOptions();
            $brands =  $shopPageService->getBrands();
            $colors =  $shopPageService->getColors();
            $products =  $shopPageService->getProducts();
            $previousCategory = $shopPageService->getPreviousCategory();
            $productsCount = count($products['data']);
            $sortProducts =  $shopPageService->getSortProducts();
            $queryString = $shopPageService->getQueriesString();
        } catch (PageNotFoundException $ex) {
            return Inertia::render('Errors/404');
        }

        return Inertia::render('ShopPage/Index', [

            'category' => $category,
            'breadcrumb' => $breadcrumb,
            'previousCategory' => $previousCategory,
            'productsCount' => $productsCount,
            'sizeOptions' => $sizeOptions,
            'brands' => $brands,
            'colors' => $colors,
            'products' => $products,
            'queryString' => $queryString,
            'sortProducts' => $sortProducts,
        ]);
    }
}