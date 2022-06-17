<?php

namespace App\Services\Backend\Product;

use App\Traits\FileUpload;
use App\Models\product\ProductImage;
use Illuminate\Database\Eloquent\Model;

class ProductImageService
{
    use FileUpload;

    public  function saveProductImages(Model $product, $productImages)
    {
        if (is_null($productImages))  return;

        $images = [];
        $imagesFolder = 'products/product_' . $product->id;

        foreach ($productImages as $image) {

            $newImageName = $this->uploadImageInStorage($image['image'], $imagesFolder);

            $images[] = [
                'image' => $newImageName,
                'is_main_image' => $image['is_main_image'] ?? 0
            ];
        }


        $this->setMainImageForFirstImage($images); // if there is no main image then the first image will be the main image

        $product->productImages()->createMany($images);
    }

    public function getProductImages($productId)
    {
        return  ProductImage::query()
            ->where('product_id', $productId)
            ->get()
            ->map(function ($productImage) {
                return  $this->productImage(false, $productImage);
            })->toArray();
    }
    public function productImage(bool $mainImage = false, $productImage = null)
    {
        return [
            "id" => $productImage?->id,
            "product_id" => $productImage?->product_id,
            "image_url" => $productImage->image_url ?? asset('assets/images/defult-input-image.png'),
            "is_main_image" => $productImage?->is_main_image
        ];
    }

    public function destroyProductImage($imageId)
    {
        $imageModel = ProductImage::find($imageId);

        if (!is_null($imageModel)) {
            $this->destroyModelWithImage($imageModel,  $imageModel['product_image_path']);
        }
    }
    public function changeMainImage($image_id, $productId): void
    {

        ProductImage::query()->where('product_id', $productId)->update(['is_main_image' => false]);
        ProductImage::query()->where('id', $image_id)->update(['is_main_image' => true]);
    }

    private function setMainImageForFirstImage($images): void
    {
        if (!in_array(true, collect($images)->pluck('is_main_image')->toArray())) {
            $images[0]['is_main_image']  = true;
        }
    }
}