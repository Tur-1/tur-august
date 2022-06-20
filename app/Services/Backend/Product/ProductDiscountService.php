<?php

namespace App\Services\Backend\Product;

class ProductDiscountService
{
    public function getDiscountedPrice($request)
    {
        if ($this->isDiscountTypePercentage($request)) {
            return $this->calculateDiscountedPriceInPercentages($request);
        } else {
            return $request->price - $request->discount_amount;
        }
    }
    private function calculateDiscountedPriceInPercentages($request)
    {
        return  $request->price - ($request->price * $request->discount_amount / 100);
    }


    private function isDiscountTypePercentage($request)
    {
        return $request->discount_type == 'percentage';
    }
}