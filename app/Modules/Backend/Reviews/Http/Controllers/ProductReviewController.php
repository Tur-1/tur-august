<?php

namespace App\Modules\Backend\Reviews\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product\ProductReview;
use App\Traits\RedirectWithMessageTrait;
use App\Modules\Backend\Reviews\Services\ReviewService;

class ProductReviewController extends Controller
{
    use RedirectWithMessageTrait;
    public $reviewService;
    private $routeName = 'admin.reviews.index';


    public function __construct(ReviewService $reviewService)
    {
        $this->authorizeResource(ProductReview::class, 'productReview');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $review)
    {
        $review = $this->reviewService->reviewItem($review);


        return view('Backend.pages.reviews.create-edit-reviews-page', compact('review'));
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
        if (is_null($review)) {
            return redirect()->back();
        }
        $review->delete();
        return $this->redirectWithSuccessMsg($this->routeName, 'Your comment has been Deleted successfully');
    }
}