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
        $activeSectionClass = '';
        $activeCategoryClass = '';
        if (Route::is('shopPage')) {
            $activeSectionClass = Str::title(collect(explode('-', $this->slug))->first()) == $this->name ? 'active' : '';
            $activeCategoryClass = url()->current() == route('shopPage', ['category_slug' => $this->slug]) ? 'active' : '';
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'link' => route('shopPage', ['category_slug' => $this->slug]),
            'image_url' => $this->image_url,
            'activeSectionClass' =>  $activeSectionClass,
            'activeClass' => $activeCategoryClass,
            'children' => $this->children ? CategoriesResource::collection($this->children) : [],
        ];
    }
}