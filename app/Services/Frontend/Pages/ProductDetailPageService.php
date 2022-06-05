<?php

namespace App\Services\Frontend\Pages;

use App\Models\product\Product;
use App\Exceptions\PageNotFoundException;
use App\Models\product\Category;

class ProductDetailPageService
{
    private $productDetail;

    public function getProductDetail($productSlug)
    {

        $this->productDetail = Product::where('slug', $productSlug)
            ->with(['productImages:product_id,image', 'stockSizeOptions', 'categories'])
            ->ProductDetailFields()
            ->WithBrandName()
            ->WithBrandImage()
            ->Active()
            ->first();


        if (is_null($this->productDetail)) {
            throw new PageNotFoundException("page not found");
        }
        return $this->productDetail;
    }

    public function getBreadcrumb()
    {
        return    $this->productDetail->categories;
    }
}