<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryProductRequest extends FormRequest
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
        return [
            'name_category'     => 'required|max:50|unique:categories,name_category',
            'slug_category'     => 'required|max:50|unique:categories,slug_category',
            'image_category'    => 'require',
            'id_category_root'  => 'nullable|exists:categories,id',
            'is_open'           => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'required'   => ':attributes must not be empty',
            'max'        => ':attributes is too long',
            'exists'     => ':attributes is not exists',
            'boolean'    => ':attributes just True/False',
            'unique'     => ':attributes is exists',
        ];
    }
    public function attributes()
    {
        return [
            'name_category'     => 'Name of Category',
            'slug_category'     => 'Slug of Category',
            'image_category'    => 'Image',
            'id_category_root'  => 'Main Category',
            'is_open'           => 'Status',
        ];
    }
}
