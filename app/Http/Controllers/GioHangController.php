<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\SanPham;
use App\ChiTietSanPham;
use App\Anh;


class GioHangController extends Controller
{
    public function index() {
        return view('pages.cart');
    }
    public function save(Request $request) {
        $sanpham = SanPham::where('id',$request->id)->first();
        $ctsp = ChiTietSanPham::where('san_phams_id',$request->id)->where('mau',$request->mau)->where('kich_thuoc',$request->kich_thuoc)->first();
        $anh = Anh::select('anhchitiet')->where('san_phams_id', $request->id)->where('anhchinh',true)->first();

        $data['id'] = $ctsp->id;
        $data['qty'] = $request->so_luong;
        $data['name'] = $sanpham->ten_san_pham;
        $data['price'] = $sanpham->gia_ban;
        $data['weight'] = 132;
        $data['options']['image'] = $anh->anhchitiet;
        $data['options']['size'] = $ctsp->kich_thuoc;
        $data['options']['color'] = $ctsp->mau;
        $data['options']['qty_original'] = $ctsp->so_luong;
        Cart::add($data);
        // Cart::destroy();

        return redirect()->route('cart.index');
    }
    public function deleteItemAjax($id) {
        Cart::update($id,0);

        return view('pages.ajax_delete_item_cart');
    }
    public function updateItem($id, $qty) {
        Cart::update($id,['qty' => $qty]);

        return view('pages.ajax_delete_item_cart');
    }
}
