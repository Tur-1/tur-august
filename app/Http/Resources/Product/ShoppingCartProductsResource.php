<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingCartProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $discounted_price = 0;

        $discount_amount = $this->discount_amount . ' SAR';

        if ($this->discount_type == 'percentage') {

            $discount_amount = $this->discount_amount . ' %';
        }

        $original_price =  $this->price . ' SAR';
        if (!is_null($this->discounted_price) && $this->currentDate->between($this->discount_start_at, $this->discount_expires_at)) {
            $discounted_price =  $this->discounted_price . ' SAR';
        }

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