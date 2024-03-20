<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
    public function rules() {
        return [
            'product_name' => 'required|string|max:255',
            'brand_id' => 'required',
            'product_price' => 'required',
            'product_discount' => 'required',
            'product_stock' => 'required',
            'product_description' => 'required|string',
            'new_from' => 'nullable|date',
            'new_to' => 'nullable|date',     
        ];
    }

    public function messages() {
        return [
            'product_name.required' => 'Please enter product name!',
            'brand_id.required' => 'Please enter product brand!',
            'product_price.required' => 'Please enter product price!',
            'product_discount.required' => 'Please enter product discount!',
            'product_stock.required' => 'Please enter product stock!',
            'product_description.required' => 'Please enter product description!',
        ];
    }
}
