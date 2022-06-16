<?php

namespace App\Services\Backend\Product;

use Illuminate\Database\Eloquent\Model;

class StoreProductImagesService
{

    public  function saveProductImages(Model $product, $productImages)
    {
        $images = [];

        foreach ($productImages as $image) {

            $newImageName = $this->generateUniqueName($image['image']);

            $this->uploadeProductImage($image['image'], $newImageName, $product->id);


            $images[] = ['image' => $newImageName, 'is_main_image' => $image['is_main_image']];
        }

        $product->productImages()->createMany($images);
    }


    public function uploadeProductImage($image, $newImageName, $productId)
    {

        $image->storeAs('public/images/products', 'product_' . $productId . '/' . $newImageName);
    }

    public function generateUniqueName($image)
    {
        $file = $image->getClientOriginalName();
        $time = date("d-m-y-H-i-s") . "-" . time();
        $newImageName =   $time . '-' . str_replace(' ', '-',  $file);

        return $newImageName;
    }
}