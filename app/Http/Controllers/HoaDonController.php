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
use Carbon\Carbon;

class HoaDonController extends Controller
{
    public function create(){
        if(Auth::check()) {
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
                $bill_detail->san_phams_id = $content->id;
                $bill_detail->so_luong = $content->qty;
                $bill_detail->save(); 
            }

            echo 'Thanh toán thành công';
        }
        else {
            echo 'Thanh toán thất bại';
        }
    }
}
