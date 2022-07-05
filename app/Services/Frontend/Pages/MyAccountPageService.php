<?php

namespace App\Services\Frontend\Pages;

use App\Http\Resources\User\AuthUserResource;
use App\Http\Resources\User\UserAddressesListResource;

class MyAccountPageService
{
    public function getAuthenticatedUser()
    {
        return AuthUserResource::make(auth()->user());
    }
    public function getUserOrders()
    {
        return auth()->user()->orders;
    }
    public function findUserOrder($orderId)
    {
        return auth()->user()->orders()->with('address', 'products')->find($orderId);
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