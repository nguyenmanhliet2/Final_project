<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id'            => 'required|exists:products,id',
            'quantity_product'      => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'required'      => ':attribute must not be empty',
            'exists'        => ':attribute not exists',
            'numeric'       => ':attribute must be a number',
            'min'           => ':attribute must be larger than 0',
        ];
    }

    public function attributes()
    {
        return [
            'product_id'            => 'Product',
            'quantity_product'      => 'Quantity',
        ];
    }
}
