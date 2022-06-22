<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product\ProductReview;
use App\Services\Backend\Review\ReviewService;
use App\Traits\AlertMessages;

class ProductReviewController extends Controller
{
    use AlertMessages;
    public $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $reviews = ProductReview::query()
            ->with('user', 'product', 'reply')
            ->whereNull('review_id')
            ->latest()
            ->paginate(30);

        $reviews->getCollection()->transform(function ($review, $key) {
            return  $this->reviewService->reviewItem($review);
        });

        return view('Backend.pages.reviews.reviews-page', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, $review_id)
    {

        $request->validate(['comment' => 'required|string']);
        $productReview = ProductReview::find($review_id);

        ProductReview::create([
            'user_id' => auth()->id(),
            'product_id' => $productReview->product_id,
            'review_id' => $productReview->id,
            'comment' => $request->comment,
        ]);


        return $this->redirectBackWithSuccessMsg('Your comment has been added successfully');
    }
    public function store(Request $request, ProductReview $productReview)
    {

        $request->validate(['comment' => 'required|string']);

        ProductReview::create([
            'user_id' => auth()->id(),
            'product_id' => $productReview->product_id,
            'review_id' => $productReview->id,
            'comment' => $request->comment,
        ]);


        $this->redirectBackWithSuccessMsg('Your comment has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $review)
    {

        $request->validate(['comment' => 'required|string']);


        $review->update([
            'comment' => $request->comment,
        ]);


        return $this->redirectBackWithSuccessMsg('Your comment has been added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $review)
    {
        //
    }
}