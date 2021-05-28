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

class HoaDonController extends Controller
{
    public function index() {
        $array = ['arrays'=>HoaDon::where('trang_thai',1)->get()];
        return view('admin.bill.index',$array);
    }
    public function create(Request $request){
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
            $total = Cart::subtotal();
            $bill = array();
            $bill['tai_khoans_id'] = Auth::user()->id;
            $bill['ngay_lap_hd'] = Carbon::now();
            $bill['tong_tien'] = (int)$total * 1000000;
            $bill['trang_thai'] = true;
            $bill_id = HoaDon::insertGetId($bill);

            $contents = Cart::content();
            foreach($contents as $content) {
                $bill_detail = new ChiTietHoaDon();
                $bill_detail->hoa_dons_id = $bill_id;
                $bill_detail->chi_tiet_san_phams_id = $content->id;
                $bill_detail->so_luong = $content->qty;
                $bill_detail->save(); 
                $update_ctsp = ChiTietSanPham::find($content->id);
                $update_ctsp->so_luong -= $content->qty;
                $update_ctsp->save();
            }
            Cart::destroy();
            echo 'Thanh toán thành công';
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
            $bill['tong_tien'] = (int)$total * 1000000;
            $bill['trang_thai'] = true;
            $bill_id = HoaDon::insertGetId($bill);

            $contents = Cart::content();
            foreach($contents as $content) {
                $bill_detail = new ChiTietHoaDon();
                $bill_detail->hoa_dons_id = $bill_id;
                $bill_detail->chi_tiet_san_phams_id = $content->id;
                $bill_detail->so_luong = $content->qty;
                $bill_detail->save(); 
                $update_ctsp = ChiTietSanPham::find($content->id);
                $update_ctsp->so_luong -= $content->qty;
                $update_ctsp->save();
            }
            Cart::destroy();
            echo 'Thanh toán thành công';
        }
    }
}
