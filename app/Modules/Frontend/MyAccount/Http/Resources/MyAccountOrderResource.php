<?php

namespace App\Modules\Frontend\MyAccount\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MyAccountOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'created_at' =>  Carbon::createFromDate($this->created_at)->format('F  d ,Y'),
            'shipping_fees' => $this->shipping_fees,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'status' => $this->status->name,

        ];
    }
}