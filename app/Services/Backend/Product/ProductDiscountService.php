<?php

namespace App\Services\Backend\Product;

use Carbon\Carbon;

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
    public function getValidProductDiscount($discounteData): array
    {

        $discounted_price = 0;

        $discount_amount = $discounteData['discount_amount'];

        if ($discounteData['discount_type'] == 'percentage') {

            $discount_amount = $discount_amount . '% OFF';
        } else {

            $discount_amount = $discount_amount . 'SAR';
        }

        $original_price =  $discounteData['price'] . ' SAR';
        if ($this->isDicountValid($discounteData)) {
            $discounted_price =  $discounteData['discounted_price'] . ' SAR';
        }

        return [
            'original_price' => $original_price,
            'discounted_price' => $discounted_price,
            'discount_amount' => $discount_amount
        ];
    }
    private function isDicountValid($discounteData)
    {
        $currentDate =  Carbon::now('GMT+3');
        return  !is_null($discounteData['discounted_price'])  && $currentDate->between($discounteData['discount_start_at'], $discounteData['discount_expires_at']);
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