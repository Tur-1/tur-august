<?php

namespace App\Modules\ProductDetail\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Modules\ProductDetail\Http\Resources\ProductDetailReviewUserInfoResource;

class ProductDetailReviewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return   [
            'id' => $this->id,
            'user' => ProductDetailReviewUserInfoResource::make($this->whenLoaded('user')),
            'review_id' => $this->review_id,
            'comment' => $this->comment,
            'date' =>  $this->created_at->diffForHumans(),
            'reply' => ProductDetailReviewsResource::make($this->whenLoaded('reply')),
        ];
    }
}