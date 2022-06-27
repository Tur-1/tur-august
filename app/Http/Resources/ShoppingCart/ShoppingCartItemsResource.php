<?php

namespace App\Http\Resources\ShoppingCart;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\Backend\Product\ProductDiscountService;

class ShoppingCartItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
        $size = $this->sizeOptions->find($this->pivot->size_id);

        // $product_quantity =   $size->pivot->stock < $this->pivot->quantity ? $size->pivot->stock : $this->pivot->quantity;

        $discountService = (new ProductDiscountService())->getValidProductDiscount($discounteData);
        $discounted_price =   $discountService['discounted_price'];
        $original_price =   $discountService['original_price'];
        $discount_amount =   $discountService['discount_amount'];


        return [
            'cart_id' => $this->pivot->id,
            'product_id' => $this->id,
            'name' => $this->name,
            'product_link' => route('productDetailPage', $this->slug),
            'in_stock' => $this->stock > 0 ? true : false,
            'price' => $discounted_price != 0 ? $discounted_price : $original_price,
            'discounted_price' => $discounted_price != 0 ? $original_price : '',
            'discount_amount' => $discount_amount,
            'brand_name' => $this->brand_name,
            'main_image_url' => $this->main_image_url,
            'quantity' =>  $this->pivot->quantity,
            'stock_size' => $size->pivot->stock,
            'size' => $size->name,
            'size_id' => $this->pivot->size_id,

        ];
    }
}