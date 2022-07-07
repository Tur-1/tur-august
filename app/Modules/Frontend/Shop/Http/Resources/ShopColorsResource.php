<?php

namespace App\Modules\Frontend\Shop\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopColorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'image_url' => $this->image_url,
            'products_count' => $this->products_count,

        ];
    }
}
