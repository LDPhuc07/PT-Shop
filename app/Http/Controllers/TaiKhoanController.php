<?php

namespace App\Http\Controllers;

use App\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DoiMatKhauRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function getDangNhapAdmin() {
        return view('admin.login');
    }
    public function getDangNhap() {
        return view('pages.login');
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
    public function postDangNhap(DangNhapRequest $requests) {
        $email = $requests->email;
        $password = $requests->mat_khau;
        $remember = $requests->remember;
        if(Auth::attempt(['email' => $email, 'password' => $password, 'admin' => false],$remember)) {
            if(Auth::user()->trang_thai == 1) {
                return redirect()->route('index');
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
    public function dangXuat() { 
        Auth::logout();
        return redirect()->route('accounts.login');
    }
    public function getDangKyAdmin() {
        return view('admin.sign_up');
    }
    public function getDangKy() {
        return view('pages.sign_up');
    }
    public function postDangKy(DangKyRequest $requests) {
        $newAccount=new TaiKhoan();
        $newAccount->ho_ten = $requests->ho_ten;
        $newAccount->email = $requests->email;
        $newAccount->password = Hash::make($requests->mat_khau);
        $newAccount->admin = false;
        $newAccount->save();
        return redirect()->route('accounts.login');
    }
    public function postDangKyAdmin(DangKyRequest $requests) {
        $newAccount=new TaiKhoan();
        $newAccount->ho_ten = $requests->ho_ten;
        $newAccount->email = $requests->email;
        $newAccount->password = Hash::make($requests->mat_khau);
        $newAccount->so_dien_thoai = $requests->so_dien_thoai;
        $newAccount->admin = true;
        $newAccount->save();
        return redirect()->route('admin.accounts.login');
    }
    public function index() {
        $array = ['arrays'=>TaiKhoan::all()];
        return view('admin.account.index', $array);
    }
    public function lock($id) {
        $new = TaiKhoan::find($id);
        $new->trang_thai = false;
        $new->save();
        $array = ['arrays'=>TaiKhoan::all()];
        return view('admin.account.lock_account_ajax', $array);
    }
    public function unlock($id) {
        $new = TaiKhoan::find($id);
        $new->trang_thai = true;
        $new->save();
        $array = ['arrays'=>TaiKhoan::all()];
        return view('admin.account.lock_account_ajax', $array);
    }
    public function getDoiMatKhauAdmin() {
        return view('admin.account.change_password');
    }
    public function putDoiMatKhauAdmin(DoiMatKhauRequest $requests, $id) {
        if(Auth::attempt(['email' => Auth::user()->email, 'password' => $requests->mat_khau_cu])) {
            if(Auth::user()->trang_thai == 1) {
                $new = TaiKhoan::find($id);
                $new->password = Hash::make($requests->mat_khau_moi);
                $new->save();
                return redirect()->route('admin.products');
            }
            else {
                return redirect()->back()->with('thong_bao','Tài khoản đã bị khóa');
            }
        } else {
            return redirect()->back()->with('thong_bao','Mật khẩu không hợp lệ');
        }
    }
    public function putDoiMatKhau(DoiMatKhauRequest $requests, $id) {
        if(Auth::attempt(['email' => Auth::user()->email, 'password' => $requests->mat_khau_cu])) {
                $new = TaiKhoan::find($id);
                $new->password = Hash::make($requests->mat_khau_moi);
                $new->save();
                return redirect()->route('index');
        } else {
            return redirect()->back()->with('thong_bao','Mật khẩu không hợp lệ');
        }
    }
    public function editAccountAdmin($id) {
        $array = ['arrays'=>taiKhoan::where('id',$id)->get()];
        return view('admin.account.edit_account',$array);
    }
    public function updateAccountAdmin(Request $requests, $id) {
        $requests->validate([
            'ho_ten' => 'required'
        ],[
            'ho_ten.required' => 'Vui lòng nhập họ và tên'
        ]);
        $new = TaiKhoan::find($id);
        $new->ho_ten = $requests->ho_ten;
        if(Auth::user()->email != $requests->email) {
            $requests->validate([
                'email' => 'required|email|unique:tai_khoans,email'
            ],[
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã được đăng ký'
            ]);
            $new->email = $requests->email;
        }
        if(Auth::user()->so_dien_thoai != $requests->so_dien_thoai) {
            $requests->validate([
                'so_dien_thoai' => 'unique:tai_khoans,so_dien_thoai'
            ],[
                'so_dien_thoai.unique' => 'Số điện thoại đã được đăng ký'
            ]);
            $new->so_dien_thoai = $requests->so_dien_thoai;
        }
        $new->dia_chi = $requests->dia_chi;
        $new->save();
        return redirect()->route('admin.products');
    }
    public function updateAccount(Request $requests, $id) {
        $requests->validate([
            'ho_ten' => 'required'
        ],[
            'ho_ten.required' => 'Vui lòng nhập họ và tên'
        ]);
        $new = TaiKhoan::find($id);
        $new->ho_ten = $requests->ho_ten;
        if(Auth::user()->email != $requests->email) {
            $requests->validate([
                'email' => 'required|email|unique:tai_khoans,email'
            ],[
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã được đăng ký'
            ]);
            $new->email = $requests->email;
        }
        if(Auth::user()->so_dien_thoai != $requests->so_dien_thoai) {
            $requests->validate([
                'so_dien_thoai' => 'unique:tai_khoans,so_dien_thoai'
            ],[
                'so_dien_thoai.unique' => 'Số điện thoại đã được đăng ký'
            ]);
            $new->so_dien_thoai = $requests->so_dien_thoai;
        }
        $new->dia_chi = $requests->dia_chi;
        $new->save();
        return redirect()->route('index');
    }
    public function quanLyTaiKhoan($id) {
        $array = ['arrays'=>taiKhoan::where('id',$id)->get()];
        return view('pages.account',$array);
    }
    public function search(Request $requests) {
        $key = $requests->search;
        $key_admin = $requests->admin;
        // dd($requests->all());
        
        // if($key_admin != null) {
        //     if($key_admin == 1) {
        //         $array = ['arrays'=>TaiKhoan::where('admin','=',true)
        //         ->where('ho_ten','LIKE','%'.$key.'%')
                                    
        //                             ->orWhere('email','LIKE',$key)
        //                             ->orWhere('so_dien_thoai','LIKE',$key)
        //                             ->get()];
        //     } else {
        //         $array = ['arrays'=>TaiKhoan::where('ho_ten','LIKE','%'.$key.'%')
        //                             ->orWhere('email','LIKE',$key)
        //                             ->orWhere('so_dien_thoai','LIKE',$key)
        //                             ->where('admin','=',false)
        //                             ->get()];
        //     }
        // }
        // else {\
        $query = TaiKhoan::Where(function ($a) use ($key, $key_admin)
         {
            
                                    if($key_admin != 'null')
                                    {
                                        $a->where('ho_ten','LIKE','%'.$key.'%');
                                        // dd(!empty($key_admin));
                                        if($key_admin == '1')
                                        {
                                            $a->where('admin',true);  
                                        }
                                        if($key_admin == '0')
                                        {
                                            $a->where('admin',false);
                                        }
                       
                                    }
                                    if($key_admin == 'null')
                                    {
                                        $a->where('ho_ten','LIKE','%'.$key.'%');
                                    }
                                   
        })          
        ->orWhere(function ($a) use ($key, $key_admin)
        {
                                if($key_admin != 'null')
                                    {
                                        $a->where('email',$key);
                                        // dd(!empty($key_admin));
                                        if($key_admin == '1')
                                        {
                                            $a->where('admin',true);  
                                        }
                                        if($key_admin == '0')
                                        {
                                            $a->where('admin',false);
                                        }
                       
                                    }
                                if($key_admin == 'null')
                                {
                                    $a->where('email','LIKE',$key);
                                } 
        })
        ->orWhere(function ($a) use ($key, $key_admin)
         {
                                    if($key_admin != 'null')
                                    {
                                        $a->where('so_dien_thoai','LIKE','%'.$key.'%');
                                        // dd(!empty($key_admin));
                                        if($key_admin == '1')
                                        {
                                            $a->where('admin',true);  
                                        }
                                        if($key_admin == '0')
                                        {
                                            $a->where('admin',false);
                                        }

                                    }
                                    if($key_admin == 'null')
                                    {
                                            $a->where('so_dien_thoai','LIKE','%'.$key.'%');
                                    } 
                                     
        });
        $array = ['arrays'=> $query->get()];
        // dd($array);
        return view('admin.account.index', $array);
    }
}
