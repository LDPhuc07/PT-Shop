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
        Auth::logout();
        return view('admin.login');
    }
    public function getDangNhap() {
        Auth::logout();
        return view('pages.login');
    }
    public function postDangNhapAdmin(Request $requests) {
        $rule = [
            'email' => 'required',
            'mat_khau' => 'required'
        ];
        $messages = [
            'email.required' => 'Vui l??ng nh???p email',
            'mat_khau.required' => 'Vui l??ng nh???p m???t kh???u'
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
                    return response()->json(['success'=>'????ng k?? th??nh c??ng']);
                }
                else {
                    return response()->json(['errorAll'=>'T??i kho???n ???? b??? kh??a']);
                }
            }
            else {
                return response()->json(['errorAll'=>'Email ho???c m???t kh???u kh??ng ch??nh x??c']); 
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
            'email.required' => 'Vui l??ng nh???p email',
            'mat_khau.required' => 'Vui l??ng nh???p m???t kh???u'
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
                    return response()->json(['success'=>'????ng nh???p th??nh c??ng']);
                }
                else {
                    return response()->json(['errorAll'=>'T??i kho???n ???? b??? kh??a']);
                }
            }
            else {
                return response()->json(['errorAll'=>'Email ho???c m???t kh???u kh??ng ch??nh x??c']); 
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
      $checkTaiKhoan = TaiKhoan::where('so_dien_thoai',$requests->so_dien_thoai)->first();
      if(!empty($checkTaiKhoan) && $checkTaiKhoan->password == null && $checkTaiKhoan->admin != 1) {
        $rule = [
            'ho_ten' => 'required|max:50',
            'email' => 'required|email|unique:tai_khoans,email|max:50',
            'mat_khau' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau|same:mat_khau',
            'so_dien_thoai' => 'required|digits:10|numeric|unique:tai_khoans,so_dien_thoai',
            'anh_dai_dien' => 'nullable|mimes:jpg,jpeg,png',
        ];
        $messages = [
            'ho_ten.required' => 'Vui l??ng nh???p h??? v?? t??n',
            'ho_ten.max' => 'H??? v?? t??n kh??ng qu?? 50 k?? t???',
            'email.required' => 'Vui l??ng nh???p email',
            'email.email' => 'Email kh??ng h???p l???',
            'email.unique' => 'Email ???? ???? ???????c ????ng k??',
            'email.max' => 'Email kh??ng qu?? 50 k?? t???',
            'mat_khau.required' => 'Vui l??ng nh???p m???t kh???u',
            'mat_khau.min' => 'M???t kh???u ph???i t??? 6 k?? t??? tr??? l??n',
            'nhap_lai_mat_khau.required_with' => 'Nh???p l???i m???t kh???u kh??ng h???p l???',
            'nhap_lai_mat_khau.same' => 'Nh???p l???i m???t kh???u kh??ng h???p l???',
            'so_dien_thoai.required' => 'Vui l??ng nh???p s??? ??i???n tho???i',
            'so_dien_thoai.digits' => 'S??? ??i???n tho???i ph???i c?? 10 s???',
            'so_dien_thoai.numeric' => 'S??? ??i???n tho???i kh??ng h???p l???',
            'so_dien_thoai.unique' => 'S??? ??i???n tho???i ???? ???????c ????ng k??',
            'anh_dai_dien.mimes' => '???nh ?????i di???n kh??ng h???p l???',
        ];

        $validator = Validator::make($requests->all(),$rule,$messages);


        if ($validator->passes()) {
          $new = TaiKhoan::find($checkTaiKhoan->id);
          $new->ho_ten = $requests->ho_ten;
          $new->email = $requests->email;
          $new->password = Hash::make($requests->mat_khau);
          $new->so_dien_thoai = $requests->so_dien_thoai;
          $new->dia_chi = $requests->dia_chi;
          if($requests->hasFile('anh_dai_dien')){// neu anh co ton
              $img = $requests->anh_dai_dien;
              $new->anh_dai_dien=$img->getClientOriginalName();
              $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
          } else {
              $new->anh_dai_dien = null;
          }
          $new->save();
          return response()->json(['success'=>'????ng k?? th??nh c??ng']);
        }
        
        return response()->json(['error'=>$validator->errors()]);
      } else {
        $rule = [
            'ho_ten' => 'required|max:50',
            'email' => 'required|email|unique:tai_khoans,email|max:50',
            'mat_khau' => 'required|min:6',
            'nhap_lai_mat_khau' => 'required_with:mat_khau|same:mat_khau',
            'so_dien_thoai' => 'required|digits:10|numeric|unique:tai_khoans,so_dien_thoai',
            'anh_dai_dien' => 'nullable|mimes:jpg,jpeg,png',
        ];
        $messages = [
            'ho_ten.required' => 'Vui l??ng nh???p h??? v?? t??n',
            'ho_ten.max' => 'H??? v?? t??n kh??ng qu?? 50 k?? t???',
            'email.required' => 'Vui l??ng nh???p email',
            'email.email' => 'Email kh??ng h???p l???',
            'email.unique' => 'Email ???? ???? ???????c ????ng k??',
            'email.max' => 'Email kh??ng qu?? 50 k?? t???',
            'mat_khau.required' => 'Vui l??ng nh???p m???t kh???u',
            'mat_khau.min' => 'M???t kh???u ph???i t??? 6 k?? t??? tr??? l??n',
            'nhap_lai_mat_khau.required_with' => 'Nh???p l???i m???t kh???u kh??ng h???p l???',
            'nhap_lai_mat_khau.same' => 'Nh???p l???i m???t kh???u kh??ng h???p l???',
            'so_dien_thoai.required' => 'Vui l??ng nh???p s??? ??i???n tho???i',
            'so_dien_thoai.digits' => 'S??? ??i???n tho???i ph???i c?? 10 s???',
            'so_dien_thoai.numeric' => 'S??? ??i???n tho???i kh??ng h???p l???',
            'so_dien_thoai.unique' => 'S??? ??i???n tho???i ???? ???????c ????ng k??',
            'anh_dai_dien.mimes' => '???nh ?????i di???n kh??ng h???p l???',
        ];

        $validator = Validator::make($requests->all(),$rule,$messages);


        if ($validator->passes()) {
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
            else
            {
                $newAccount->anh_dai_dien = null;
            }
            $newAccount->dia_chi = $requests->dia_chi;
            $newAccount->admin = false;
            $newAccount->save();
            return response()->json(['success'=>'????ng k?? th??nh c??ng']);
        }
        
        return response()->json(['error'=>$validator->errors()]);
      }

        
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
            'ho_ten.required' => 'Vui l??ng nh???p h??? v?? t??n',
            'ho_ten.max' => 'H??? v?? t??n kh??ng qu?? 50 k?? t???',
            'email.required' => 'Vui l??ng nh???p email',
            'email.email' => 'Email kh??ng h???p l???',
            'email.unique' => 'Email ???? ???? ???????c ????ng k??',
            'email.max' => 'Email kh??ng qu?? 50 k?? t???',
            'mat_khau.required' => 'Vui l??ng nh???p m???t kh???u',
            'mat_khau.min' => 'M???t kh???u ph???i t??? 6 k?? t??? tr??? l??n',
            'nhap_lai_mat_khau.required_with' => 'Nh???p l???i m???t kh???u kh??ng h???p l???',
            'nhap_lai_mat_khau.same' => 'Nh???p l???i m???t kh???u kh??ng h???p l???',
            'so_dien_thoai.required' => 'Vui l??ng nh???p s??? ??i???n tho???i',
            'so_dien_thoai.digits' => 'S??? ??i???n tho???i ph???i c?? 10 s???',
            'so_dien_thoai.numeric' => 'S??? ??i???n tho???i kh??ng h???p l???',
            'so_dien_thoai.unique' => 'S??? ??i???n tho???i ???? ???????c ????ng k??',
            'anh_dai_dien.mimes' => '???nh ?????i di???n kh??ng h???p l???',
        ];

        $validator = Validator::make($request->all(),$rule,$messages);


        if ($validator->passes()) {

            $newAccount = new TaiKhoan();
            $newAccount->ho_ten = $request->ho_ten;
            $newAccount->email = $request->email;
            $newAccount->password = Hash::make($request->mat_khau);
            $newAccount->so_dien_thoai = $request->so_dien_thoai;
            $newAccount->dia_chi = $request->dia_chi;
            if($request->hasFile('anh_dai_dien')){// neu anh co ton
                $img = $request->anh_dai_dien;
                $newAccount->anh_dai_dien=$img->getClientOriginalName();
                $request->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
            }
            $newAccount->admin = true;
            $newAccount->save();
			return response()->json(['success'=>'????ng k?? th??nh c??ng']);
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
    public function putDoiMatKhauAdmin(DoiMatKhauRequest $requests, $id) {

        // $rule = [
        //     'mat_khau_cu' => 'required',
        //     'mat_khau_moi' => 'required|min:6',
        //     'nhap_lai_mat_khau' => 'required_with:mat_khau_moi|same:mat_khau_moi'
        // ];
        // $messages = [
        //     'mat_khau_cu.required' => 'Vui l??ng nh???p m???t kh???u c??',
        //     'mat_khau_moi.required' => 'Vui l??ng nh???p m???t kh???u m???i',
        //     'mat_khau_moi.min' => 'M???t kh???u ph???i c?? ??t nh???t 6 k?? t???',
        //     'nhap_lai_mat_khau.required_with' => 'Vui l??ng nh???p l???i m???t kh???u',
        //     'nhap_lai_mat_khau.same' => 'Nh???p l???i m???t kh???u kh??ng kh???p',
        // ];

        // $validator = Validator::make($requests->all(),$rule,$messages);

        // if ($validator->passes()) {
        //     if(Auth::attempt(['email' => Auth::user()->email, 'password' => $requests->mat_khau_cu])) {
        //         if(Auth::user()->trang_thai == 1) {
        //             $new = TaiKhoan::find($id);
        //             $new->password = Hash::make($requests->mat_khau_moi);
        //             $new->save();
        //             return response()->json(['success'=>'????ng nh???p th??nh c??ng']);
        //         }
        //         else {
        //             return response()->json(['errorAll'=>'T??i kho???n ???? b??? kh??a']);
        //         }
        //     } else {
        //         return response()->json(['errorAll'=>'M???t kh???u kh??ng ????ng']);
        //     }
        // }

        // return response()->json(['error'=>$validator->errors()]);
        if(Auth::attempt(['email' => Auth::user()->email, 'password' => $requests->mat_khau_cu])) {
          if(Auth::user()->trang_thai == 1) {
              $new = TaiKhoan::find($id);
              $new->password = Hash::make($requests->mat_khau_moi);
              $new->save();
              return redirect()->back()->with('info_doi_mk_ad', '?????i m???t kh???u th??nh c??ng');
          }
          else {
              return redirect()->back()->with('thong_bao','T??i kho???n ???? b??? kh??a');
          }
      } else {
          return redirect()->back()->with('thong_bao','M???t kh???u kh??ng ????ng');
      }
    }
    public function putDoiMatKhau(DoiMatKhauRequest $requests, $id) {
        // $rule = [
        //     'mat_khau_cu' => 'required',
        //     'mat_khau_moi' => 'required|min:6',
        //     'nhap_lai_mat_khau' => 'required_with:mat_khau_moi|same:mat_khau_moi'
        // ];
        // $messages = [
        //     'mat_khau_cu.required' => 'Vui l??ng nh???p m???t kh???u c??',
        //     'mat_khau_moi.required' => 'Vui l??ng nh???p m???t kh???u m???i',
        //     'mat_khau_moi.min' => 'M???t kh???u ph???i c?? ??t nh???t 6 k?? t???',
        //     'nhap_lai_mat_khau.required_with' => 'Vui l??ng nh???p l???i m???t kh???u',
        //     'nhap_lai_mat_khau.same' => 'Nh???p l???i m???t kh???u kh??ng kh???p',
        // ];

        // $validator = Validator::make($requests->all(),$rule,$messages);

        // if ($validator->passes()) {
        //     if(Auth::attempt(['email' => Auth::user()->email, 'password' => $requests->mat_khau_cu])) {
        //             $new = TaiKhoan::find($id);
        //             $new->password = Hash::make($requests->mat_khau_moi);
        //             $new->save();
        //             return response()->json(['success'=>'?????i m???t kh???u th??nh c??ng']);
        //     } else {
        //         return response()->json(['errorAll'=>'M???t kh???u c?? kh??ng ????ng']);
        //     }
        // }

        // return response()->json(['error'=>$validator->errors()]);
        if(Auth::attempt(['email' => Auth::user()->email, 'password' => $requests->mat_khau_cu])) {
          if(Auth::user()->trang_thai == 1) {
              $new = TaiKhoan::find($id);
              $new->password = Hash::make($requests->mat_khau_moi);
              $new->save();
              return redirect()->back()->with('info_doi_mk', '?????i m???t kh???u th??nh c??ng');
          }
          else {
              return redirect()->back()->with('thong_bao','T??i kho???n ???? b??? kh??a');
          }
      } else {
          return redirect()->back()->with('thong_bao','M???t kh???u kh??ng ????ng');
      }
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
            'ho_ten.required' => 'Vui l??ng nh???p h??? v?? t??n',
            'ho_ten.max' => 'H??? v?? t??n kh??ng qu?? 50 k?? t???',
            'anh_dai_dien.mimes' => '???nh ?????i di???n kh??ng h???p l???'
        ];
        // $requests->validate([
        //     'ho_ten' => 'required|max:50',
        //     'anh_dai_dien' => 'mimes:jpeg,jpg,png'
        // ],[
        //     'ho_ten.required' => 'Vui l??ng nh???p h??? v?? t??n',
        //     'ho_ten.max' => 'H??? v?? t??n kh??ng qu?? 50 k?? t???',
        //     'anh_dai_dien.mimes' => 'H??nh ???nh kh??ng h???p l???'
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
                    'email.required' => 'Vui l??ng nh???p email',
                    'email.email' => 'Email kh??ng h???p l???',
                    'email.unique' => 'Email ???? ???????c ????ng k??',
                    'email.max' => 'Email kh??ng qu?? 50 k?? t???',
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
                //     'email.required' => 'Vui l??ng nh???p email',
                //     'email.email' => 'Email kh??ng h???p l???',
                //     'email.unique' => 'Email ???? ???????c ????ng k??',
                //     'email.max' => 'Email kh??ng qu?? 50 k?? t???',
                // ]);$
                
            }
            if(Auth::user()->so_dien_thoai != $requests->so_dien_thoai) {

                $rule2 = [
                    'so_dien_thoai' => 'required|digits:10|numeric|unique:tai_khoans,so_dien_thoai'
                ];
                $messages2 = [
                    'so_dien_thoai.required' => 'Vui l??ng nh???p s??? ??i???n tho???i',
                    'so_dien_thoai.digits' => 'S??? ??i???n tho???i ph???i c?? 10 s???',
                    'so_dien_thoai.numeric' => 'S??? ??i???n tho???i kh??ng h???p l???',
                    'so_dien_thoai.unique' => 'S??? ??i???n tho???i ???? ???????c ????ng k??',
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
                //     'so_dien_thoai.unique' => 'S??? ??i???n tho???i ???? ???????c ????ng k??'
                // ]);

            }
            $new->dia_chi = $requests->dia_chi;
            if($requests->hasFile('anh_dai_dien')){// neu anh co ton
                $img = $requests->anh_dai_dien;
                $new->anh_dai_dien=$img->getClientOriginalName();
                $requests->anh_dai_dien->move('img/anh-dai-dien',$img->getClientOriginalName());
            }
            $new->save();
            return response()->json(["success"=>"C??p nh???t t??i kho???n th??nh c??ng"]);
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
            'ho_ten.required' => 'Vui l??ng nh???p h??? v?? t??n',
            'ho_ten.max' => 'H??? v?? t??n kh??ng qu?? 50 k?? t???',
            'anh_dai_dien.mimes' => 'H??nh ???nh kh??ng h???p l???'
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
                    'email.required' => 'Vui l??ng nh???p email',
                    'email.email' => 'Email kh??ng h???p l???',
                    'email.unique' => 'Email ???? ???????c ????ng k??',
                    'email.max' => 'Email kh??ng qu?? 50 k?? t???',
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
                    'so_dien_thoai.required' => 'Vui l??ng nh???p s??? ??i???n tho???i',
                    'so_dien_thoai.digits' => 'S??? ??i???n tho???i ph???i c?? 10 s???',
                    'so_dien_thoai.numeric' => 'S??? ??i???n tho???i kh??ng h???p l???',
                    'so_dien_thoai.unique' => 'S??? ??i???n tho???i ???? ???????c ????ng k??',
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
            }
            $new->save();
            return response()->json(["success"=>"C??p nh???t t??i kho???n th??nh c??ng"]);
        }

        return response()->json(["error"=>$validator->errors()]);
        
    }
    public function quanLyTaiKhoan($id) {
      if(Auth::check() && Auth::user()->admin != 1) {
        $array = ['arrays'=>TaiKhoan::where('id',$id)->get()];
        return view('pages.account',$array);
      } else {
        return view('pages.login');
      }
    }
    public function DoiMatKhau($id) {
      if(Auth::check() && Auth::user()->admin != 1) {
        return view('pages.change_password');
      } else {
        return view('pages.login');
      }
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
    //             return redirect()->back()->with('thong_bao','T??i kho???n ???? b??? kh??a');
    //         }
    //     }
    //     else {
    //         return redirect()->back()->with('thong_bao','Email ho???c m???t kh???u kh??ng ch??nh x??c'); 
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
    //             return redirect()->back()->with('thong_bao','T??i kho???n ???? b??? kh??a');
    //         }
    //     }
    //     else {
    //         return redirect()->back()->with('thong_bao','Email ho???c m???t kh???u kh??ng ch??nh x??c'); 
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
            return response()->json(["sucess"=>"Th??nh c??ng"]);
        }
        return response()->json(["error"=>$validator->errors()->all()]);
    }
}
