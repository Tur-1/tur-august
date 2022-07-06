<?php

namespace App\Modules\Checkout\Services;

use App\Models\Coupon\Coupon;
use Illuminate\Support\Facades\Session;
use App\Modules\Checkout\Exceptions\InValidCouponCodeException;

class CheckoutCouponService
{
    public $coupon;

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
    public function increaseCouponUsedTimes($copuon)
    {
        if (!is_null($copuon)) $copuon->increment('used_times', 1);
    }
    public function putCartTotalAndCouponInSession($cartTotal)
    {
        Session::put('cartTotalWithCoupon', $this->getCartTotalWithCoupon($cartTotal));
    }
    private function calculateDiscountInPercentages($cartTotal)
    {
        $cartTotal = $cartTotal - ($cartTotal * $this->getCouponAmount() / 100);

        return number_format($cartTotal, 2, '.', '');
    }
    private function calculateDiscountInFixedAmount($cartTotal)
    {
        $cartTotal =  $cartTotal - $this->getCouponAmount();
        return number_format($cartTotal, 2, '.', '');
    }
    private function getCouponAmount()
    {
        return $this->coupon->amount;
    }
    private function getCartTotalAfterDiscount($cartTotal)
    {
        if ($this->isCouponTypePercentage()) {

            return  $this->calculateDiscountInPercentages($cartTotal);
        }

        return $this->calculateDiscountInFixedAmount($cartTotal);
    }
    private function isCouponTypePercentage()
    {
        return $this->coupon->type == 'percentage';
    }

    private function getDiscountedValue($cartTotal)
    {

        if ($this->isCouponTypePercentage()) {
            $discounted_Value = $this->getCouponAmount() / 100 * $cartTotal;
        } else {
            $discounted_Value =  $this->getCouponAmount();
        }


        return number_format($discounted_Value, 2);
    }
    private function getCartTotalWithCoupon($cartTotal)
    {
        return [
            'cartTotal' => $this->getCartTotalAfterDiscount($cartTotal),
            'coupon' => [
                'code' => $this->coupon->code,
                'discounted_value' =>  $this->getDiscountedValue($cartTotal),
                'successMsg' => 'coupon applied',
            ]
        ];
    }
}