<?php

namespace App\Modules\ProductDetail\Services;

use Carbon\Carbon;
use App\Models\product\Product;
use App\Models\product\ProductReview;
use App\Exceptions\PageNotFoundException;
use App\Modules\Shop\Http\Resources\ShopProductsResource;
use App\Modules\Shop\Http\Resources\ShopSizeOptionsResource;
use App\Modules\ProductDetail\Http\Resources\ProductDetailResource;
use App\Modules\ProductDetail\Http\Resources\ProductDetailImagesResource;
use App\Modules\ProductDetail\Http\Resources\ProductDetailReviewsResource;
use App\Modules\ProductDetail\Http\Resources\ProductDetailCategoriesResource;

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

        if (is_null($this->productDetail)) {
            throw new PageNotFoundException();
        }
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


        return ProductDetailReviewsResource::collection($reviews);
    }

    public function getBreadcrumb()
    {

        return  ProductDetailCategoriesResource::collection($this->productDetail->categories);
    }
    public function getSizeOptions()
    {

        return  ShopSizeOptionsResource::collection($this->productDetail->stockSizeOptions);
    }

    public function getProductImages()
    {

        return  ProductDetailImagesResource::collection($this->productDetail->productImages);
    }

    public function getRelatedProducts()
    {

        $relatedProducts = Product::query()
            ->RelatedProducts($this->productDetail['id'], $this->productDetail['categories']->pluck('id'))
            ->get();

        return ShopProductsResource::collection($relatedProducts);
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