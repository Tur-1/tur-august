<?php

namespace App\Http\Resources\Category;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriesResource extends JsonResource
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
            'slug' => $this->slug,
            'link' => route('shop.categoryPage', ['category_slug' => $this->slug]),
            'image_url' => $this->image_url,
            'active_section_slug' => collect(explode('-', request()->route()->parameter('category_slug')))->first(),
            'children' => $this->children ? CategoriesResource::collection($this->children) : [],
        ];
    }
}