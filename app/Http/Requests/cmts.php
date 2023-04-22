<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cmts extends FormRequest
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
                'noi_dung_cmt'         => 'required|max:200',

            ];
    }
    public function messages()
    {
        return[
            'noi_dung_cmt.required'=>'không được để trống comment',
            'noi_dung_cmt.max'=>'tối đa 200 kí tự',

        ];
    }
}
