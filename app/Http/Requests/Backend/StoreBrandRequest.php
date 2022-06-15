<?php

namespace App\Http\Requests\Backend;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'name' => 'required|max:60|unique:brands',
        ];


        if ($this->getMethod() != 'POST') {
            $rules['image'] = Arr::prepend($rules['image'], 'sometimes');
            $rules['name'] .= ",name,{$this->brand->id}";
        }


        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'The brand name is required',
            'image.required' => 'The brand Image is required',

        ];
    }
}