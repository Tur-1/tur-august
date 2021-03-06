<?php

namespace App\Modules\Backend\Users\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'nullable',
            'gender' => 'nullable|in:Female,Male',
        ];

        if ($this->getMethod() != 'POST') {

            $rules['email'] = [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id)
            ];

            $rules['password'] = 'sometimes';
        }


        return $rules;
    }
}