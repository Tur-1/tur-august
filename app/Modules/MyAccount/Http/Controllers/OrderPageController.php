<?php

namespace App\Modules\MyAccount\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\MyAccount\Services\OrderPageService;

class OrderPageController extends Controller
{
    public function orderPage($orderId, OrderPageService $orderPageService)
    {
        $order = $orderPageService->getOrder($orderId);
        $products = $orderPageService->getOrderProducts();
        $address = $orderPageService->getOrderAddress();

        return Inertia::render('MyAccountPage/components/MyOrders/OrderPage/Index', [
            'order' => $order,
            'products' => $products,
            'address' => $address,
        ]);
    }
}