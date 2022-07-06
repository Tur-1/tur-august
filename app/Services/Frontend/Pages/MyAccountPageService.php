<?php

namespace App\Services\Frontend\Pages;

use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\User\AuthUserResource;
use App\Http\Resources\Product\OrderProductsResource;
use App\Http\Resources\User\UserAddressesListResource;

class MyAccountPageService
{
    public  $order;
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
        $this->order = auth()->user()->orders()->with('address', 'products')->find($orderId);


        return OrderResource::make($this->order);
    }
    public function getOrderProducts()
    {

        return OrderProductsResource::collection($this->order->products)->resolve();
    }
    public function getOrderAddress()
    {
        return UserAddressesListResource::make($this->order->address)->resolve();
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