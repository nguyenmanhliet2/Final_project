<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientLoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email'     =>  'required',
            'password'  =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'email không được để trống',
            'password.required' => 'Password không được để trống',
        ];
    }
}
