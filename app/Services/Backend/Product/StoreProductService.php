<?php

namespace App\Services\Backend\Product;

use Illuminate\Support\Str;
use App\Models\product\Product;
use App\Models\product\Category;
use Illuminate\Database\Eloquent\Model;
use App\Services\Backend\Product\ProductImageService;
use App\Services\Backend\Product\ProductDiscountService;


class StoreProductService
{

    public function saveProduct($product, $request)
    {


        $product->shipping_cost = $request->shipping_cost;
        $product->details = $request->details;
        $product->information = $request->information;
        $product->meta_title = $request->meta_title;
        $product->meta_keywords = $request->meta_keywords;
        $product->meta_description = $request->meta_description;
        $product->brand_id = $request->brand_id;
        $product->color_id = $request->color_id;
        $product->price = $request->price;
        $product->discount_type = $request->discount_type;
        $product->discount_amount = $request->discount_amount;
        $product->discount_start_at = $request->discount_start_at;
        $product->discount_expires_at = $request->discount_expires_at;
        $product->name = Str::title($request->name);
        $product->is_active = $this->getProductStatus($request);
        $product->slug = $this->generateSlug($request->name, $product->id);
        $product->discounted_price = (new ProductDiscountService())->getDiscountedPrice($request);

        $product->save();

        $this->storeProductSizeOptions($product, $request->inputFields);
        $this->storeProductCategories($product, $request);
        $this->setProductStock($product);
        (new ProductImageService())->saveProductImages($product, $request->productImages);
    }
    private function getProductStatus($request)
    {

        if ($this->isPubliched($request)) return true;

        return false;
    }
    private function isPubliched($request)
    {
        return $request->publich;
    }
    private function generateSlug($product_name, $product_id): string
    {
        $product_slug = Str::slug($product_name);

        if (Product::where('slug',  $product_slug)->where('id', '!=', $product_id)->exists()) { // if exists ? add random strings to product slug 
            $product_slug .=  '-' . Str::random(2) . '-' . rand(1, 100) . '-' . Str::random(1);
        }

        return $product_slug;
    }
    private function storeProductSizeOptions(Model $product, array $inputFields): void
    {
        $product->sizeOptions()->sync($this->getSizeOptions($inputFields));
    }
    private function storeProductCategories(Model $product,  $request): void
    {

        if (is_null($request['category_id']) || empty($request['category_id'])) {
            $parentId = $request['section_id'];
        } else {
            $parentId = $request['category_id'];
        }

        $category = Category::tree()->where("id",  $parentId)->first();
        $ids = $category['parents_ids'] ?? [intval($parentId)];

        $ids[] = $category['id'];
        $parents_ids = array_unique($ids);

        $product->categories()->sync($parents_ids);
    }
    private function getSizeOptions($sizeOptionsRequest): array
    {

        $sizeOptions = [];
        foreach ($sizeOptionsRequest as $size) {

            $sizeOptions[$size['size_id']] = ['size_id' => $size['size_id'], 'stock' => $size['stock']];
        }

        return $sizeOptions;
    }
    private function setProductStock($product)
    {
        $product->update(['stock' => $product->sizeOptions()->sum('stock')]);
    }
}