<?php

namespace App\Http\Controllers;

use App\TaiKhoan;
use App\MangXaHoi;
use App\Socail;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DoiMatKhauRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;

class TaiKhoanController extends Controller
{

    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
        //login in vao trang quan tri
        $account_name = TaiKhoan::where('id',$account->tai_khoans_id)->first();
        Session::put('ho_ten',$account_name->ho_ten);
        Session::put('id',$account_name->id);
        return redirect()->route('index');
        }else{
        
        $hieu = new Social([
        'provider_user_id' => $provider->getId(),
        'provider' => 'facebook'
        ]);
        
        $orang = TaiKhoan::where('email',$provider->getEmail())->first();
        
        if(!$orang){
        $orang = TaiKhoan::create([
        
        'ho_ten' => $provider->getName(),
        'email' => $provider->getEmail(),
        'password' => '',
        'so_dien_thoai' => '',
        'anh_dai_dien' =>'',
        'admin' => 0
        
        ]);
        }
        $hieu->login()->associate($orang);
        $hieu->save();
        
        $account_name = TaiKhoan::where('id',$account->tai_khoans_id)->first();
        
        Session::put('ho_ten',$account_name->ho_ten);
        Session::put('id',$account_name->id);
        return redirect()->route('index');
        }
    }


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
        if(!empty($remember)) {
            Session::put('email',$requests->email);
            Session::put('mat_khau',$requests->mat_khau);
            Session::put('remember',$remember);
        }
        else {
            if(Session::has('email')) {
                Session::forget('email');
            }
            if(Session::has('mat_khau')) {
                Session::forget('mat_khau');
            }
            if(Session::has('remember')) {
                Session::forget('remember');
            }
        }
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
        if($requests->hasFile('anh_dai_dien')){// neu anh co ton
            $img = $requests->anh_dai_dien;
            $newAccount->anh_dai_dien=$img->getClientOriginalName();
            $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
        }
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
        if($requests->hasFile('anh_dai_dien')){// neu anh co ton
            $img = $requests->anh_dai_dien;
            $newAccount->anh_dai_dien=$img->getClientOriginalName();
            $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
        }
        $newAccount->admin = true;
        $newAccount->save();
        return redirect()->route('admin.accounts.login');
    }
    public function index() {
        $array = ['arrays'=>TaiKhoan::paginate(5)];
        return view('admin.account.index', $array);
    }
    public function lock($id) {
        $new = TaiKhoan::find($id);
        $new->trang_thai = false;
        $new->save();
        echo "done";
    }
    public function unlock($id) {
        $new = TaiKhoan::find($id);
        $new->trang_thai = true;
        $new->save();
        echo "done";
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
                return redirect()->route('accounts.getChangePassword',$id)->with('success', 'Cập nhật mật khẩu thành công');
        } else {
            return redirect()->route('accounts.getChangePassword',$id)->with('error', 'Cập nhật mật khẩu không thành công');;
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
        if($requests->hasFile('anh_dai_dien')){// neu anh co ton
            $img = $requests->anh_dai_dien;
            $new->anh_dai_dien=$img->getClientOriginalName();
            $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
        }
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
        if($requests->hasFile('anh_dai_dien')){// neu anh co ton
            $img = $requests->anh_dai_dien;
            $new->anh_dai_dien=$img->getClientOriginalName();
            $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
        }
        $new->save();
        return redirect()->route('index');
    }
    public function quanLyTaiKhoan($id) {
        $array = ['arrays'=>taiKhoan::where('id',$id)->get()];
        return view('pages.account',$array);
    }
    public function DoiMatKhau($id) {
        $array = ['arrays'=>taiKhoan::where('id',$id)->get()];
        return view('pages.change_password',$array);
    }
    public function search(Request $requests) {
        $key = $requests->search;
        $key_admin = $requests->admin;
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
        $array = ['arrays'=> $query->paginate(5)];
        // dd($array);
        return view('admin.account.index', $array);
    }
    // public function loginGoogle() {
    //     return Socialite::driver('google')->redirect();
    // }
    // public function callbackGoogle() {
    //     $users = Socialite::driver('google')->stateless()->user();

    //     $authUser = $this->findOrCreateUser($users,'google');

    //     $account_name = TaiKhoan::find($authUser->tai_khoans_id)->first();

    //     $email = $account_name->email;
    //     $password = $account_name->mat_khau;
    //     $remember = $account_name->remember;
    //     if(Auth::attempt(['email' => $email, 'password' => $password, 'admin' => false],$remember)) {
    //         if(Auth::user()->trang_thai == 1) {
    //             return redirect()->route('index');
    //         }
    //         else {
    //             return redirect()->back()->with('thong_bao','Tài khoản đã bị khóa');
    //         }
    //     }
    //     else {
    //         return redirect()->back()->with('thong_bao','Email hoặc mật khẩu không chính xác'); 
    //     }
    // }
    // public function findOrCreateUser($users, $provider) {
    //     $authUser = MangXaHoi::where('mang_xa_hoi_id', $users->id)->first();

    //     if($authUser) {
    //         return $authUser;
    //     }

    //     $new = new MangXaHoi();
    //     $new->mang_xa_hoi_id = $users->id;
    //     $new->mang_xa_hoi = strtoupper($provider);
    //     $new->save();

    //     $checkUser = TaiKhoan::where('email', $users->email)->first();

    //     if(!$checkUser) {
    //         $checkUser = array();
    //         $checkUser['ho_ten'] = $users->name;
    //         $checkUser['email'] = $users->email;
    //         $checkUser['password'] = '';
    //         $checkUser['trang_thai'] = 1;
    //         $checkUser['admin'] = 0;
    //         $checkUser['anh_dai_dien'] = $users->avatar;
    //         $checkUser_id = TaiKhoan::insertGetId($checkUser);        
    //     }
        

    //     $account_name = TaiKhoan::find($checkUser_id)->first();
    //     $email = $account_name->email;
    //     $password = $account_name->mat_khau;
    //     $remember = $account_name->remember;
    //     if(Auth::attempt(['email' => $email, 'password' => $password, 'admin' => false],$remember)) {
    //         if(Auth::user()->trang_thai == 1) {
    //             return redirect()->route('index');
    //         }
    //         else {
    //             return redirect()->back()->with('thong_bao','Tài khoản đã bị khóa');
    //         }
    //     }
    //     else {
    //         return redirect()->back()->with('thong_bao','Email hoặc mật khẩu không chính xác'); 
    //     }
    // } 

    public function login_google(){
        return Socialite::driver('google')->redirect();
        }
        public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user();
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        $account_name = TaiKhoan::where('id',$authUser->tai_khoans_id)->first();
        Session::put('ho_ten',$account_name->ho_ten);
        Session::put('id',$account_name->id);
        return redirect()->route('index');
        
        }
        public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){
        
        return $authUser;
        }
        
        $hieu = new Social([
        'provider_user_id' => $users->id,
        'provider' => strtoupper($provider)
        
        ]);
        
        $orang = TaiKhoan::where('email',$provider->getEmail())->first();
        
        if(!$orang){
        $orang = Login::create([
            'ho_ten' => $provider->getName(),
            'email' => $provider->getEmail(),
            'password' => '',
            'so_dien_thoai' => '',
            'anh_dai_dien' =>'',
            'admin' => 0
        ]);
        }
        $hieu->login()->associate($orang);
        $hieu->save();
        
        $account_name = TaiKhoan::where('id',$authUser->user)->first();
        Session::put('ho_ten',$account_name->ho_ten);
        Session::put('id',$account_name->id);
        return redirect()->route('index');
        
        }
}
