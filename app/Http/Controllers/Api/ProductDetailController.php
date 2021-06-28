<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Slideshow;
use App\SanPham;
use App\Anh;
use App\ChiTietHoaDon;
use App\ChiTietSanPham;
use App\MonTheThao;
use App\LoaiSanPham;
use App\NhaSanXuat;
use App\BinhLuan;
use App\TaiKhoan;
use DB;
class ProductDetailController extends Controller
{
    //
    public function getbinhluan(Request $request)
    {
        // if(!empty($request->page))
        // {
        //     return  BinhLuan::where('san_phams_id',$request->idsp)
        //                     ->orderBy('created_at','desc')
        //                     ->offset(0)
        //                     ->limit($request->page*10)
        //                     ->with(['taiKhoan','sanPham'])
        //                     ->get()->toArray();
        // }

        // else
        // {
        //     return BinhLuan::where('san_phams_id',$request->idsp)
        //                     ->orderBy('created_at','desc')
        //                     ->offset(0)
        //                     ->limit(10)
        //                     ->with(['taiKhoan','sanPham'])
        //                     ->get()->toArray();
        // }
        $data = BinhLuan::where('san_phams_id',$request->idsp)
                        ->orderBy('created_at','desc')
                        ->offset($request->page*10)
                        ->limit(10)
                        ->with(['taiKhoan','sanPham'])
                        ->get()->toArray();
                        // dd($data);
        return $data;
    }
    public function postbinhluan(Request $request)
    {
        
        $data = new BinhLuan();
        $data->noi_dung=$request->cmt;
        $data->san_phams_id=$request->idsp;
        $data->tai_khoans_id=$request->idkh;
        $data->save();
        
        $data = BinhLuan::where('san_phams_id',$request->idsp)
                        ->orderBy('created_at','desc')
                        ->offset($request->page*10)
                        ->limit(10)
                        ->with(['taiKhoan','sanPham'])
                        ->get()->toArray();
                      
        return $data;
    }
}
