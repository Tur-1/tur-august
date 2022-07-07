<?php

namespace App\Modules\Backend\Colors\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class StoreColorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'name' => 'required|max:60|unique:colors',
        ];


        if ($this->getMethod() != 'POST') {
            $rules['image'] = Arr::prepend($rules['image'], 'sometimes');
            $rules['name'] .= ",name,{$this->color->id}";
        }


        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'The color name is required',
            'image.required' => 'The color Image is required',

        ];
    }
}