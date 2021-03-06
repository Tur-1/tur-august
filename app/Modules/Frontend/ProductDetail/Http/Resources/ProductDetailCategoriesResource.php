<?php

namespace App\Modules\Frontend\ProductDetail\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailCategoriesResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'link' => route('shop.categoryPage', ['category_slug' => $this->slug]),
        ];
    }
}