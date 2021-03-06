<?php

namespace App\Models\product\Traits;

use App\Models\product\Brand;

use App\Models\product\Color;
use App\Models\product\Product;
use App\Models\product\ProductImage;
use App\Models\product\Traits\ProductFilterTrait;


trait ProductScopesTrait
{
    use ProductFilterTrait;

    public function isProductDoesntExist($product_id): bool
    {
        return is_null($product_id) || Product::where('id', $product_id)->select('id')->doesntExist('id');
    }

    /**
     * 
     * scopes
     */
    public function scopeWithShopPageFields($query)
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
            'discount_type',
            'discount_expires_at',
            'brand_id',
            'color_id',
        );
    }
    public function scopeWithShoppingCartFields($query)
    {
        return $query->select(
            'products.id',
            'products.name',
            'products.slug',
            'products.price',
            'products.stock',
            'products.shipping_cost',
            'products.discount_amount',
            'products.discounted_price',
            'products.discount_start_at',
            'products.discount_type',
            'products.discount_expires_at',
            'products.brand_id',
            'products.created_at'
        );
    }
    public function scopeWithCheckoutFields($query)
    {
        return $query->select(
            'products.id',
            'products.price',
            'products.stock',
            'products.shipping_cost',
            'products.discount_amount',
            'products.discounted_price',
            'products.discount_start_at',
            'products.discount_type',
            'products.discount_expires_at',
        );
    }
    public function scopeWithProductDetailFields($query)
    {
        return $query->select(
            'id',
            'name',
            'slug',
            'price',
            'details',
            'stock',
            'info_and_care',
            'brand_id',
            'color_id',
            'discount_amount',
            'discount_type',
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
    public function scopeActive($query)
    {
        return $query->where('products.is_active', true);
    }
    public function scopeWithFilters($query)
    {

        return $query->when(request()->has('brand'), fn ($query) => $this->filterByBrands($query))
            ->when(request()->has('color'), fn ($query) => $this->filterByColors($query))
            ->when(request()->has('sizeOptions'), fn ($query) => $this->filterBySizeOptions($query))
            ->when(request()->has('price'), fn ($query) => $this->filterByPrice($query))
            ->when(request()->has('sort'), fn ($query) => $this->filterBySorting($query))
            ->when(request()->has('search'), fn ($query) => $this->filterBySearching($query))
            ->when(request()->has('status'), fn ($query) => $this->filterByStatus($query));
    }
    public function scopeWithSearchResult($query)
    {

        return $query->when(request()->has('search'), fn ($query) => $this->filterBySearching($query));
    }

    public function scopeWhereCategory($query, $category_id)
    {
        return $query->whereHas('categories', fn ($query) => $query->where('categories.id', $category_id)->select('categories.id'));
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
    public function scopeRelatedProducts($query, $productId, $categoriesIds)
    {
        return $query->whereHas('categories', function ($query) use ($categoriesIds) {
            $query->whereIn('id', collect($categoriesIds));
        })->where('id', '!=', $productId)
            ->WithShopPageFields()
            ->WithMainProductImage()
            ->WithBrandName()
            ->Active()
            ->inRandomOrder()
            ->limit(20);
    }
}