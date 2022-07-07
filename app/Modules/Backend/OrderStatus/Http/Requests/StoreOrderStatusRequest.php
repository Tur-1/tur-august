<?php

namespace App\Modules\Backend\OrderStatus\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'name' => "required|max:60|unique:order_statuses",
            'description' => 'nullable'
        ];


        if ($this->getMethod() != 'POST') {
            $rules['image'] = Arr::prepend($rules['icon'], 'sometimes');
            $rules['name'] .= ",status,{$this->orderStatus->id}";
        }

        return $rules;
    }
}