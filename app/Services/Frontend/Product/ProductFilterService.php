<?php

namespace App\Services\Frontend\Product;

use App\Services\Frontend\Product\ProductSearchService;

class ProductFilterService
{
    public function FilterByBrands($query)
    {
        return  $query->whereHas('brand', function ($query) {
            $query->whereIn('slug', request()->input('brand'))->select('id', 'slug');
        });
    }
    public function FilterByColors($query)
    {
        return $query->whereHas('color', function ($query) {
            $query->whereIn('slug', request()->input('color'))->select('id', 'slug');
        });
    }
    public function FilterBySizeOptions($query)
    {

        return  $query->whereHas('stockSizeOptions', function ($query) {
            $query->whereIn('slug', request()->input('sizeOptions'))->select('size_options.id', 'size_options.slug');
        });
    }

    public function FilterBySearching($query)
    {

        $searchProductService = new ProductSearchService();

        return $query->where(function ($query) use ($searchProductService) {
            $query->whereHas('brand', fn ($query) => $searchProductService->searchByBrand($query))
                ->OrwhereHas('color', fn ($query) => $searchProductService->searchByColor($query))
                ->OrwhereHas('category', fn ($query) => $searchProductService->searchByCategory($query))
                ->orWhere('name', 'like', '%' . request()->input('search') . '%');
        });
    }

    public function FilterByStatus($query)
    {
        return $query->when(request()->input('status') == 'Active', fn ($query) => $query->Active())
            ->when(request()->input('status') == 'inactive', fn ($query) => $query->InActive());
    }
    public function FilterBySorting($query)
    {
        return $query->when(request('sort') == 'new', fn ($query) => $query->latest())
            ->when(request('sort') == 'price-low-to-high', fn ($query) => $query->orderBy('price', 'Asc'))
            ->when(request('sort') == 'price-high-to-low', fn ($query) => $query->orderByDesc('price'));
    }
    public function FilterByPrice($query)
    {
        $priceArray = request()->input('price');

        $priceArray2 = [];
        foreach ($priceArray as $key => $value) {
            $priceArray2[] = array_map('intval', explode('-', $value));
        }

        return $query->where(function ($q) use ($priceArray2) {
            if (count($priceArray2) <= 1) {
                foreach ($priceArray2 as  $price) {
                    $q->whereBetween('price', [$price, $price]);
                }
            }
            if (count($priceArray2) > 1) {
                foreach ($priceArray2 as  $price) {
                    $q->orWhereBetween('price', [$price, $price]);
                }
            }
        });
    }
}