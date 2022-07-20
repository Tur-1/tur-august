<?php

namespace App\Modules\Frontend\Shop\Services;

use App\Exceptions\PageNotFoundException;
use App\Models\product\Brand;
use App\Models\product\Color;
use App\Models\product\Product;
use App\Models\product\SizeOption;
use App\Modules\Frontend\Shop\Http\Resources\ShopBrandsResource;
use App\Modules\Frontend\Shop\Http\Resources\ShopColorsResource;
use App\Modules\Frontend\Shop\Http\Resources\ShopProductsResource;
use App\Modules\Frontend\Shop\Http\Resources\ShopCategoriesResource;
use App\Modules\Frontend\Shop\Http\Resources\ShopSizeOptionsResource;

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

        if (is_null($this->category)) {
            throw new PageNotFoundException();
        }
        $category = $this->category;
        return ShopCategoriesResource::make($category);
    }
    public function getBreadcrumb()
    {

        return ShopCategoriesResource::collection($this->allCategories->whereIn('id', $this->category->parents_ids));
    }

    public function getPreviousCategory()
    {
        return  $this->allCategories->whereIn('id', $this->category->parents_ids)->last() ?? [];
    }
    public function getBrands()
    {

        $brands = Brand::query();


        $brands->WhereHasProductsWithCount($this->category->id);


        $brands =  $brands->get();


        $this->brands = $brands->mapWithKeys(function ($brand) {
            return [$brand->id => $brand->name];
        });

        return  ShopBrandsResource::collection($brands);
    }
    public function getColors()
    {
        $colors = Color::query();


        $colors->WhereHasProductsWithCount($this->category->id);


        $colors =  $colors->get();

        return  ShopColorsResource::collection($colors);
    }
    public function getSizeOptions()
    {
        $sizeOptions =  SizeOption::query();



        $sizeOptions->WhereHasProductsWithCount($this->category->id);



        $sizeOptions = $sizeOptions->get();

        return ShopSizeOptionsResource::collection($sizeOptions);
    }

    public function getProducts()
    {
        $this->products =  Product::WhereCategory($this->category->id)
            ->WithShopPageFields()
            ->WithMainProductImage()
            ->WithFilters()
            ->Active()
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $this->setBrandNameForEachProduct();

        return  ShopProductsResource::collection($this->products)->response()->getData(true);
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
                'icon' => 'bi bi-fire me-2',
                'active' =>  request()->query('sort') == 'new',
                'url' => request()->fullUrlWithQuery(['sort' => 'new'])
            ],
            [
                'id' => '1',
                'name' => 'Price: High to Low',
                'icon' => 'bi bi-sort-up me-2',
                'active' =>  request()->query('sort') == 'price-high-to-low',
                'url' => request()->fullUrlWithQuery(['sort' => 'price-high-to-low'])
            ],
            [
                'id' => '2',
                'name' => 'Price: Low to High',
                'icon' => 'bi bi-sort-down-alt me-2',
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
        // return (!empty(request()->query()) && in_array($queryStringKey, array_keys(request()->only(['brand', 'color', 'sizeOptions']))) && $this->firstParamKey != $queryStringKey);
    }
}