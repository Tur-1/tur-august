<?php

namespace App\Models\product\Traits;

trait ProductAccessorsTrait
{
    public function getBrandImageUrlAttribute()
    {
        if ($this->brand_image) {
            return asset('storage/images/brands/' . $this->brand_image);
        }
    }
    public function getMainImageUrlAttribute()
    {
        if ($this->main_image) {
            return asset('storage/images/products/product_' . $this->id . '/' . $this->main_image);
        } else {
            return  asset('assets/images/defult-input-image.png');
        }
    }
    public function getCategoryNameAttribute()
    {

        return $this->categories->last()->name;
    }
    public function getSectionNameAttribute()
    {
        return $this->categories->first()->name;
    }
}