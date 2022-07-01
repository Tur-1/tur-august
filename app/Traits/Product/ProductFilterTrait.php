<?php

namespace App\Traits\Product;

use App\Traits\Product\ProductSearchTrait;


trait ProductFilterTrait
{
    use ProductSearchTrait;

    public function filterByBrands($query)
    {
        return  $query->whereHas('brand', function ($query) {
            $query->whereIn('slug', request()->input('brand'))->select('id', 'slug');
        });
    }
    public function filterByColors($query)
    {
        return $query->whereHas('color', function ($query) {
            $query->whereIn('slug', request()->input('color'))->select('id', 'slug');
        });
    }
    public function filterBySizeOptions($query)
    {

        return  $query->whereHas('sizeOptions', function ($query) {
            $query->whereIn('slug', request()->input('sizeOptions'));
        });
    }

    public function filterBySearching($query)
    {

        return $query->where(function ($query) {
            $query->whereHas('brand', fn ($query) => $this->searchByBrand($query))
                ->OrwhereHas('color', fn ($query) => $this->searchByColor($query))
                ->OrwhereHas('categories', fn ($query) => $this->searchByCategories($query))
                ->orWhere('name', 'like', '%' . request()->input('search') . '%');
        });
    }

    public function filterByStatus($query)
    {
        return $query->when(request()->input('status') == 'Active', fn ($query) => $query->Active())
            ->when(request()->input('status') == 'inactive', fn ($query) => $query->InActive());
    }
    public function filterBySorting($query)
    {
        return $query->when(request('sort') == 'new', fn ($query) => $query->latest())
            ->when(request('sort') == 'price-low-to-high', fn ($query) => $query->orderBy('price', 'Asc'))
            ->when(request('sort') == 'price-high-to-low', fn ($query) => $query->orderByDesc('price'));
    }
    public function filterByPrice($query)
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