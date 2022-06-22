<?php

namespace App\Http\Controllers\Backend;

use App\Traits\FileUpload;
use Illuminate\Support\Str;
use App\Traits\AlertMessages;
use App\Models\order\OrderStatus;
use App\Http\Controllers\Controller;
use App\Actions\Backend\StoreModelImageAction;
use App\Http\Requests\Backend\StoreOrderStatusRequest;

class OrderStatusController extends Controller
{
    use AlertMessages, FileUpload;
    private $routeName = 'admin.status.index';
    private $imageFolder = 'order_status';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    private function saveStatus($orderStatus, $request)
    {


        $orderStatus->name = Str::title($request->name);
        $orderStatus->slug = Str::slug($request->name);
        $orderStatus->description = $request->description;
        $orderStatus->image = (new StoreModelImageAction)->saveImage($request, $this->getStatusOldImagePath($orderStatus), $this->imageFolder);

        $orderStatus->save();
    }
    private function getStatusOldImagePath($orderStatus)
    {
        return $this->imageFolder . '/' . $orderStatus->image;
    }
    public function store(StoreOrderStatusRequest $request, OrderStatus $orderStatus)
    {
        $request->validated();
        $this->saveStatus($orderStatus, $request);
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
        $this->saveStatus($orderStatus, $request);
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

        $this->destroyModelWithImage($orderStatus,  $this->getStatusOldImagePath($orderStatus));
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}
