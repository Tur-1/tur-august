<?php

namespace App\Traits;

use App\Models\product\Brand;
use App\Models\product\Color;
use App\Models\product\Category;
use App\Models\product\ProductImage;
use App\Services\Frontend\Product\ProductFilterService;

trait ProductModelScopes
{
    public function scopeSelectFrontendFields($query)
    {
        return $query->select(
            'id',
            'name',
            'slug',
            'price',
            'stock',
            'discount_amount',
            'discounted_price',
            'discount_start_at',
            'discount_expires_at',
            'brand_id',
            'color_id',
        );
    }
    public function scopeProductDetailFields($query)
    {
        return $query->select(
            'id',
            'name',
            'slug',
            'price',
            'details',
            'stock',
            'information',
            'brand_id',
            'color_id',
            'discount_amount',
            'discounted_price',
            'discount_start_at',
            'discount_expires_at',
            'meta_title',
            'meta_keywords',
            'meta_description'
        );
    }

    public function scopeWithMainProductImage($query)
    {
        return $query->addSelect([
            'main_image' => ProductImage::select('image')
                ->whereColumn('product_id', 'products.id')
                ->where('is_main_image', true)
                ->limit(1)
        ]);
    }
    public function getMainImageUrlAttribute()
    {
        if ($this->main_image) {
            return asset('storage/images/products/product_' . $this->id . '/' . $this->main_image);
        } else {
            return  asset('assets/images/defult-input-image.png');
        }
    }
    public function scopeWithFilters($query)
    {
        $FilterProductsSerivce = new ProductFilterService();
        return $query->when(request()->has('brand'), fn ($query) => $FilterProductsSerivce->FilterByBrands($query))
            ->when(request()->has('color'), fn ($query) => $FilterProductsSerivce->FilterByColors($query))
            ->when(request()->has('sizeOptions'), fn ($query) => $FilterProductsSerivce->FilterBySizeOptions($query))
            ->when(request()->has('price'), fn ($query) => $FilterProductsSerivce->FilterByPrice($query))
            ->when(request()->has('sort'), fn ($query) => $FilterProductsSerivce->FilterBySorting($query))
            ->when(request()->has('search'), fn ($query) => $FilterProductsSerivce->FilterBySearching($query))
            ->when(request()->has('status'), fn ($query) => $FilterProductsSerivce->FilterByStatus($query));
    }
    public function scopeWhereCategory($query, $category_id)
    {
        return $query->whereHas('categories', fn ($query) => $query->where('category_id', $category_id));
    }

    public function scopeWithColorName($query)
    {
        return $query->addSelect([
            'color_name' => Color::select('name')->whereColumn('id', 'products.color_id'),
        ]);
    }





    public function scopeWithBrandImage($query)
    {
        return $query->addSelect([
            'brand_image' => Brand::select('image')->whereColumn('id', 'products.brand_id'),
        ]);
    }
    public function scopeWithBrandName($query)
    {
        return $query->addSelect([
            'brand_name' => Brand::select('name')->whereColumn('id', 'products.brand_id'),
        ]);
    }
}