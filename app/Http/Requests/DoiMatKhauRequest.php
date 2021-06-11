<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoiMatKhauRequest extends FormRequest
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
            'mat_khau_cu' => 'required',
            'mat_khau_moi' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau_moi|same:mat_khau_moi'
        ];
    }
    public function messages()
    {
        return [
            'mat_khau_cu.required' => 'Vui lòng nhập mật khẩu cũ',
            'mat_khau_moi.required' => 'Vui lòng nhập mật khẩu mới',
            'mat_khau_moi.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'nhap_lai_mat_khau.required_with' => 'Vui lòng nhập lại mật khẩu',
            'nhap_lai_mat_khau.same' => 'Nhập lại mật khẩu không khớp',
        ];
    }
}
