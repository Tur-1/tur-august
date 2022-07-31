<?php

namespace App\Modules\Frontend\Shop\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchSuggestionResultsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // route('shop.categoryPage') . '?search=' . $this->name
        return [
            'name' => $this->name,
            'link' => '#',
        ];
    }
}