<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\SanPham;
use App\Anh;
use App\TaiKhoan;
use App\HoaDon;
use App\ChiTietHoaDon;
use App\ChiTietSanPham;
use Carbon\Carbon;
use PDF;
use Session;

class HoaDonController extends Controller
{
    public function index() {
        $array = ['arrays'=>HoaDon::where('trang_thai',1)->paginate(5)];
        return view('admin.bill.index',$array);
    }
    public function billDetail($id) {
        $array = ['arrays'=>ChiTietHoaDon::where('hoa_dons_id',$id)->get()];
        return view('admin.bill.product_detail_modal_bootstrap',$array);
    }

    // thanh toán online

    

    public function returnOnline(Request $request)
    {
        $url = session('url_prev','/');
        $total = session('tong_tien');
        session()->forget('tong_tien');
        if($request->vnp_ResponseCode == "00") {
            $bill = array();
            $bill['tai_khoans_id'] = Auth::user()->id;
            $bill['ngay_lap_hd'] = Carbon::now();
            $bill['trang_thai'] = true;
            $bill_id = HoaDon::insertGetId($bill);
            $add_loi_nhuan = HoaDon::find($bill_id);
            $add_loi_nhuan->tong_tien = $total;
            $add_loi_nhuan->save();
            Cart::destroy();
            return redirect()->route('ordersuccess');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }

    // end

    public function create(Request $request){
        if(!empty($request->payment))
        {
        session(['tong_tien' => $request->online]);
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
        $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/return-vnpay";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->online * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        $vnp_BankCode = 'ncb';
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
        }
        if(Auth::check()) {
            if(Auth::user()->dia_chi == null) {
                $request->validate([
                    'dia_chi' => 'required'
                ],[
                    'dia_chi.required' => 'Vui lòng nhập địa chỉ'
                ]);
                $new_update = TaiKhoan::find(Auth::user()->id);
                $new_update->dia_chi = $request->dia_chi;
                $new_update->save();
            }
            if(Auth::user()->so_dien_thoai == null) {
                $request->validate([
                    'so_dien_thoai' => 'required'
                ],[
                    'so_dien_thoai.required' => 'Vui lòng nhập địa chỉ'
                ]);
                $new_update = TaiKhoan::find(Auth::user()->id);
                $new_update->so_dien_thoai = $request->so_dien_thoai;
                $new_update->save();
            }
            $bill = array();
            $bill['tai_khoans_id'] = Auth::user()->id;
            $bill['ngay_lap_hd'] = Carbon::now();
            $bill['trang_thai'] = true;
            $bill_id = HoaDon::insertGetId($bill);

            $contents = Cart::content();
            $loi_nhuan = 0;
            $tongtien = 0;
            foreach($contents as $content) {
                $bill_detail = new ChiTietHoaDon();
                $bill_detail->hoa_dons_id = $bill_id;
                $bill_detail->chi_tiet_san_phams_id = $content->id;
                $bill_detail->so_luong = $content->qty; 
                $update_ctsp = ChiTietSanPham::find($content->id);
                $update_ctsp->so_luong -= $content->qty;
                $bill_detail->gia_goc = $update_ctsp->sanPham->gia_goc;
                $bill_detail->gia_ban = $content->price;
                $tongtien += ($content->price*$content->qty);
                $loi_nhuan += (($content->price - $update_ctsp->sanPham->gia_goc)*$content->qty);
                $update_ctsp->save();
                $bill_detail->save();
            }
            $add_loi_nhuan = HoaDon::find($bill_id);
            $add_loi_nhuan->loi_nhuan = $loi_nhuan;
            $add_loi_nhuan->tong_tien = $tongtien;
            $add_loi_nhuan->save();
        }
        else {
            $request->validate([
                'ho_ten' => 'required',
                'dia_chi' => 'required',
                'so_dien_thoai' => 'required|numeric'
            ],[
                'ho_ten.required' => 'Vui lòng nhập họ và tên',
                'dia_chi.required' => 'Vui lòng nhập địa chỉ',
                'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
                'so_dien_thoai.numeric' => 'Số điện thoại không hợp lệ'
            ]);
            $check_account = TaiKhoan::where('so_dien_thoai',$request->so_dien_thoai)->first();
            if(empty($check_account)) {
                $account = array();
                $account['ho_ten'] = $request->ho_ten;
                $account['dia_chi'] = $request->dia_chi;
                $account['so_dien_thoai'] = $request->so_dien_thoai;
                $account['admin'] = false;
                $account_id = TaiKhoan::insertGetId($account);

                $total = Cart::subtotal();
                $bill = array();
                $bill['tai_khoans_id'] = $account_id;
                $bill['ngay_lap_hd'] = Carbon::now();
                $bill['tong_tien'] = $total;
                $bill['trang_thai'] = true;
                $bill_id = HoaDon::insertGetId($bill);
            }


            else { 
                $bill = array();
                $bill['tai_khoans_id'] = $check_account->id;
                $bill['ngay_lap_hd'] = Carbon::now();
                $bill['trang_thai'] = true;
                $bill_id = HoaDon::insertGetId($bill);
            }   

            $contents = Cart::content();
            $loi_nhuan = 0;
            $tongtien = 0;
            foreach($contents as $content) {
                $bill_detail = new ChiTietHoaDon();
                $bill_detail->hoa_dons_id = $bill_id;
                $bill_detail->chi_tiet_san_phams_id = $content->id;
                $bill_detail->so_luong = $content->qty; 
                $update_ctsp = ChiTietSanPham::find($content->id);
                $update_ctsp->so_luong -= $content->qty;
                $bill_detail->gia_goc = $update_ctsp->sanPham->gia_goc;
                $bill_detail->gia_ban = $content->price;
                $tongtien += ($content->price*$content->qty);
                $loi_nhuan += (($content->price - $update_ctsp->sanPham->gia_goc)*$content->qty);
                $update_ctsp->save();
                $bill_detail->save();
            }
            $add_loi_nhuan = HoaDon::find($bill_id);
            $add_loi_nhuan->loi_nhuan = $loi_nhuan;
            $add_loi_nhuan->tong_tien = $tongtien;
            $add_loi_nhuan->save();
        }
        Cart::destroy();
        return redirect()->route('ordersuccess');
    }
    public function createBuyNow(Request $request){
        if(Auth::check()) {
            if(Auth::user()->dia_chi == null) {
                $request->validate([
                    'dia_chi' => 'required'
                ],[
                    'dia_chi.required' => 'Vui lòng nhập địa chỉ'
                ]);
                $new_update = TaiKhoan::find(Auth::user()->id);
                $new_update->dia_chi = $request->dia_chi;
                $new_update->save();
            }
            if(Auth::user()->so_dien_thoai == null) {
                $request->validate([
                    'so_dien_thoai' => 'required'
                ],[
                    'so_dien_thoai.required' => 'Vui lòng nhập địa chỉ'
                ]);
                $new_update = TaiKhoan::find(Auth::user()->id);
                $new_update->so_dien_thoai = $request->so_dien_thoai;
                $new_update->save();
            }
            $bill = array();
            $bill['tai_khoans_id'] = Auth::user()->id;
            $bill['ngay_lap_hd'] = Carbon::now();
            $bill['trang_thai'] = true;
            $bill_id = HoaDon::insertGetId($bill);

            $data = Session::all();
            $loi_nhuan = 0;
            $tongtien = 0;
            $bill_detail = new ChiTietHoaDon();
            $bill_detail->hoa_dons_id = $bill_id;
            $bill_detail->chi_tiet_san_phams_id = $data['id'];
            $bill_detail->so_luong = $data['so_luong']; 
            $update_ctsp = ChiTietSanPham::find($data['id']);
            $update_ctsp->so_luong -= $data['so_luong'];
            $bill_detail->gia_goc = $update_ctsp->sanPham->gia_goc;
            $bill_detail->gia_ban = $data['gia'];
            $tongtien += ($data['gia']*$data['so_luong']);
            $loi_nhuan += (($data['gia'] - $update_ctsp->sanPham->gia_goc)*$data['so_luong']);
            $update_ctsp->save();
            $bill_detail->save();
            $add_loi_nhuan = HoaDon::find($bill_id);
            $add_loi_nhuan->loi_nhuan = $loi_nhuan;
            $add_loi_nhuan->tong_tien = $tongtien;
            $add_loi_nhuan->save();
        }
        else {
            $request->validate([
                'ho_ten' => 'required',
                'dia_chi' => 'required',
                'so_dien_thoai' => 'required|numeric'
            ],[
                'ho_ten.required' => 'Vui lòng nhập họ và tên',
                'dia_chi.required' => 'Vui lòng nhập địa chỉ',
                'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
                'so_dien_thoai.numeric' => 'Số điện thoại không hợp lệ'
            ]);
            $check_account = TaiKhoan::where('so_dien_thoai',$request->so_dien_thoai)->first();
            if(empty($check_account)) {
                $account = array();
                $account['ho_ten'] = $request->ho_ten;
                $account['dia_chi'] = $request->dia_chi;
                $account['so_dien_thoai'] = $request->so_dien_thoai;
                $account['admin'] = false;
                $account_id = TaiKhoan::insertGetId($account);

                $total = Cart::subtotal();
                $bill = array();
                $bill['tai_khoans_id'] = $account_id;
                $bill['ngay_lap_hd'] = Carbon::now();
                $bill['tong_tien'] = $total;
                $bill['trang_thai'] = true;
                $bill_id = HoaDon::insertGetId($bill);
            }


            else { 
                $bill = array();
                $bill['tai_khoans_id'] = $check_account->id;
                $bill['ngay_lap_hd'] = Carbon::now();
                $bill['trang_thai'] = true;
                $bill_id = HoaDon::insertGetId($bill);
            }   

            $data = Session::all();
            $loi_nhuan = 0;
            $tongtien = 0;
            $bill_detail = new ChiTietHoaDon();
            $bill_detail->hoa_dons_id = $bill_id;
            $bill_detail->chi_tiet_san_phams_id = $data['id'];
            $bill_detail->so_luong = $data['so_luong']; 
            $update_ctsp = ChiTietSanPham::find($data['id']);
            $update_ctsp->so_luong -= $data['so_luong'];
            $bill_detail->gia_goc = $update_ctsp->sanPham->gia_goc;
            $bill_detail->gia_ban = $data['gia'];
            $tongtien += ($data['gia']*$data['so_luong']);
            $loi_nhuan += (($data['gia'] - $update_ctsp->sanPham->gia_goc)*$data['so_luong']);
            $update_ctsp->save();
            $bill_detail->save();
            $add_loi_nhuan = HoaDon::find($bill_id);
            $add_loi_nhuan->loi_nhuan = $loi_nhuan;
            $add_loi_nhuan->tong_tien = $tongtien;
            $add_loi_nhuan->save();
        }
        Session::forget('id');
        Session::forget('ten_san_pham');
        Session::forget('gia');
        Session::forget('so_luong');
        Session::forget('anh');
        Session::forget('size');
        Session::forget('mau');
        echo 'Thanh toán thành công';
    }
    public function delete($id) {
        $new = HoaDon::find($id);
        $new->trang_thai = false;
        $new->save();
        echo 'done';
    }
    public function checkBill($id) {
        $new = HoaDon::find($id);
        $new->chot_don = true;
        $new->save();
        echo 'done';
    }
    public function printBill($id) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }
    public function print_order_convert($id) {
        $bill = HoaDon::find($id);
        $bill_detail = ChiTietHoaDon::where('hoa_dons_id', $id)->get();
        return view('admin.bill.form_print',array('bill' => $bill,'bill_detail' => $bill_detail));
    }
    public function search(Request $request) {
        // dd($request->all());
        $key = $request->key_search;
        $key_from_day = $request->key_from_day;
        // dd($key_from_day);
        $key_to_day = $request->key_to_day;

        $query = HoaDon::where('trang_thai',1)
        ->where('id','LIKE','%' .$key. '%');

        if(!empty($key)){
            $query->orWhereHas('taiKhoan', function($query) use ($key) {
                $query->where('ho_ten','LIKE','%'.$key.'%');
            });
        }
        if(!empty($key_from_day) && !empty($key_to_day)){
            $query->whereBetween('ngay_lap_hd',[$key_from_day, $key_to_day])
            ->orderBy('ngay_lap_hd','ASC');
        }
        
        $array = ['arrays'=> $query->paginate(5)];

        // if(!empty($key)){
        //     if(!empty($key_from_day)){
        //         if(!empty($key_to_day)){
        //             $array = ['arrays'=>HoaDon::where('trang_thai',1)
        //             ->where('id','LIKE','%' .$key. '%')
        //             ->orWhereHas('taiKhoan', function($query) use ($key) {
        //                 $query->where('ho_ten','LIKE','%'.$key.'%');
        //             })
        //             ->whereBetween('ngay_lap_hd',[$key_from_day, $key_to_day])->orderBy('ngay_lap_hd','ASC')
        //                     ->get()];
        //         }
        //         else
        //         {
        //             $array = ['arrays'=>HoaDon::where('trang_thai',1)
        //             ->where('id','LIKE','%' .$key. '%')
        //             ->orWhereHas('taiKhoan', function($query) use ($key) {
        //                 $query->where('ho_ten','LIKE','%'.$key.'%');
        //             })
        //             ->get()];
        //         }
        //     }
        //     else
        //     {
        //         $array = ['arrays'=>HoaDon::where('trang_thai',1)
        //             ->where('id','LIKE','%' .$key. '%')
        //             ->orWhereHas('taiKhoan', function($query) use ($key) {
        //                 $query->where('ho_ten','LIKE','%'.$key.'%');
        //             })
        //             ->get()];
        //     }
            
        // }
        // else
        // {
        //     return 'ok';
        // }
                        //  ->whereBetween('ngay_lap_hd',[$key_from_day, $key_to_day])->orderBy('ngay_lap_hd','ASC')
                        //     ->get()];
       
        return view('admin.bill.index',$array);
    }
}
