<?php

namespace App\Modules\Backend\OrderStatus\Services;

use Illuminate\Support\Str;
use App\Actions\Backend\StoreModelImageAction;

class OrderStatusService
{
    private $imageFolder = 'order_status';

    public function saveStatus($orderStatus, $request)
    {


        $orderStatus->name = Str::title($request->name);
        $orderStatus->slug = Str::slug($request->name);
        $orderStatus->description = $request->description;
        $orderStatus->image = (new StoreModelImageAction)->saveImage($request, $this->getStatusOldImagePath($orderStatus), $this->imageFolder);

        $orderStatus->save();
    }

    public function getStatusOldImagePath($orderStatus)
    {
        return $this->imageFolder . '/' . $orderStatus->image;
    }
}