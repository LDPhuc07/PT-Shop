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
        


        $contents = Cart::content();
        $dem = 0;
        foreach($contents as $content) {
            $dem++;
        }
        if($dem == 0) {
            $data['id'] = $ctsp->id;
            $data['qty'] = $request->so_luong;
            $data['name'] = $sanpham->ten_san_pham;
            $data['price'] = $sanpham->gia_ban*(100-$sanpham->giam_gia)/100;
            $data['weight'] = 132;
            $data['options']['image'] = $anh->anhchitiet;
            $data['options']['size'] = $ctsp->kich_thuoc;
            $data['options']['color'] = $ctsp->mau;
            $data['options']['qty_original'] = $ctsp->so_luong;
            Cart::add($data);
        } else {
            foreach($contents as $content) {
                if($content->id != $ctsp->id) {
                    $data['id'] = $ctsp->id;
                    $data['qty'] = $request->so_luong;
                    $data['name'] = $sanpham->ten_san_pham;
                    $data['price'] = $sanpham->gia_ban*(100-$sanpham->giam_gia)/100;
                    $data['weight'] = 132;
                    $data['options']['image'] = $anh->anhchitiet;
                    $data['options']['size'] = $ctsp->kich_thuoc;
                    $data['options']['color'] = $ctsp->mau;
                    $data['options']['qty_original'] = $ctsp->so_luong;
                    Cart::add($data);
                } elseif($ctsp->so_luong >= ($request->so_luong + $content->qty)) {
                    $data['id'] = $ctsp->id;
                    $data['qty'] = $request->so_luong;
                    $data['name'] = $sanpham->ten_san_pham;
                    $data['price'] = $sanpham->gia_ban*(100-$sanpham->giam_gia)/100;
                    $data['weight'] = 132;
                    $data['options']['image'] = $anh->anhchitiet;
                    $data['options']['size'] = $ctsp->kich_thuoc;
                    $data['options']['color'] = $ctsp->mau;
                    $data['options']['qty_original'] = $ctsp->so_luong;
                    Cart::add($data);
                } else {
                    Cart::update($content->rowId,['qty' => $ctsp->so_luong]);
                }
            }
        }
        // if($content->id != null) {
        //     $data['id'] = $ctsp->id;
        //     $data['qty'] = $request->so_luong;
        //     $data['name'] = $sanpham->ten_san_pham;
        //     $data['price'] = $sanpham->gia_ban*(100-$sanpham->giam_gia)/100;
        //     $data['weight'] = 132;
        //     $data['options']['image'] = $anh->anhchitiet;
        //     $data['options']['size'] = $ctsp->kich_thuoc;
        //     $data['options']['color'] = $ctsp->mau;
        //     $data['options']['qty_original'] = $ctsp->so_luong;
        //     Cart::add($data);
        // }


        // // Cart::destroy();
        // ($ctsp->id == $content->id and $ctsp->so_luong >= ($request->so_luong + $content->qty))
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
