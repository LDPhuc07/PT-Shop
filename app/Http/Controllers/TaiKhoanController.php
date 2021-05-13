<?php

namespace App\Http\Controllers;

use App\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\DangKyRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function getDangNhapAdmin() {
        return view('admin.login');
    }

    public function postDangNhapAdmin(DangNhapRequest $requets) {
        $email = $requets->email;
        $password = $requets->mat_khau;
        if(Auth::attempt(['email' => $email, 'password' => $password, 'admin' => true])) {
            return view('admin.dashboard.index');
        }
        else {
            return redirect()->back()->with('thong_bao','Email hoặc mật khẩu không chính xác'); 
        }
    }

    public function dangXuatAdmin() { 
        Auth::logout();
        return redirect('admin/login');
    }

    public function getDangKyAdmin() {
        return view('admin.sign_up');
    }
    public function postDangKyAdmin(DangKyRequest $requests) {
        $newAccount=new TaiKhoan();
        $newAccount->ho_ten = $requests->ho_ten;
        $newAccount->email = $requests->email;
        $newAccount->password = Hash::make($requests->mat_khau);
        $newAccount->so_dien_thoai = $requests->so_dien_thoai;
        $newAccount->admin = true;
        $newAccount->save();
        return redirect('admin/login')->with('thong-bao', 'Đăng ký thánh công');
    }
}
