<?php

namespace App\Modules\Backend\Orders\Http\Controllers;

use Carbon\Carbon;
use App\Models\order\Order;
use Illuminate\Http\Request;
use App\Models\order\OrderStatus;
use App\Http\Controllers\Controller;
use App\Traits\RedirectWithMessageTrait;
use App\Modules\Frontend\MyAccount\Http\Resources\MyAccountOrderResource;
use App\Modules\Frontend\MyAccount\Http\Resources\MyAccountOrderProductsResource;
use App\Modules\Frontend\MyAccount\Http\Resources\MyAccountUserAddressesResource;

class OrdersController extends Controller
{

    use RedirectWithMessageTrait;
    private $routeName = 'admin.orders.index';


    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }
    public function index()
    {
        $orders_status = OrderStatus::WithOrders()->get();

        $orders = $this->getOrders($orders_status);

        return view('Backend.pages.orders.orders-page', compact('orders_status', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $order->load('products',  'status', 'address', 'user', 'coupon');

        $products = MyAccountOrderProductsResource::collection($order->products)->resolve();
        $address = MyAccountUserAddressesResource::make($order->address)->resolve();

        $orders_status = OrderStatus::pluck('name', 'id');
        $date = Carbon::createFromDate($order->order_date);

        return view('Backend.pages.orders.show-order-page', compact('order', 'products', 'address', 'orders_status', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update(['order_status_id' => $request->order_status_id]);

        $message = ' order status has been updated successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function destroy(Order $order)
    {

        $order->delete();

        $message = ' order has been Deleted successfully';
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
    private function getOrders($orders_status)
    {
        $orders = collect([]);
        foreach ($orders_status as $status) {
            foreach ($status->orders as $order) {
                $orders->push($order);
            }
        }
        $sorted = $orders->sortDesc();

        $orders = $sorted->values()->all();

        return $orders;
    }
}