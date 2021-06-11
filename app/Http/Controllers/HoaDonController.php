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

class HoaDonController extends Controller
{
    public function index() {
        $array = ['arrays'=>HoaDon::where('trang_thai',1)->get()];
        return view('admin.bill.index',$array);
    }
    public function billDetail($id) {
        $array = ['arrays'=>ChiTietHoaDon::where('hoa_dons_id',$id)->get()];
        return view('admin.bill.product_detail_modal_bootstrap',$array);
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
            $loi_nhuan = 0;
            foreach($contents as $content) {
                $bill_detail = new ChiTietHoaDon();
                $bill_detail->hoa_dons_id = $bill_id;
                $bill_detail->chi_tiet_san_phams_id = $content->id;
                $bill_detail->so_luong = $content->qty; 
                $update_ctsp = ChiTietSanPham::find($content->id);
                $update_ctsp->so_luong -= $content->qty;
                $bill_detail->gia_goc = $update_ctsp->sanPham->gia_goc;
                $bill_detail->gia_ban = $update_ctsp->sanPham->gia_ban;
                $loi_nhuan += (($update_ctsp->gia_ban - $update_ctsp->gia_goc)*$content->qty);
                $update_ctsp->save();
                $bill_detail->save();
            }
            $add_loi_nhuan = HoaDon::find($bill_id);
            $add_loi_nhuan->loi_nhuan = $loi_nhuan;
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
                $bill['tong_tien'] = (int)$total * 1000000;
                $bill['trang_thai'] = true;
                $bill_id = HoaDon::insertGetId($bill);
            }


            else { 
                $total = Cart::subtotal();
                $bill = array();
                $bill['tai_khoans_id'] = $check_account->id;
                $bill['ngay_lap_hd'] = Carbon::now();
                $bill['tong_tien'] = (int)$total * 1000000;
                $bill['trang_thai'] = true;
                $bill_id = HoaDon::insertGetId($bill);
            }   

            $contents = Cart::content();
            $loi_nhuan = 0;
            foreach($contents as $content) {
                $bill_detail = new ChiTietHoaDon();
                $bill_detail->hoa_dons_id = $bill_id;
                $bill_detail->chi_tiet_san_phams_id = $content->id;
                $bill_detail->so_luong = $content->qty;
                $update_ctsp = ChiTietSanPham::find($content->id);
                $update_ctsp->so_luong -= $content->qty;
                $bill_detail->gia_goc = $update_ctsp->sanPham->gia_goc;
                $bill_detail->gia_ban = $update_ctsp->sanPham->gia_ban;
                $loi_nhuan += (($update_ctsp->sanPham->gia_ban - $update_ctsp->sanPham->gia_goc)*$content->qty);
                $update_ctsp->save();
                $bill_detail->save();
            }
            $add_loi_nhuan = HoaDon::find($bill_id);
            $add_loi_nhuan->loi_nhuan = $loi_nhuan;
        }
        Cart::destroy();
        echo 'Thanh toán thành công';
    }
    public function delete($id) {
        $new = HoaDon::find($id);
        $new->trang_thai = false;
        $new->save();
        $array = ['arrays'=>HoaDon::where('trang_thai',1)->get()];
        return view('admin.bill.delete_bill_ajax',$array);
    }
    public function checkBill($id) {
        $new = HoaDon::find($id);
        $new->chot_don = true;
        $new->save();
        $array = ['arrays'=>HoaDon::where('trang_thai',1)->get()];
        return view('admin.bill.delete_bill_ajax',$array);
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
        
        $array = ['arrays'=> $query->get()];

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
