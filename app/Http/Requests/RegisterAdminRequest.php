<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
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
            'first_name'         => 'required',
            'last_name'          => 'required',
            'phone_number'       => 'required|digits:10',
            'email'              => 'required|email|unique:admin_registers,email',
            'password'           => 'required|min:6',
            'confirm_password'   => 'required|same:password',
            'address'            => 'required',
            'city'               => 'required',
            'male'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.*'            =>  'Họ không được để trống',
            'last_name.*'             =>  'Tên không được để trống',
            'phone_number.*'          =>  'Số điện thoại phải đủ 10 kí tự',
            'email.email'             =>  'Email không đúng định dạng',
            'email.unique'            =>  'Email đã tồn tại',
            'password.*'              =>  'Mật khẩu phải từ 6 ký tự',
            'confirm_password.*'      =>  'Mật khẩu nhập lại không giống',
            'address.*'               =>  'Địa chỉ không được để trống',
            'city.*'                  =>  'Thành phố không được để trống',
            'gioi_tinh.*'             =>  'Giới tính phải chọn theo yêu cầu',
        ];
    }
}
