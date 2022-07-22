<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserContactRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'feedback' => 'required',
            'option' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Duoi 100',
            'email.required' => 'Email yeu cau',
            'email.email' => 'Nhap dung dang email',
            'phone.required' => 'Phone yeu cau',
            'phone.numeric' => 'Nhap dung dang phone',
            // 'phone.min' => 'Tren 9',
            // 'phone.max' => 'Duoi 13',
            'feedback.required' => 'Phan hoi yeu cau',
            'option.required' => 'Yeu cau lua chon',
            'option.integer' => 'Nhap dung dang yeu cau',
        ];
    }
}
