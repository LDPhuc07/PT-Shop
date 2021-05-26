<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\SanPham;
use App\Anh;


class GioHangController extends Controller
{
    public function index() {
        return view('pages.cart');
    }
    public function save(Request $request) {
        $sanpham = SanPham::where('id',10)->first();
        $anh = Anh::select('anhchitiet')->where('san_phams_id', $request->id)->where('anhchinh',true)->first();

        $data['id'] = 10;
        $data['qty'] = $request->so_luong;
        $data['name'] = $sanpham->ten_san_pham;
        $data['price'] = $sanpham->gia_ban;
        $data['weight'] = 132;
        $data['options']['image'] = $anh->anhchitiet;
        $data['options']['size'] = $request->kich_thuoc;
        $data['options']['color'] = $request->mau;
        Cart::add($data);
        // Cart::destroy();

        return redirect()->route('cart.index');
    }
    public function deleteItem($id) {
        Cart::update($id,0);

        return redirect()->route('cart.index');
    }
}
