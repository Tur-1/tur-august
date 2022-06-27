<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Review\ReviewUserResource;

class ReviewsResource extends JsonResource
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
            'user' => ReviewUserResource::make($this->whenLoaded('user')),
            'review_id' => $this->review_id,
            'comment' => $this->comment,
            'date' =>  $this->created_at->diffForHumans(),
            'reply' => ReviewsResource::make($this->whenLoaded('reply')),
        ];
    }
}