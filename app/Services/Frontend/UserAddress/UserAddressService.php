<?php

namespace App\Services\Frontend\UserAddress;

use App\Http\Resources\User\UserAddressesListResource;

class UserAddressService
{
    public function getUserAddresses()
    {
        return  UserAddressesListResource::collection(auth()->user()->addresses);
    }
    public function findUserAddress($address_id)
    {
        return  auth()->user()->addresses->find($address_id);
    }
    public function createAddress($validatedRequest)
    {
        auth()->user()->addresses()->create($validatedRequest);
    }
}