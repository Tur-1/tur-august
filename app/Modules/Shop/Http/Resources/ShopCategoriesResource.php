<?php

namespace App\Modules\Shop\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopCategoriesResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $activeCategoryClass = url()->current() == route('shopPage', ['category_slug' => $this->slug]) ? 'active' : '';


        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'link' => route('shopPage', ['category_slug' => $this->slug]),
            'image_url' => $this->image_url,
            'activeClass' => $activeCategoryClass,
            'children' => $this->children ? ShopCategoriesResource::collection($this->children) : [],
        ];
    }
}