<?php

namespace App\Services\Frontend\UserAddress;

class UserAddressService
{
    public function getUserAdresses()
    {
        return auth()->user()->addresses->map(fn ($address) =>  $this->userAddressItem($address));
    }
    public function findUserAddress($address_id)
    {
        return  auth()->user()->addresses->find($address_id);
    }
    public function createAddress($validatedRequest)
    {
        auth()->user()->addresses()->create($validatedRequest);
    }
    private function userAddressItem($address)
    {
        return [
            'address_id' => $address->id,
            'full_name' => $address->full_name,
            'address' =>  $address->address,
            'city' =>  $address->city,
            'phone_number' => $address->phone_number,
            'street' =>  $address->street,
        ];
    }
}