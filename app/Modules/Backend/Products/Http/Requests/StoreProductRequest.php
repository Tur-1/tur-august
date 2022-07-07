<?php

namespace App\Modules\Backend\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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

        return  $rules =  [
            'name' => 'required|string',
            'meta_title' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'details' => 'required',
            'is_main_image' => 'nullable',
            'shipping_cost' => 'nullable',
            'info_and_care' => 'required',
            'images.*.image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000',
            'images.*.is_main_image' => 'nullable',
            'price' => 'required|numeric',
            'discount_amount' => 'nullable|numeric|required_with:discount_start_at,discount_expires_at',
            'discount_start_at' => 'nullable|required_with:discount_amount',
            'discount_expires_at' => 'nullable|required_with:discount_amount',
            'brand_id' => 'required',
            'color_id' => 'required',
            'category_id' => 'required',
            'section_id' => 'required',
            'inputFields.0.size_id' => 'required|distinct',
            'inputFields.0.stock' => 'required|numeric',
            'inputFields.*.size_id' => 'sometimes|required|distinct',
            'inputFields.*.stock' => 'sometimes|required|numeric'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'inputFields.*.size_id.required' => 'The size field can\'t be Empty',
            'inputFields.*.size_id.distinct' => 'The size field has a duplicate value',
            'inputFields.*.stock.numeric' => 'The stock field must be a number',
            'inputFields.*.stock.required' => 'The stock field can\'t be Empty',
        ];
    }
}