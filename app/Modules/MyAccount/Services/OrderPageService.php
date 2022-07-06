<?php

namespace App\Modules\MyAccount\Services;

use App\Modules\MyAccount\Http\Resources\MyAccountOrderResource;
use App\Modules\MyAccount\Http\Resources\MyAccountUserInfoResource;
use App\Modules\MyAccount\Http\Resources\MyAccountOrderProductsResource;
use App\Modules\MyAccount\Http\Resources\MyAccountUserAddressesResource;

class OrderPageService
{
    public  $order;


    public function getOrder($orderId)
    {
        $this->order = auth()->user()->orders()->with('address', 'products')->find($orderId);

        return MyAccountOrderResource::make($this->order);
    }
    public function getOrderProducts()
    {
        return MyAccountOrderProductsResource::collection($this->order->products)->resolve();
    }
    public function getOrderAddress()
    {
        return MyAccountUserAddressesResource::make($this->order->address)->resolve();
    }
}