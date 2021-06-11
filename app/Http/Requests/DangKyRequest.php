<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
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
            'ho_ten' => 'required',
            'email' => 'required|email|unique:tai_khoans,email',
            'mat_khau' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau|same:mat_khau',
            'so_dien_thoai' => 'numeric|unique:tai_khoans,so_dien_thoai'
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Vui lòng nhập họ và tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã đã được đăng ký',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu',
            'mat_khau.min' => 'Mật khẩu phải từ 6 ký tự trở lên',
            'nhap_lai_mat_khau.required_with' => 'Nhập lại mật khẩu không hợp lệ',
            'nhap_lai_mat_khau.same' => 'Nhập lại mật khẩu không hợp lệ',
            'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
            // 'so_dien_thoai.size' => 'Số điện thoại phai la 10',
            'so_dien_thoai.numeric' => 'Số điện thoại không hợp lệ',
            'so_dien_thoai.unique' => 'Số điện thoại đã được đăng ký'
        ];
    }
}
