<?php

namespace App\Modules\Frontend\Shop\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Modules\Backend\Products\Services\ProductDiscountService;

class ShopProductsResource extends ResourceCollection
{

    public function __construct($resource)
    {

        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
    }
    public function toArray($request)
    {
        $discounteData = [
            'price' =>  $this->price,
            'discounted_price' => $this->discounted_price,
            'discount_amount' =>  $this->discount_amount,
            'discount_type' =>  $this->discount_type,
            'discount_start_at' =>  $this->discount_start_at,
            'discount_expires_at' =>   $this->discount_expires_at
        ];

        $discountService = (new ProductDiscountService())->getValidProductDiscount($discounteData);
        $discounted_price =   $discountService['discounted_price'];
        $original_price =   $discountService['original_price'];
        $discount_amount =   $discountService['discount_amount'];


        return [
            'id' => $this->id,
            'name' => $this->name,
            'product_link' => route('productDetailPage', $this->slug),
            'in_stock' => $this->stock > 0 ? true : false,
            'price' => $discounted_price != 0 ? $discounted_price : $original_price,
            'discounted_price' => $discounted_price != 0 ? $original_price : '',
            'discount_amount' => $discount_amount,
            'brand_name' => $this->brand_name,
            'main_image_url' => $this->main_image_url,
            'inWishlist' => in_array($this->id, app('inWishlist')),
        ];
    }
}