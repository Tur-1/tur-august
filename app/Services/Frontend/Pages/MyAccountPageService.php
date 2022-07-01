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