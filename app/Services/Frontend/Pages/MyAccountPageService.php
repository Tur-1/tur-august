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
    public function getUserAddresses()
    {
        return UserAddressesListResource::collection(auth()->user()->addresses);
    }
}