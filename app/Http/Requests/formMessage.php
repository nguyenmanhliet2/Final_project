<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formMessage extends FormRequest
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
                'message'         => 'required|max:200',
            ];
    }
    public function messages()
    {
        return[
            'message.required'=>'messages must not be empty',
            'message.max'=>'Maximum 200 words',

        ];
    }
}
