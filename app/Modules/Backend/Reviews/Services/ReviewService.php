<?php

namespace App\Modules\Backend\Reviews\Services;

class ReviewService
{
    public function reviewItem($review)
    {
        return [
            'id' => $review->id,
            'user_name' => $review->user->name,
            'product_id' =>  $review->product_id,
            'product_image' =>  $review->product->main_image_url,
            'product_name' =>  $review->product->name,
            'user_avatar' => $review->user->avatar_url,
            'review_id' => $review->review_id,
            'comment' => $review->comment,
            'date' =>  $review->created_at->diffForHumans(),
            'reply' => $review->reply ? $this->replyReviewItem($review->reply) : []
        ];
    }
    public function replyReviewItem($review)
    {
        return [
            'id' => $review->id,
            'user_name' => $review->user->name,
            'user_avatar' => $review->user->avatar_url,
            'review_id' => $review->review_id,
            'comment' => $review->comment,
            'date' =>  $review->created_at->diffForHumans()
        ];
    }
}