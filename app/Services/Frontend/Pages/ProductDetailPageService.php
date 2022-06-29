<?php

namespace App\Services\Frontend\Pages;

use Carbon\Carbon;
use App\Models\product\Product;
use App\Models\product\ProductReview;
use App\Exceptions\PageNotFoundException;
use App\Http\Resources\Review\ReviewsResource;
use App\Http\Resources\Product\ProductsListResource;
use App\Http\Resources\Product\ProductDetailResource;
use App\Http\Resources\Product\ProductImagesResource;
use App\Http\Resources\SizeOption\SizeOptionsResource;
use App\Http\Resources\Category\ProductCategoriesResource;

class ProductDetailPageService
{
    private $productDetail;

    public function getProductDetail($productSlug)
    {

        $this->productDetail =  Product::query()
            ->with(['productImages:product_id,image', 'stockSizeOptions', 'categories'])
            ->where('slug', $productSlug)
            ->WithProductDetailFields()
            ->WithBrandName()
            ->WithBrandImage()
            ->Active()
            ->first();


        return ProductDetailResource::make($this->productDetail);
    }
    public function reviews()
    {
        $reviews = ProductReview::where('product_id', $this->productDetail['id'])
            ->whereNull('review_id')
            ->with('user', 'reply')
            ->select('id', 'comment', 'user_id', 'created_at', 'review_id')
            ->latest()
            ->get();


        return ReviewsResource::collection($reviews);
    }

    public function getBreadcrumb()
    {

        return  ProductCategoriesResource::collection($this->productDetail->categories);
    }
    public function getSizeOptions()
    {

        return  SizeOptionsResource::collection($this->productDetail->stockSizeOptions);
    }

    public function getProductImages()
    {

        return  ProductImagesResource::collection($this->productDetail->productImages);
    }

    public function getRelatedProducts()
    {

        $relatedProducts = Product::query()
            ->RelatedProducts($this->productDetail['id'], $this->productDetail['categories']->pluck('id'))
            ->get();

        return ProductsListResource::collection($relatedProducts);
    }

    public function createComment($product_id, $comment)
    {
        $currentDate = Carbon::now('GMT+3');

        ProductReview::create([
            'user_id' => auth()->id(),
            'product_id' => $product_id,
            'comment' => $comment,
            'create_at' =>  $currentDate
        ]);
    }
}