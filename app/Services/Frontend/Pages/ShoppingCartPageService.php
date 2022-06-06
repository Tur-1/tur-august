<?php

namespace App\Services\Frontend\Pages;

use Illuminate\Support\Carbon;

class ShoppingCartPageService
{
    public function getUserShoppingCart()
    {
        return auth()->user()->shoppingCartProducts;
    }
    private function MapOverCartItems($product)
    {
        $FinalProductPrice = $this->GetFinalProductPrice($product);

        $size = $product->SizeOptions->find($product->pivot->size_id);

        $product_quantity =   $size->pivot->stock < $product->pivot->quantity ? $size->pivot->stock : $product->pivot->quantity;

        $cartItem = [
            'cart_item_id' => $product->pivot->id,
            'product_id' => $product->id,
            'product_name' => $product->product_name,
            'product_slug' => $product->product_slug,
            'product_image' => $product->product_image_url,
            'product_old_price' => $FinalProductPrice['product_old_price'],
            'product_final_price' => $FinalProductPrice['product_final_price'],
            'product_size_id' =>  $product->pivot->size_id,
            'product_size_name' =>  $size->size_name,
            'product_stock_size' => $size->pivot->stock,
            'product_quantity' => $product_quantity,
            'product_brand_name' => $product->brand_name,
            'product_shipping_cost' => $product->product_shipping_cost,
            'product_total_price' => $FinalProductPrice['product_final_price'] * $product_quantity,
            'size_options' => $product->SizeOptions,
            'size' => $size,
            'product_stock' => $product->product_stock
        ];


        return $cartItem;
    }
    private function GetFinalProductPrice($product)
    {
        $now = Carbon::now('GMT+3');

        $start_at = $product->product_discount_start_at;
        $expires_at = $product->product_discount_expires_at;

        if (!is_null($product->product_discounted_price) && $now->between($start_at, $expires_at)) {
            $product_old_price = $product->product_price;
            $product_final_price =  $product->product_discounted_price;
        } else {
            $product_final_price =  $product->product_price;
            $product_old_price = null;
        }

        return ['product_old_price' => $product_old_price, 'product_final_price' => $product_final_price];
    }
}