<?php

namespace App\Services\Frontend\Pages;

use Carbon\Carbon;
use App\Models\product\Product;
use App\Exceptions\PageNotFoundException;

class ProductDetailPageService
{
    private $productDetail;

    public function getProductDetail($productSlug)
    {
        $currentDate = Carbon::now('GMT+3');
        $this->productDetail = Product::where('slug', $productSlug)
            ->with(['productImages:product_id,image', 'stockSizeOptions', 'categories'])
            ->ProductDetailFields()
            ->WithBrandName()
            ->WithBrandImage()
            ->Active()
            ->first();

        $this->productDetail =   $this->productItem($this->productDetail, $currentDate);


        if (is_null($this->productDetail)) {
            throw new PageNotFoundException("page not found");
        }
        return $this->productDetail;
    }
    private function productItem($product, $currentDate)
    {
        $discounted_price = 0;

        $discount_amount = $product->discount_amount . ' SAR OFF';

        if ($product->discount_type == 'percentage') {

            $discount_amount = $product->discount_amount . '% OFF';
        }

        $original_price =  $product->price . ' SAR';
        if (!is_null($product->discounted_price) && $currentDate->between($product->discount_start_at, $product->discount_expires_at)) {
            $discounted_price =  $product->discounted_price . ' SAR';
        }

        return [
            'id' => $product->id,
            'name' => $product->name,
            'details' => $product->details,
            'brand_name' =>  $product->brand_name,
            'brand_image_url' =>  $product->brand_image_url,
            'information' => $product->information,
            'product_link' => route('productDetailPage', $product->slug),
            'in_stock' => $product->stock > 0 ? true : false,
            'price' => $discounted_price != 0 ? $discounted_price : $original_price,
            'discounted_price' => $discounted_price != 0 ? $original_price : '',
            'discount_amount' => $discount_amount,
            'meta_title' => $product->meta_title,
            'meta_keywords' => $product->meta_keywords,
            'meta_description' => $product->meta_description,
            'productImages' => $product->productImages,
            'categories' => $product->categories,
            'stockSizeOptions' => $product->stockSizeOptions,
        ];
    }
    public function getBreadcrumb()
    {
        return  $this->productDetail['categories'];
    }
    public function getRelatedProducts()
    {
        $currentDate = Carbon::now('GMT+3');
        $relatedProducts = Product::query()
            ->SelectFrontendFields()
            ->WithMainProductImage()
            ->WithBrandName()
            ->where('id', '!=', $this->productDetail['id'])
            ->whereHas('categories', function ($query) {
                $query->whereIn('id', collect($this->productDetail['categories'])->pluck('id'));
            })
            ->Active()
            ->inRandomOrder()
            ->limit(20)
            ->get()
            ->map(function ($product) use ($currentDate) {
                return $this->relatedProductItem($product, $currentDate);
            });

        return $relatedProducts;
    }
    private function relatedProductItem($product, $currentDate)
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
}