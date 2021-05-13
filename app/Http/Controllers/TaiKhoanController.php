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

    public function postDangNhapAdmin(DangNhapRequest $requests) {
        $email = $requests->email;
        $password = $requests->mat_khau;
        $remember = $requests->remember;
        if(Auth::attempt(['email' => $email, 'password' => $password, 'admin' => true],$remember)) {
            if(Auth::user()->trang_thai == 1) {
                return redirect('admin/dashboards');
            }
            else {
                return redirect()->back()->with('thong_bao','Tài khoản đã bị khóa');
            }
        }
        else {
            return redirect()->back()->with('thong_bao','Email hoặc mật khẩu không chính xác'); 
        }
    }

    public function dangXuatAdmin() { 
        Auth::logout();
        return redirect()->route('admin.accounts.login');
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
    public function index() {
        $array = ['arrays'=>TaiKhoan::all()];
        return view('admin.account.index', $array);
    }
    public function lock($id) {
        $new = TaiKhoan::find($id);
        $new->trang_thai = false;
        $new->save();
        return redirect()->route('admin.accounts');
    }
    public function unlock($id) {
        $new = TaiKhoan::find($id);
        $new->trang_thai = true;
        $new->save();
        return redirect()->route('admin.accounts');
    }
}
