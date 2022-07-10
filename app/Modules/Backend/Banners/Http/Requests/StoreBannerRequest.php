<?php

namespace App\Modules\Backend\Banners\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'title' => 'required',
            'link' => 'nullable',
            'image' => ['required',  'file', 'image', 'mimes:jpeg,png,jpg', 'max:5000'],
            'type' => 'required|in:small,medium,large',

        ];


        if ($this->getMethod() != 'POST') {
            $rules['image'] = Arr::prepend($rules['image'], 'sometimes');
        }


        return $rules;
    }
    public function messages()
    {
        return [
            'title.required' => 'The banner title is required',
            'image.required' => 'The banner Image is required',

        ];
    }
}