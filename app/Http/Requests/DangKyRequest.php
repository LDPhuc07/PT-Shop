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
            'ho_ten' => 'required|max:50',
            'email' => 'required|email|unique:tai_khoans,email|max:50',
            'mat_khau' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau|same:mat_khau',
            'so_dien_thoai' => 'required|digits:10|numeric|unique:tai_khoans,so_dien_thoai',
            'anh_dai_dien' => 'mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Vui lòng nhập họ và tên',
            'ho_ten.max' => 'Họ và tên không quá 50 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã đã được đăng ký',
            'email.max' => 'Email không quá 50 ký tự',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu',
            'mat_khau.min' => 'Mật khẩu phải từ 6 ký tự trở lên',
            'nhap_lai_mat_khau.required_with' => 'Nhập lại mật khẩu không hợp lệ',
            'nhap_lai_mat_khau.same' => 'Nhập lại mật khẩu không hợp lệ',
            'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
            'so_dien_thoai.digits' => 'Số điện thoại phải có 10 số',
            'so_dien_thoai.numeric' => 'Số điện thoại không hợp lệ',
            'so_dien_thoai.unique' => 'Số điện thoại đã được đăng ký',
            'anh_dai_dien.mimes' => 'Hình ảnh không hợp lệ'
        ];
    }
}
