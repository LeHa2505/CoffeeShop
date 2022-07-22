<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'title' => 'required|max:100',
            'category' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'description' => 'required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Đây là trường bắt buộc.",
            'title.max' => "Độ dài tối đa 100 ký tự.",
            'category.required' => "Đây là trường bắt buộc.",
            'category.integer' => "Không đúng định dạng.",
            'image.required' => "Đây là trường bắt buộc.",
            'image.image' => "Chỉ được tải lên ảnh.",
            'image.mimes' => "Ảnh không đúng định dạng.",
            'image.max' => "Ảnh tải lên vượt quá 4MB.",
            'description.required' => "Đây là trường bắt buộc.",
            'description.max' => "Độ dài tối đa 1000 ký tự.",
        ];
    }
}
