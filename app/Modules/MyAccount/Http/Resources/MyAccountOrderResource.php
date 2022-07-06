<?php

namespace App\Modules\MyAccount\Http\Resources;

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
            'created_at' => $this->created_at,
            'shipping_fees' => $this->shipping_fees,
            'subtotal' => $this->subtotal,
            'total' => $this->total,

        ];
    }
}