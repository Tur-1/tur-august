<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'code' => ['required', Rule::unique('coupons', 'code')],
            'type' => 'required|in:percentage,Fixed',
            'amount' => 'required|numeric',
            'expires_at' => 'required|date',
            'minimum_purchases' => 'required|numeric',
            'use_times' => 'required',
            'used_times' => 'nullable',
        ];

        if (request('type') == 'percentage') {
            $rules['amount'] .= '|max:100';
        }

        if ($this->getMethod() != 'POST') {
            $rules['code'] = ['required', Rule::unique('coupons', 'code')->ignore($this->coupon->id)];
        }

        return $rules;
    }
}