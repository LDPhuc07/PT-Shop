<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use DB;
use App\SanPham;
use App\ChiTietSanPham;
use App\Anh;
use App\GioHang;

class GioHangController extends Controller
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
            return view('pages.cart', compact('arrays'));
        } else {
            return view('pages.index');
        }
    }
    public function save(Request $request) {
        $sanpham = SanPham::where('id',$request->id)->first();
        $ctsp = ChiTietSanPham::where('san_phams_id',$request->id)->where('mau',$request->mau)->where('kich_thuoc',$request->kich_thuoc)->first();
        $anh = Anh::select('anhchitiet')->where('san_phams_id', $request->id)->where('anhchinh',true)->first();
        
        if(Auth::check() && Auth::user()->admin != 1) {
            $check = GioHang::where('tai_khoans_id',Auth::user()->id)->where('chi_tiet_san_phams_id',$ctsp->id)->first();

            if(empty($check)) {
                $create = new GioHang();
                $create->tai_khoans_id = Auth::user()->id;
                $create->chi_tiet_san_phams_id = $ctsp->id;
                $create->so_luong = $request->so_luong;
                $create->save();
            } else {
                if($ctsp->so_luong >= ($check->so_luong + $request->so_luong)) {
                    $update = GioHang::find($check->id);
                    $update->so_luong += $request->so_luong;
                    $update->save();
                } else {
                    $update = GioHang::find($check->id);
                    $update->so_luong = $ctsp->so_luong;
                    $update->save();
                }
            }
            $arrays = GioHang::where('tai_khoans_id',Auth::user()->id)->where('chi_tiet_san_phams_id',$ctsp->id)
                                    ->with(array('chiTietSanPham' => function($query) {
                                        $query->with(array('sanPham' => function($querys) {
                                            $querys->with(array('anh' => function($que) {
                                                    $que->where('anhchinh',1);
                                            }));
                                        }));
                                    }))
                                    ->first();
            return view('pages.alert_cart',compact('arrays'));
        } else {
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
            $arrays = Cart::content()->where('id',$ctsp->id);
            return view('pages.alert_cart',compact('arrays'));
        }
        // return redirect()->route('cart.index');
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
    }
    public function deleteItemAjax($id) {
        if(Auth::check() && Auth::user()->admin != 1) {
            $update = GioHang::find($id);
            $update->delete();

            $arrays = GioHang::where('tai_khoans_id',Auth::user()->id)
                                    ->with(array('chiTietSanPham' => function($query) {
                                        $query->with(array('sanPham' => function($querys) {
                                            $querys->with(array('anh' => function($que) {
                                                    $que->where('anhchinh',1);
                                            }));
                                        }));
                                    }))
                                    ->get();
            
            return view('pages.ajax_delete_item_cart', compact('arrays'));
        } else {
            Cart::update($id,0);
            return view('pages.ajax_delete_item_cart');
        }
    }
    public function updateItem($id, $qty) {
        if(Auth::check() && Auth::user()->admin != 1) {
            $update = GioHang::find($id);
            $update->so_luong = $qty;
            $update->save();
            
            $arrays = GioHang::where('tai_khoans_id',Auth::user()->id)
                            ->with(array('chiTietSanPham' => function($query) {
                                $query->with(array('sanPham' => function($querys) {
                                    $querys->with(array('anh' => function($que) {
                                            $que->where('anhchinh',1);
                                    }));
                                }));
                            }))
                            ->get();

            return view('pages.ajax_delete_item_cart', compact('arrays'));
        } else {
            Cart::update($id,['qty' => $qty]);
            return view('pages.ajax_delete_item_cart');
        }
    }
}
