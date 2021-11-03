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
use Illuminate\Support\Facades\Validator;
class TaiKhoanController extends Controller
{

    // public function login_facebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function callback_facebook(){
    //     $provider = Socialite::driver('facebook')->user();
    //     $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
    //     if($account){
    //     //login in vao trang quan tri
    //     $account_name = TaiKhoan::where('id',$account->tai_khoans_id)->first();
    //     Session::put('ho_ten',$account_name->ho_ten);
    //     Session::put('id',$account_name->id);
    //     return redirect()->route('index');
    //     }else{
        
    //     $hieu = new Social([
    //     'provider_user_id' => $provider->getId(),
    //     'provider' => 'facebook'
    //     ]);
        
    //     $orang = TaiKhoan::where('email',$provider->getEmail())->first();
        
    //     if(!$orang){
    //     $orang = TaiKhoan::create([
        
    //     'ho_ten' => $provider->getName(),
    //     'email' => $provider->getEmail(),
    //     'password' => '',
    //     'so_dien_thoai' => '',
    //     'anh_dai_dien' =>'',
    //     'admin' => 0
        
    //     ]);
    //     }
    //     $hieu->login()->associate($orang);
    //     $hieu->save();
        
    //     $account_name = TaiKhoan::where('id',$account->tai_khoans_id)->first();
        
    //     Session::put('ho_ten',$account_name->ho_ten);
    //     Session::put('id',$account_name->id);
    //     return redirect()->route('index');
    //     }
    // }


    public function getDangNhapAdmin() {
        return view('admin.login');
    }
    public function getDangNhap() {
        return view('pages.login');
    }
    public function postDangNhapAdmin(Request $requests) {
        $rule = [
            'email' => 'required',
            'mat_khau' => 'required'
        ];
        $messages = [
            'email.required' => 'Vui lòng nhập email',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu'
        ];

        $validator = Validator::make($requests->all(),$rule,$messages);
        $email = $requests->email;
        $password = $requests->mat_khau;
        $remember = $requests->remember;

        if ($validator->passes()) {
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
                    return response()->json(['success'=>'Đăng ký thành công']);
                }
                else {
                    return response()->json(['errorAll'=>'Tài khoản đã bị khóa']);
                }
            }
            else {
                return response()->json(['errorAll'=>'Email hoặc mật khẩu không chính xác']); 
            }
        }

        return response()->json(['error'=>$validator->errors()]);
        
    }
    public function postDangNhap(Request $requests) {
        $rule = [
            'email' => 'required',
            'mat_khau' => 'required'
        ];
        $messages = [
            'email.required' => 'Vui lòng nhập email',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu'
        ];

        $validator = Validator::make($requests->all(),$rule,$messages);
        
        $email = $requests->email;
        $password = $requests->mat_khau;
        $remember = $requests->remember;

        if ($validator->passes()) {
            if(Auth::attempt(['email' => $email, 'password' => $password, 'admin' => false],$remember)) {
                if(Auth::user()->trang_thai == 1) {
                    if(Session::has('url previous')) {
                        $url_dn = Session::get('url previous');
                        Session::forget('url previous');
                        return response()->json(['success1'=>$url_dn]);
                    }
                    return response()->json(['success'=>'Đăng nhập thành công']);
                }
                else {
                    return response()->json(['errorAll'=>'Tài khoản đã bị khóa']);
                }
            }
            else {
                return response()->json(['errorAll'=>'Email hoặc mật khẩu không chính xác']); 
            }
        }

        return response()->json(['error'=>$validator->errors()]);
        
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
    public function postDangKy(Request $requests) {

        $rule = [
            'ho_ten' => 'required|max:50',
            'email' => 'required|email|unique:tai_khoans,email|max:50',
            'mat_khau' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau|same:mat_khau',
            'so_dien_thoai' => 'required|digits:10|numeric|unique:tai_khoans,so_dien_thoai',
            'anh_dai_dien' => 'nullable|mimes:jpg,jpeg,png',
        ];
        $messages = [
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
            'anh_dai_dien.mimes' => 'Ảnh đại diện không hợp lệ',
        ];

        $validator = Validator::make($requests->all(),$rule,$messages);


        if ($validator->passes()) {
            $newAccount=new TaiKhoan();
            $newAccount->ho_ten = $requests->ho_ten;
            $newAccount->email = $requests->email;
            $newAccount->password = Hash::make($requests->mat_khau);
            if($requests->hasFile('anh_dai_dien')){// neu anh co ton
                $img = $requests->anh_dai_dien;
                $newAccount->anh_dai_dien=$img->getClientOriginalName();
                $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
            }
            else
            {
                $newAccount->anh_dai_dien = null;
            }
            $newAccount->admin = false;
            $newAccount->save();
            return response()->json(['success'=>'Đăng ký thành công']);
        }
        
        return response()->json(['error'=>$validator->errors()]);
    }
    public function postDangKyAdmin(Request $request) {

        $rule = [
            'ho_ten' => 'required|max:50',
            'email' => 'required|email|unique:tai_khoans,email|max:50',
            'mat_khau' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau|same:mat_khau',
            'so_dien_thoai' => 'required|digits:10|numeric|unique:tai_khoans,so_dien_thoai',
            'anh_dai_dien' => 'nullable|mimes:jpg,jpeg,png',
        ];
        $messages = [
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
            'anh_dai_dien.mimes' => 'Ảnh đại diện không hợp lệ',
        ];

        $validator = Validator::make($request->all(),$rule,$messages);


        if ($validator->passes()) {

            $newAccount = new TaiKhoan();
            $newAccount->ho_ten = $request->ho_ten;
            $newAccount->email = $request->email;
            $newAccount->password = Hash::make($request->mat_khau);
            $newAccount->so_dien_thoai = $request->so_dien_thoai;
            $newAccount->so_dien_thoai = $request->dia_chi;
            if($request->hasFile('anh_dai_dien')){// neu anh co ton
                $img = $request->anh_dai_dien;
                $newAccount->anh_dai_dien=$img->getClientOriginalName();
                $request->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
            }
            $newAccount->admin = true;
            $newAccount->save();
			return response()->json(['success'=>'Đăng ký thành công']);
        }


    	return response()->json(['error'=>$validator->errors()]);

        
        // return redirect()->route('admin.accounts.login');
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
    public function putDoiMatKhauAdmin(Request $requests, $id) {

        $rule = [
            'mat_khau_cu' => 'required',
            'mat_khau_moi' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau_moi|same:mat_khau_moi'
        ];
        $messages = [
            'mat_khau_cu.required' => 'Vui lòng nhập mật khẩu cũ',
            'mat_khau_moi.required' => 'Vui lòng nhập mật khẩu mới',
            'mat_khau_moi.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'nhap_lai_mat_khau.required_with' => 'Vui lòng nhập lại mật khẩu',
            'nhap_lai_mat_khau.same' => 'Nhập lại mật khẩu không khớp',
        ];

        $validator = Validator::make($requests->all(),$rule,$messages);

        if ($validator->passes()) {
            if(Auth::attempt(['email' => Auth::user()->email, 'password' => $requests->mat_khau_cu])) {
                if(Auth::user()->trang_thai == 1) {
                    $new = TaiKhoan::find($id);
                    $new->password = Hash::make($requests->mat_khau_moi);
                    $new->save();
                    return response()->json(['success'=>'Đăng nhập thành công']);
                }
                else {
                    return response()->json(['errorAll'=>'Tài khoản đã bị khóa']);
                }
            } else {
                return response()->json(['errorAll'=>'Mật khẩu không đúng']);
            }
        }

        return response()->json(['error'=>$validator->errors()]);
    }
    public function putDoiMatKhau(Request $requests, $id) {
        $rule = [
            'mat_khau_cu' => 'required',
            'mat_khau_moi' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau_moi|same:mat_khau_moi'
        ];
        $messages = [
            'mat_khau_cu.required' => 'Vui lòng nhập mật khẩu cũ',
            'mat_khau_moi.required' => 'Vui lòng nhập mật khẩu mới',
            'mat_khau_moi.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'nhap_lai_mat_khau.required_with' => 'Vui lòng nhập lại mật khẩu',
            'nhap_lai_mat_khau.same' => 'Nhập lại mật khẩu không khớp',
        ];

        $validator = Validator::make($requests->all(),$rule,$messages);

        if ($validator->passes()) {
            if(Auth::attempt(['email' => Auth::user()->email, 'password' => $requests->mat_khau_cu])) {
                    $new = TaiKhoan::find($id);
                    $new->password = Hash::make($requests->mat_khau_moi);
                    $new->save();
                    return response()->json(['success'=>'Đăng nhập thành công']);
            } else {
                return response()->json(['errorAll'=>'Mật khẩu không đúng']);
            }
        }

        return response()->json(['error'=>$validator->errors()]);
    }
    public function editAccountAdmin($id) {
        $array = ['arrays'=>taiKhoan::where('id',$id)->get()];
        return view('admin.account.edit_account',$array);
    }
    public function updateAccountAdmin(Request $requests, $id) {
        $rule = [
            'ho_ten' => 'required|max:50',
            'anh_dai_dien' => 'nullable|mimes:jpeg,jpg,png'
        ];
        $messages = [
            'ho_ten.required' => 'Vui lòng nhập họ và tên',
            'ho_ten.max' => 'Họ và tên không quá 50 ký tự',
            'anh_dai_dien.mimes' => 'Ảnh đại diện không hợp lệ'
        ];
        // $requests->validate([
        //     'ho_ten' => 'required|max:50',
        //     'anh_dai_dien' => 'mimes:jpeg,jpg,png'
        // ],[
        //     'ho_ten.required' => 'Vui lòng nhập họ và tên',
        //     'ho_ten.max' => 'Họ và tên không quá 50 ký tự',
        //     'anh_dai_dien.mimes' => 'Hình ảnh không hợp lệ'
        // ]);

        $validator = Validator::make($requests->all(),$rule,$messages);

        if ($validator->passes()) {
            $new = TaiKhoan::find($id);
            $new->ho_ten = $requests->ho_ten;
            if(Auth::user()->email != $requests->email) {
                
                $rule1 = [
                    'email' => 'required|email|unique:tai_khoans,email|max:50'
                ];
                $messages1 = [
                    'email.required' => 'Vui lòng nhập email',
                    'email.email' => 'Email không hợp lệ',
                    'email.unique' => 'Email đã được đăng ký',
                    'email.max' => 'Email không quá 50 ký tự',
                ];

                $validator1 = Validator::make($requests->all(),$rule1,$messages1);

                if ($validator1->passes()) {

                    $new->email = $requests->email;
                } else {
                    return response()->json(["error"=>$validator1->errors()]);
                }
                // requests->validate([
                //     'email' => 'required|email|unique:tai_khoans,email|max:50'
                // ],[
                //     'email.required' => 'Vui lòng nhập email',
                //     'email.email' => 'Email không hợp lệ',
                //     'email.unique' => 'Email đã được đăng ký',
                //     'email.max' => 'Email không quá 50 ký tự',
                // ]);$
                
            }
            if(Auth::user()->so_dien_thoai != $requests->so_dien_thoai) {

                $rule2 = [
                    'so_dien_thoai' => 'required|digits:10|numeric|unique:tai_khoans,so_dien_thoai'
                ];
                $messages2 = [
                    'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
                    'so_dien_thoai.digits' => 'Số điện thoại phải có 10 số',
                    'so_dien_thoai.numeric' => 'Số điện thoại không hợp lệ',
                    'so_dien_thoai.unique' => 'Số điện thoại đã được đăng ký',
                ];

                $validator2 = Validator::make($requests->all(),$rule2,$messages2);

                if ($validator2->passes()) {
                    $new->so_dien_thoai = $requests->so_dien_thoai;
                } else {
                    return response()->json(["error"=>$validator2->errors()]);
                }
                // $requests->validate([
                //     'so_dien_thoai' => 'unique:tai_khoans,so_dien_thoai'
                // ],[
                //     'so_dien_thoai.unique' => 'Số điện thoại đã được đăng ký'
                // ]);

            }
            $new->dia_chi = $requests->dia_chi;
            if($requests->hasFile('anh_dai_dien')){// neu anh co ton
                $img = $requests->anh_dai_dien;
                $new->anh_dai_dien=$img->getClientOriginalName();
                $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
            } else {
                $new->anh_dai_dien = null;
            }
            $new->save();
            return response()->json(["success"=>"Câp nhật tài khoản thành công"]);
        } else {
            return response()->json(["error"=>$validator->errors()]);
        }
    }
    public function updateAccount(Request $requests, $id) {
        $rule = [
            'ho_ten' => 'required|max:50',
            'anh_dai_dien' => 'nullable|mimes:jpeg,jpg,png'
        ];
        $messages = [
            'ho_ten.required' => 'Vui lòng nhập họ và tên',
            'ho_ten.max' => 'Họ và tên không quá 50 ký tự',
            'anh_dai_dien.mimes' => 'Hình ảnh không hợp lệ'
        ];
        $validator = Validator::make($requests->all(),$rule,$messages);

        if ($validator->passes()) {
            $new = TaiKhoan::find($id);
            $new->ho_ten = $requests->ho_ten;
            if(Auth::user()->email != $requests->email) {
                $rule1 = [
                    'email' => 'required|email|unique:tai_khoans,email|max:50'
                ];
                $messages1 = [
                    'email.required' => 'Vui lòng nhập email',
                    'email.email' => 'Email không hợp lệ',
                    'email.unique' => 'Email đã được đăng ký',
                    'email.max' => 'Email không quá 50 ký tự',
                ];

                $validator1 = Validator::make($requests->all(),$rule1,$messages1);
                if ($validator1->passes()) {
                    $new->email = $requests->email;
                } else {
                    return response()->json(["error"=>$validator1->errors()]);
                }
            }
            if(Auth::user()->so_dien_thoai != $requests->so_dien_thoai) {
                $rule2 = [
                    'so_dien_thoai' => 'required|digits:10|numeric|unique:tai_khoans,so_dien_thoai'
                ];
                $messages2 = [
                    'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
                    'so_dien_thoai.digits' => 'Số điện thoại phải có 10 số',
                    'so_dien_thoai.numeric' => 'Số điện thoại không hợp lệ',
                    'so_dien_thoai.unique' => 'Số điện thoại đã được đăng ký',
                ];

                $validator2 = Validator::make($requests->all(),$rule2,$messages2);

                if ($validator2->passes()) {
                    $new->so_dien_thoai = $requests->so_dien_thoai;
                } else {
                    return response()->json(["error"=>$validator2->errors()]);
                }
            }
            $new->dia_chi = $requests->dia_chi;
            if($requests->hasFile('anh_dai_dien')){// neu anh co ton
                $img = $requests->anh_dai_dien;
                $new->anh_dai_dien=$img->getClientOriginalName();
                $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
            } else {
                $new->anh_dai_dien = null;
            }
            $new->save();
            return response()->json(["success"=>"Câp nhật tài khoản thành công"]);
        }

        return response()->json(["error"=>$validator->errors()]);
        
    }
    public function quanLyTaiKhoan($id) {
        $array = ['arrays'=>TaiKhoan::where('id',$id)->get()];
        return view('pages.account',$array);
    }
    public function DoiMatKhau($id) {
        $array = ['arrays'=>TaiKhoan::where('id',$id)->get()];
        return view('pages.change_password',$array);
    }
    public function search(Request $requests) {
        $key = $requests->search;
        $key_admin = $requests->admin;
        $key_trang_thai = $requests->trang_thai;
        if($key != null || $key_admin != null || $key_trang_thai != null) {
            if($requests->admin == null) {
                if($key_trang_thai == null) {
                    $query = TaiKhoan::where(
                        function($que) use ($key) {
                            $que->where('ho_ten','LIKE','%'.$key.'%');
                            $que->orwhere('email','LIKE','%'.$key.'%');
                            $que->orwhere('so_dien_thoai','LIKE','%'.$key.'%');
                            $que->orwhere('dia_chi','LIKE','%'.$key.'%');
                        }
                    );
                } else {
                    $query = TaiKhoan::where(
                        function($que) use ($key) {
                            $que->where('ho_ten','LIKE','%'.$key.'%');
                            $que->orwhere('email','LIKE','%'.$key.'%');
                            $que->orwhere('so_dien_thoai','LIKE','%'.$key.'%');
                            $que->orwhere('dia_chi','LIKE','%'.$key.'%');
                        }
                    )
                    ->where('trang_thai',$key_trang_thai);
                }
            } else {
                if($key_trang_thai == null) {
                    $query = TaiKhoan::where(
                        function($que) use ($key) {
                            $que->where('ho_ten','LIKE','%'.$key.'%');
                            $que->orwhere('email','LIKE','%'.$key.'%');
                            $que->orwhere('so_dien_thoai','LIKE','%'.$key.'%');
                            $que->orwhere('dia_chi','LIKE','%'.$key.'%');
                        }
                    )
                    ->where('admin',$key_admin);
                } else {
                    $query = TaiKhoan::where(
                        function($que) use ($key) {
                            $que->where('ho_ten','LIKE','%'.$key.'%');
                            $que->orwhere('email','LIKE','%'.$key.'%');
                            $que->orwhere('so_dien_thoai','LIKE','%'.$key.'%');
                            $que->orwhere('dia_chi','LIKE','%'.$key.'%');
                        }
                    )
                    ->where('admin',$key_admin)
                    ->where('trang_thai',$key_trang_thai);
                }
            }
            $array = ['arrays'=> $query->paginate(5)];
    
            return view('admin.account.index', $array);
        } else {
            $array = ['arrays'=>TaiKhoan::paginate(5)];

            return redirect('admin/accounts');
        }
        
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

    public function myform()
    {
    	return view('admin.account.myform');
    }


    public function myformPost(Request $request)
    {


    	$validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);


        if ($validator->passes()) {


			return response()->json(['success'=>'Added new records.']);
        }


    	return response()->json(['error'=>$validator->errors()->all()]);
    }
    public function validateSignUpAdmin(Request $request) {

        $rules = [

            "file" => "nullable|mimes:jpg,jpeg,png",
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->passes()) {
            return response()->json(["sucess"=>"Thành công"]);
        }
        return response()->json(["error"=>$validator->errors()->all()]);
    }
}
