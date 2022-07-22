<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
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
        return [
            'name' => 'required|max:64',
            'email' => 'required|unique:users|email:filter',
            'password' => 'required|max:32|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Đây là trường bắt buộc.",
            'name.max' => "Độ dài tối đa là 64 ký tự.",
            'email.required' => "Đây là trường bắt buộc.",
            'password.required' => "Đây là trường bắt buộc.",
            'password.max' => "Mật khẩu có độ dài từ 6 - 32 ký tự.",
            'password.min' => "Mật khẩu có độ dài từ 6 - 32 ký tự.",
        ];
    }
}
