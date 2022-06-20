<?php

namespace App\Http\Requests\Backend;

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
            'information' => 'required',
            'productImages.*.image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000',
            'images.*.is_main_image' => 'nullable',
            'price' => 'required|numeric',
            'discount_amount' => 'nullable|numeric|required_with:discount_start_at,discount_expires_at',
            'discount_start_at' => 'nullable|required_with:discount_amount',
            'discount_expires_at' => 'nullable|required_with:discount_amount',
            'brand_id' => 'required',
            'color_id' => 'required',
            'category_id' => 'required',
            'section_id' => 'required',
            'InputFields.0.size_id' => 'required|distinct',
            'InputFields.0.stock' => 'required|numeric',
            'InputFields.*.size_id' => 'sometimes|required|distinct',
            'InputFields.*.stock' => 'sometimes|required|numeric'
        ];

        return $rules;
    }
}