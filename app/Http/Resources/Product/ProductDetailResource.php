<?php

namespace App\Http\Resources\Product;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category\CategoriesResource;
use App\Http\Resources\Category\ProductDetailCategoriesResource;

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
        $currentDate = Carbon::now('GMT+3');

        $discounted_price = 0;

        $discount_amount = $this->discount_amount . ' SAR OFF';

        if ($this->discount_type == 'percentage') {

            $discount_amount = $this->discount_amount . '% OFF';
        }

        $original_price =  $this->price . ' SAR';
        if (!is_null($this->discounted_price) && $currentDate->between($this->discount_start_at, $this->discount_expires_at)) {
            $discounted_price =  $this->discounted_price . ' SAR';
        }

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