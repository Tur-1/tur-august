<?php

namespace App\Models\Coupon\Services;

use App\Models\Coupon\Coupon;
use App\Exceptions\InValidCouponCodeException;

class CouponService
{

    public function getCoupon(string $code)
    {


        $this->coupon = Coupon::where('code', $code)
            ->NotExpired()
            ->NotReachedMaximumUses()
            ->first();

        if (is_null($this->coupon)) {
            throw new InValidCouponCodeException('This coupon is not Valid');
        }


        return $this->coupon;
    }

    public function calculateDiscountInPercentages($cartTotal)
    {
        $cartTotal = $cartTotal - ($cartTotal * $this->getCouponAmount() / 100);

        return number_format($cartTotal, 2);
    }
    public function calculateDiscountInFixedAmount($cartTotal)
    {
        $cartTotal =  $cartTotal - $this->getCouponAmount();
        return number_format($cartTotal, 2);
    }
    private function getCouponAmount()
    {
        return $this->coupon->amount;
    }
    public function getCartTotal($cartTotal)
    {
        if ($this->isCouponTypePercentage()) {

            return  $this->calculateDiscountInPercentages($cartTotal);
        }

        return $this->calculateDiscountInFixedAmount($cartTotal);
    }
    public function isCouponTypePercentage()
    {
        return $this->coupon->type == 'percentage';
    }

    public function getDiscountedValue($cartTotal)
    {

        if ($this->isCouponTypePercentage()) {
            $discounted_Value = $this->getCouponAmount() / 100 * $cartTotal;
        } else {
            $discounted_Value =  $this->getCouponAmount();
        }


        return number_format($discounted_Value, 2);
    }
}