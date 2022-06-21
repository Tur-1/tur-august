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

        $this->allCategories = app('allCategories');
        $this->category = $this->allCategories->where("slug", $slug)->first();


        if (is_null($this->category)) {
            throw new PageNotFoundException('Page Not Found', 404);
        }

        return $this->category;
    }
    public function getBreadcrumb()
    {

        return  $this->allCategories->whereIn('id', $this->category->parents_ids);
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

        return  $brands;
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

        return  $colors;
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

        return $SizeOptions;
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

        $currentDate = Carbon::now('GMT+3');
        $this->products->getCollection()->transform(function ($product, $key) use ($currentDate) {
            return  $this->productItem($product, $currentDate);
        });


        return $this->products;
    }
    public function getProductsCount()
    {
        return  Product::WhereCategory($this->category->id)->WithFilters()->count();
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
    private function productItem($product, $currentDate)
    {
        $discounted_price = 0;

        $discount_amount = $product->discount_amount . ' SAR';

        if ($product->discount_type == 'percentage') {

            $discount_amount = $product->discount_amount . ' %';
        }

        $original_price =  $product->price . ' SAR';
        if (!is_null($product->discounted_price) && $currentDate->between($product->discount_start_at, $product->discount_expires_at)) {
            $discounted_price =  $product->discounted_price . ' SAR';
        }

        return [
            'id' => $product->id,
            'name' => $product->name,
            'product_link' => route('productDetailPage', $product->slug),
            'in_stock' => $product->stock > 0 ? true : false,
            'price' => $discounted_price != 0 ? $discounted_price : $original_price,
            'discounted_price' => $discounted_price != 0 ? $original_price : '',
            'discount_amount' => $discount_amount,
            'brand_name' => $product->brand_name,
            'main_image_url' => $product->main_image_url,
        ];
    }
    private function setBrandNameForEachProduct(): void
    {
        $this->products->each(function ($product) {
            $product->brand_name = $this->brands[$product->brand_id];
        });
    }
    private function isNotFirstParamKey(string $queryStringKey)
    {
        return (!empty(request()->query()) && in_array('brand', array_keys(request()->only(['brand', 'color', 'sizeOptions']))) && $this->firstParamKey != $queryStringKey);
    }
}