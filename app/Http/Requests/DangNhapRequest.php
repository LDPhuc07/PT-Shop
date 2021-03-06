<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
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
            'email' => 'required',
            'mat_khau' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu'
        ];
    }
}
