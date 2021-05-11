<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;
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
            return redirect()->back(); 
        }
    }
}
