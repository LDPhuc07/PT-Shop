<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;

class SanPhamController extends Controller
{
    public function indexAdmin() {
        return view('admin.product.index');
    }

    public function create() {
        return view('admin.product.add_product');
    }
    public function index() {
        // $array = ["arrays"=>SanPham::where('daxoa','=',0)->get()];
        return view('pages.index');
    }
    public function hienThiTatCaSanPham() {
        $array = ["arrays"=>SanPham::where('trang_thai','=',1)->get()];
        return view('pages.product',$array);
    }
}
