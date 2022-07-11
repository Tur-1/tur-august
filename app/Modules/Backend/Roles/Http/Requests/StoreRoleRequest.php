<?php

namespace App\Modules\Backend\Roles\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'name' => "required|unique:roles",
            'permissions.0' => 'required',
            'permissions.*' =>  'nullable',
        ];


        if ($this->getMethod() != 'POST') {
            $rules['name'] .= ",name,{$this->role->id}";
        }


        return $rules;
    }
}