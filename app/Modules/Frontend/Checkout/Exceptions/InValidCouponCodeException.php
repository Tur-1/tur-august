<?php

namespace App\Modules\Frontend\Checkout\Exceptions;

use Exception;

class InValidCouponCodeException extends Exception
{
    public function render($request)
    {
        return response($this->getMessage());
    }
}
