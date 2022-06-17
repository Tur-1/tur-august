<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
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

        return [

            'name' => [
                'required',
                'max:60',
                Rule::unique('categories', 'name')->where('id', $this->section_id)
            ], 'section_id' => 'required',
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5000']

        ];
    }
}