<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\product\ProductReview;
use App\Modules\Backend\Reviews\Services\ReviewService;

class ReviewsList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $reviews = ProductReview::query()
            ->with('user', 'product')
            ->IsNotRead()
            ->whereNull('review_id')
            ->latest()
            ->get()->map(function ($review, $key) {
                return  $this->reviewService->reviewItem($review);
            });


        return view('components.reviews-list', compact('reviews'));
    }
}