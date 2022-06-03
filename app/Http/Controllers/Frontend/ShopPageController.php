<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\PageNotFoundException;
use App\Http\Controllers\Controller;
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
            $sortProducts =  $shopPageService->getSortProducts();
            $queryString = $shopPageService->getQueriesString();
        } catch (PageNotFoundException $ex) {
            return inertia('Errors/404');
        }

        return inertia('Frontend/ShopPage/Index', [

            'category' => $category,
            'breadcrumb' => $breadcrumb,
            'sizeOptions' => $sizeOptions,
            'brands' => $brands,
            'colors' => $colors,
            'products' => $products,
            'queryString' => $queryString,
            'sortProducts' => $sortProducts,
        ]);
    }
}