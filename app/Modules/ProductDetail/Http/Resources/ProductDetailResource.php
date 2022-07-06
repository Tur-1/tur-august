<?php

namespace App\Modules\ProductDetail\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\Backend\Product\ProductDiscountService;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
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
            'slug' => $this->slug,
            'details' => $this->details,
            'brand_name' =>  $this->brand_name,
            'brand_image_url' =>  $this->brand_image_url,
            'information' => $this->information,
            'product_link' => route('productDetailPage', $this->slug),
            'in_stock' => $this->stock > 0 ? true : false,
            'price' => $discounted_price != 0 ? $discounted_price : $original_price,
            'discounted_price' => $discounted_price != 0 ? $original_price : '',
            'discount_amount' => $discount_amount,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'inWishlist' => in_array($this->id, app('inWishlist')),

        ];
    }
}