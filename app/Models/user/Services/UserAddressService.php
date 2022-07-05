<?php

namespace App\Models\user\Services;

use App\Http\Resources\User\UserAddressesListResource;

class UserAddressService
{
    public $userAddresses;
    public function getUserAddresses()
    {
        $this->userAddresses = auth()->user()->addresses;
        return  UserAddressesListResource::collection($this->userAddresses)->resolve();
    }
    public function findUserAddress($address_id)
    {
        return  auth()->user()->addresses->find($address_id);
    }
    public function createAddress($validatedRequest)
    {
        auth()->user()->addresses()->create($validatedRequest);
    }
    public function isNotInUserAddresses($address_id)
    {

        return is_null($address_id) || !in_array($address_id, collect($this->userAddresses)->pluck('id')->toArray());
    }
}