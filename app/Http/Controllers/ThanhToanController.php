<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\SanPham;
use App\ChiTietSanPham;
use App\Anh;
use App\GioHang;
use Session;

class ThanhToanController extends Controller
{
    public function index() {
        if(Auth::check() && Auth::user()->admin != 1) {
            $arrays = GioHang::where('tai_khoans_id',Auth::user()->id)
                            ->with(array('chiTietSanPham' => function($query) {
                                $query->with(array('sanPham' => function($querys) {
                                    $querys->with(array('anh' => function($que) {
                                            $que->where('anhchinh',1);
                                    }));
                                }));
                            }))
                            ->get();
            return view('pages.pay', compact('arrays')); 
        } else {
            return view('pages.pay');   
        }
    }
    public function postindex(Request $request) {
        echo 'mua hang lien';
    }
    public function postThanhToanNgayIndex(Request $request) {
        $sanpham = ChiTietSanPham::where('san_phams_id',$request->id)->where('mau',$request->mau)->where('kich_thuoc',$request->kich_thuoc)->first();
        $anh = Anh::select('anhchitiet')->where('san_phams_id', $request->id)->where('anhchinh',true)->first();
        $so_luong = $request->so_luong;
        Session::put('id',$sanpham->id);
        Session::put('ten_san_pham',$sanpham->sanPham->ten_san_pham);
        Session::put('gia',$sanpham->sanPham->gia_ban*(100-$sanpham->sanPham->giam_gia)/100);
        Session::put('so_luong',$request->so_luong);
        Session::put('anh',$anh->anhchitiet);
        Session::put('size',$sanpham->kich_thuoc);
        Session::put('mau',$sanpham->mau);
        $data = Session::all();
        return view('pages.buy_now', compact('data'));
    }
    public function thanhToanNgayIndex() {
        $data = Session::all();
        return view('pages.buy_now', compact('data'));
    }
}
