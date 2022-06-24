<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Exceptions\PageNotFoundException;
use App\Services\Frontend\Pages\ShopPageService;

class ShopPageController extends Controller
{

    public function index($category_slug, ShopPageService $shopPageService)
    {




        try {
            $category = $shopPageService->getCategory($category_slug)->toArray();
            $breadcrumb =  $shopPageService->getBreadcrumb()->toArray();
            $sizeOptions =  $shopPageService->getSizeOptions()->toArray();
            $brands =  $shopPageService->getBrands()->toArray();
            $colors =  $shopPageService->getColors()->toArray();
            $products =  $shopPageService->getProducts();
            $previousCategory = $shopPageService->getPreviousCategory();
            $productsCount = $products->count();
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