<?php

namespace App\Modules\Backend\OrderStatus\Http\Controllers;

use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Models\order\OrderStatus;
use App\Http\Controllers\Controller;
use App\Traits\RedirectWithMessageTrait;
use App\Modules\Backend\OrderStatus\Services\OrderStatusService;
use App\Modules\Backend\OrderStatus\Http\Requests\StoreOrderStatusRequest;

class OrderStatusController extends Controller
{
    use RedirectWithMessageTrait, FileUpload;
    private $routeName = 'admin.status.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeResource(OrderStatus::class, 'orderStatus');
    }
    public function index()
    {

        $orderStatuses = OrderStatus::orderBy('id', 'asc')->get();
        return view('Backend.pages.order-status.order-status-page', compact('orderStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.order-status.create-edit-order-status-page');
    }



    public function store(StoreOrderStatusRequest $request, OrderStatus $orderStatus)
    {
        $request->validated();
        (new OrderStatusService())->saveStatus($orderStatus, $request);
        $message = $orderStatus->status . ' status has been Added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderStatus $orderStatus)
    {
        return view('Backend.pages.order-status.create-edit-order-status-page', compact('orderStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrderStatusRequest $request, OrderStatus $orderStatus)
    {
        $request->validated();
        (new OrderStatusService())->saveStatus($orderStatus, $request);
        $message = $orderStatus->status . ' status has been updated successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        if (OrderStatus::count() == 1) return $this->redirectBackWithErrorMsg('you can\'t delete the first status');

        $message = $orderStatus->name . 'status has been Deleted successfully';

        $this->destroyModelWithImage($orderStatus, (new OrderStatusService())->getStatusOldImagePath($orderStatus));
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}