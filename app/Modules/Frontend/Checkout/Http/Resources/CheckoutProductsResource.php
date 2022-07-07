<?php

namespace App\Modules\Frontend\Checkout\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\Backend\Products\Services\ProductDiscountService;

class CheckoutProductsResource extends JsonResource
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

        $discountService = (new ProductDiscountService())->getValidProductDiscount($discounteData);
        $discounted_price =   $discountService['discounted_price'];
        $original_price =   $discountService['original_price'];
        $price = $discounted_price != 0 ? $discounted_price : $original_price;
        $totalPrice = intval($price) * $this->pivot->quantity;


        return [
            'name' => $this->name,
            'cart_id' => $this->pivot->id,
            'product_id' => $this->id,
            'quantity' =>  $this->pivot->quantity,
            'total_price' => $totalPrice,
            'size' => $size,
            'size_options' =>  $this->sizeOptions,
            'stock_size' => $size->pivot->stock,
            'in_stock' => $size->pivot->stock > 0 ? true : false,

        ];
    }
}