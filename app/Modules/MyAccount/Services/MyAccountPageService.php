<?php

namespace App\Modules\MyAccount\Services;

use App\Modules\MyAccount\Http\Resources\MyAccountOrderResource;
use App\Modules\MyAccount\Http\Resources\MyAccountUserInfoResource;
use App\Modules\MyAccount\Http\Resources\MyAccountOrderProductsResource;
use App\Modules\MyAccount\Http\Resources\MyAccountUserAddressesResource;

class MyAccountPageService
{
    public  $order;
    public function getAuthenticatedUser()
    {
        return MyAccountUserInfoResource::make(auth()->user());
    }
    public function getUserOrders()
    {
        return auth()->user()->orders;
    }

    public function updatePhoneNumber($phoneNumber)
    {
        auth()->user()->update(['phone_number' => intval($phoneNumber)]);
    }
    public function updatePassword($password)
    {
        auth()->user()->update(['password' => $password]);
    }
    public function updateAccountInfo($information)
    {
        auth()->user()->update($information);
    }
}