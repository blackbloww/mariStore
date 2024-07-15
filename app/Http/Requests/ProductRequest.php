<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'sale' => ['nullable', 'numeric', 'max:255'],
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được dài quá 255 ký tự.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng không được nhỏ hơn 0.',
            'sale.numeric' => 'Khuyến mãi là số',
            // 'sale.regex' => 'Khuyến mãi phải có ký hiệu %.',
            // 'sale.string' => 'Khuyến mãi phải là một chuỗi ký tự.',
            // 'sale.max' => 'Khuyến mãi không được dài quá 255 ký tự.',
            'img.image' => 'Hình ảnh phải là một tệp hình ảnh.',
            'img.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'img.max' => 'Hình ảnh không được lớn hơn 2048 KB.',
            'img.required' => 'Hình ảnh không được để trống.',

        ];
    }
}
