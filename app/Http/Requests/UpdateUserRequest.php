<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name'             =>      'required|min:5|max:255',
            'last_name'             =>      'required|min:5|max:255',
            'email'                 =>      'required|email|unique:client_registers,email,'. $this->id,
            'phone_number'          =>      'required|digits:10|unique:client_registers,phone_number,'. $this->id,
            'address'             =>      'required|min:5|max:255',
            'city'             =>      'required|min:5|max:255',
            'male'             =>      'required',
        ];
    }

    public function messages()
    {
        return [
            'required'      =>  ':attribute cannot be left blank',
            'max'           =>  ':attribute too long',
            'min'           =>  ':attribute too short',
            'unique'        =>  ':attribute already exist',
            'digits'        =>  ':attribute must have 10 numbers',
        ];
    }

    public function attributes()
    {
        return [
            'first_name'         =>  'First name',
            'last_name'         =>  'Last name',
            'email'             =>  'Email',
            'phone_number'      =>  'Phone Number',
            'city'      =>  'City',
            'male'      =>  'Male',
            'address'      =>  'Address',
        ];
}
}
