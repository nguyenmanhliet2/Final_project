<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRegisterRequest extends FormRequest
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

    public function rules()
    {
        return [
            'first_name'         =>  'required|min:4|max:50',
            'last_name'          =>  'required|min:4|max:50',
            'phone_number'       =>  'required|digits:10|unique:client_registers,phone_number',
            'email'              =>  'required|email|unique:client_registers,email',
            'password'           =>  'required|min:6|max:50',
            're_password'        =>  'required|same:password',
            'address'            =>  'required|min:6',
            'city'               =>  'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'required'      =>  ':attribute must not be empty!',
            'max'           =>  ':attribute is too long',
            'min'           =>  ':attribute is too short',
            'exists'        =>  ':attribute is not exists',
            'boolean'       =>  ':attribute must choose True/False',
            'unique'        =>  ':attribute is exists',
            'same'          =>  ':attribute and password must be the same',
            'digits'        =>  ':attribute must be 10 numbers',
        ];
    }

    public function attributes()
    {
        return [
            'first_name'        =>  'First Name',
            'last_name'         =>  'Last Name',
            'phone_number'      =>  'Phone Number',
            'email'             =>  'Email',
            'password'          =>  'Password',
            're_password'       =>  'Password Retype',
            'address'           =>  'Address',
            'city'              =>  'City',
        ];
    }
}
