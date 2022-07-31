<?php

namespace App\Modules\Frontend\Shop\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\product\Brand;
use App\Models\product\Color;
use App\Models\product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Modules\Frontend\Shop\Http\Resources\SearchSuggestionResultsResource;
use App\Modules\Frontend\Shop\Services\ShopPageService;

class ShopPageController extends Controller
{

    public function categoriesPage()
    {
        Session::put('categoriesPageUrl', url()->current());
        return Inertia::render('CategoriesPage/Index');
    }
    public function categoryPage($category_slug, ShopPageService $shopPageService)
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

        Session::put('previousPageUrl', request()->fullUrl());

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
            'categoriesPageUrl' => Session::get('categoriesPageUrl')


        ]);
    }

    public function searchProducts(Request $request)
    {

        $searchResults = Product::select('name')->WithSearchResult()->Active()->get();

        return redirect()->back()->with(['searchResults' => SearchSuggestionResultsResource::collection($searchResults)->resolve()]);
    }
}