<?php

namespace App\Services\Frontend\Pages;

use Carbon\Carbon;
use App\Models\product\Brand;
use App\Models\product\Color;
use App\Models\product\Product;
use App\Models\product\Category;
use App\Models\product\SizeOption;
use App\Models\product\ProductCategory;
use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Http\Resources\Brand\BrandsResource;
use App\Http\Resources\Category\CategoriesResource;
use App\Http\Resources\Color\ColorsResource;
use App\Http\Resources\Product\ProductsListResource;
use App\Http\Resources\SizeOption\SizeOptionsResource;

class ShopPageService
{
    private $category;
    private $allCategories;
    private $products;
    private $brands;
    private $firstParamKey;
    private $firstParamValues;

    public  function __construct()
    {

        $this->firstParamKey =  collect(array_keys(request()->only(['brand', 'color', 'sizeOptions'])))->first();
        $this->firstParamValues = request()->input($this->firstParamKey);
    }

    public function getCategory($slug)
    {
        $this->allCategories = app('categoriesHasProducts');
        $this->category = $this->allCategories->where("slug", $slug)->first();

        $category = $this->category;
        return CategoriesResource::make($category);
    }
    public function getBreadcrumb()
    {

        return CategoriesResource::collection($this->allCategories->whereIn('id', $this->category->parents_ids));
    }

    public function getPreviousCategory()
    {
        return  $this->allCategories->whereIn('id', $this->category->parents_ids)->last() ?? [];
    }
    public function getBrands()
    {

        $brands = Brand::query();

        if ($this->isNotFirstParamKey('brand')) {

            $brands->Where_Has_Products_Based_On_First_Param_Key(
                $this->category->id,
                $this->firstParamKey,
                $this->firstParamValues
            );
        } else {
            $brands->WhereHasProductsWithCount($this->category->id);
        }

        $brands =  $brands->get();


        $this->brands = $brands->mapWithKeys(function ($brand) {
            return [$brand->id => $brand->name];
        });

        return  BrandsResource::collection($brands);
    }
    public function getColors()
    {
        $colors = Color::query();

        if ($this->isNotFirstParamKey('color')) {

            $colors->Where_Has_Products_Based_On_First_Param_Key(
                $this->category->id,
                $this->firstParamKey,
                $this->firstParamValues
            );
        } else {
            $colors->WhereHasProductsWithCount($this->category->id);
        }

        $colors =  $colors->get();

        return  ColorsResource::collection($colors);
    }
    public function getSizeOptions()
    {
        $sizeOptions =  SizeOption::query();

        if ($this->isNotFirstParamKey('sizeOptions')) {

            $sizeOptions->Where_Has_Products_Based_On_First_Param_Key(
                $this->category->id,
                $this->firstParamKey,
                $this->firstParamValues
            );
        } else {
            $sizeOptions->WhereHasProductsWithCount($this->category->id);
        }


        $SizeOptions = $sizeOptions->get();

        return SizeOptionsResource::collection($SizeOptions);
    }

    public function getProducts()
    {
        $this->products =  Product::WhereCategory($this->category->id)
            ->SelectFrontendFields()
            ->WithMainProductImage()
            ->WithFilters()
            ->Active()
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $this->setBrandNameForEachProduct();

        return  ProductsListResource::collection($this->products)->response()->getData(true);
    }

    public function getSortProducts()
    {
        return [
            [
                'id' => '1',
                'name' => 'Suggested',
                'icon' => 'bi bi-card-list me-2',
                'active' =>  !request()->has('sort'),
                'url' => request()->fullUrlWithoutQuery(['sort'])
            ],
            [
                'id' => '2',
                'name' => 'new',
                'icon' => 'fas fa-fire me-2',
                'active' =>  request()->query('sort') == 'new',
                'url' => request()->fullUrlWithQuery(['sort' => 'new'])
            ],
            [
                'id' => '1',
                'name' => 'Price: High to Low',
                'icon' => 'fas fa-sort-amount-down-alt me-2',
                'active' =>  request()->query('sort') == 'price-high-to-low',
                'url' => request()->fullUrlWithQuery(['sort' => 'price-high-to-low'])
            ],
            [
                'id' => '2',
                'name' => 'Price: Low to High',
                'icon' => 'fas fa-sort-amount-up me-2',
                'active' =>  request()->query('sort') == 'price-low-to-high',
                'url' => request()->fullUrlWithQuery(['sort' => 'price-low-to-high'])
            ],

        ];
    }

    public function getQueriesString()
    {
        return request()->only(['brand', 'color', 'sort', 'sizeOptions']);
    }

    private function setBrandNameForEachProduct(): void
    {
        $this->products->each(function ($product) {
            $product->brand_name = $this->brands[$product->brand_id];
        });
    }
    private function isNotFirstParamKey(string $queryStringKey)
    {
        return (!empty(request()->query()) && in_array($queryStringKey, array_keys(request()->only(['brand', 'color', 'sizeOptions']))) && $this->firstParamKey != $queryStringKey);
    }
}