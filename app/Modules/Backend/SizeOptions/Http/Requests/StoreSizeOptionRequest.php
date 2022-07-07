<?php

namespace App\Modules\Backend\SizeOptions\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSizeOptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'name' => 'required|distinct|unique:size_options,name',
        ];


        if ($this->getMethod() != 'POST') {
            $rules['name'] .= ",{$this->sizeOption->id}";
        }

        return $rules;
    }
}