<?php

namespace App\Modules\Frontend\MyAccount\Services;

use App\Modules\Frontend\MyAccount\Http\Resources\MyAccountOrderResource;
use App\Modules\Frontend\MyAccount\Http\Resources\MyAccountUserInfoResource;
use App\Modules\Frontend\MyAccount\Http\Resources\MyAccountOrderProductsResource;
use App\Modules\Frontend\MyAccount\Http\Resources\MyAccountUserAddressesResource;

class OrderPageService
{
    public  $order;


    public function getOrder($orderId)
    {
        $this->order = auth()->user()->orders()->with('address', 'products', 'status')->find($orderId);

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