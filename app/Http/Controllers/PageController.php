<?php

namespace App\Http\Controllers;
use App\Slideshow;
use App\SanPham;
use App\Anh;
use App\ChiTietHoaDon;
use App\ChiTietSanPham;
use App\LoaiSanPham;
use App\YeuThich;
use App\HoaDon;
use App\DanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PageController extends Controller
{
    //
    public function tatcasanpham($idlsp, $idmtt){

        return view('pages.product');
        
    }
    public function index() {
        $slides = Slideshow::orderby('id', 'desc')->offset(0)->limit(3)->get();
        $sanphammoinhats= SanPham::orderby('id', 'desc') ->with(array('anh' => function($query) {
            $query->where('anhchinh',1);
        }))->offset(0)->limit(4)->get();
        $yeu_thich = YeuThich::select(array('san_phams_id',DB::raw('COUNT(id) as yeu_thich')))
                                ->groupBy('san_phams_id')
                                ->get();
        $danh_gia = DanhGia::select(array('san_phams_id',DB::raw('AVG(diem) as danh_gia')))
                                ->groupBy('san_phams_id')
                                ->get();
        $sanphams = SanPham::inRandomOrder() ->with(array('anh' => function($query) {
            $query->where('anhchinh',1);
        }))->offset(0)->limit(6)->get();

        $sanphamhots = SanPham::whereNotNull('giam_gia')->orderby('id', 'desc') 
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->offset(0)->limit(4)->get();

        $ctsp = ChiTietHoaDon::select('chi_tiet_san_phams_id', DB::raw('SUM(so_luong) as so_luong'))
                                ->groupBy('chi_tiet_san_phams_id')
                                ->orderBy('so_luong','desc')->offset(0)->limit(2)->get()->pluck('chi_tiet_san_phams_id');

        $sanphamphobiens = SanPham::whereIn('id',$ctsp)
                                    ->with(array('anh' => function($query) {
                                        $query->where('anhchinh',1);
                                    }))->get();
        if(Auth::check() and Auth::user()->admin != 1) {
            $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
            return view('pages.index', compact('yeu_thich','danh_gia','slides','sanphammoinhats','sanphams','sanphamhots','sanphamphobiens','is_like'));
        }
        else {
            return view('pages.index', compact('yeu_thich','danh_gia','slides','sanphammoinhats','sanphams','sanphamhots','sanphamphobiens'));
        }
    }
    public function chitietsanpham(Request $request){
        $sanpham = SanPham::where('id',$request->id)->with(array('anh' => function($query) {
            $query->whereNotNull('link');
        }))->first();
        $anhchinh = SanPham::where('id',$request->id)->with(array('anh' => function($query) {
            $query->where('anhchinh',1);
        }))->first();
        $yeu_thich = YeuThich::select(array('san_phams_id',DB::raw('COUNT(id) as yeu_thich')))
                                ->groupBy('san_phams_id')
                                ->get();
        $danh_gia = DanhGia::select(array('san_phams_id',DB::raw('AVG(diem) as danh_gia')))
                                ->groupBy('san_phams_id')
                                ->get();
        $size = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$request->id)->distinct()->get();
        // dd($size);
        $color = ChiTietSanPham::select('mau')->where('san_phams_id',$request->id)->distinct()->get();
        $first_color = ChiTietSanPham::select('mau')->where('san_phams_id',$request->id)->first();
        $size_by_first_color = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$request->id)->where('mau',$first_color->mau)->distinct()->get();
        $size_by_first_color_set_qty = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$request->id)->where('mau',$first_color->mau)->distinct()->first();
        $qty = ChiTietSanPham::select('so_luong')->where('san_phams_id',$request->id)->where('mau',$first_color->mau)->where('kich_thuoc',$size_by_first_color_set_qty->kich_thuoc)->first();
        // sản phẩm liên quan lấy chung loại
        $sanphamlienquans = SanPham::where('loai_san_phams_id','=',$sanpham->loai_san_phams_id)->where('id','<>',$sanpham->id)->orderby('id', 'desc')->with('loaiSanPham') 
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->offset(0)->limit(4)->get();
        if(Auth::check() and Auth::user()->admin != 1) {
            $id_sp = $request->id;
            $check_bills = HoaDon::where('tai_khoans_id', Auth::user()->id)
                                        ->whereHas('chiTietHoaDon', function($query) use ($id_sp) {
                                            $query->whereHas('chiTietSanPham', function($que) use ($id_sp) {
                                                $que->where('san_phams_id', $id_sp);
                                            });
                                        })
                                        ->get();
            $check_rate = DanhGia::where('tai_khoans_id', Auth::user()->id)->where('san_phams_id', $request->id)->first();
            $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
            return view('pages.product_detail',compact('yeu_thich','danh_gia','qty','sanpham','anhchinh','size','color','sanphamlienquans','first_color','size_by_first_color','is_like','check_rate','check_bills'));
        }
        else {
            return view('pages.product_detail',compact('yeu_thich','danh_gia','qty','sanpham','anhchinh','size','color','sanphamlienquans','first_color','size_by_first_color'));
        }
    }
    public function getSize($id, $mau) {
        $id_sp = $id;
        $mau_sp = $mau;
        $size_by_first_color = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$id)->where('mau',$mau)->distinct()->get();
        $size_by_first_color_set_qty = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$id)->where('mau',$mau)->distinct()->first();
        $qty = ChiTietSanPham::select('so_luong')->where('san_phams_id',$id)->where('mau',$mau)->where('kich_thuoc',$size_by_first_color_set_qty->kich_thuoc)->first();
        return view('pages.get_size_ajax',compact('qty','size_by_first_color','id_sp','mau_sp'));
    }
    public function getQty($id, $mau, $kichthuoc) {
        $qty = ChiTietSanPham::select('so_luong')->where('san_phams_id',$id)->where('mau',$mau)->where('kich_thuoc',$kichthuoc)->first();
        return view('pages.get_qty_ajax',compact('qty'));
    }
    public function like($sp_id, $tk_id) {
        $new = new YeuThich();
        $new->san_phams_id = $sp_id;
        $new->tai_khoans_id = $tk_id;
        $new->save();
        echo 'done';
        // $slides = Slideshow::orderby('id', 'desc')->offset(0)->limit(3)->get();
        // $sanphammoinhats= SanPham::orderby('id', 'desc') ->with(array('anh' => function($query) {
        //     $query->where('anhchinh',1);
        // }))->offset(0)->limit(4)->get();

        // $sanphams = SanPham::inRandomOrder() ->with(array('anh' => function($query) {
        //     $query->where('anhchinh',1);
        // }))->offset(0)->limit(6)->get();

        // $sanphamhots = SanPham::whereNotNull('giam_gia')->orderby('id', 'desc') 
        //                         ->with(array('anh' => function($query) {
        //                             $query->where('anhchinh',1);
        //                         }))->offset(0)->limit(4)->get();

        // $ctsp = ChiTietHoaDon::select('chi_tiet_san_phams_id', DB::raw('SUM(so_luong) as so_luong'))
        //                         ->groupBy('chi_tiet_san_phams_id')
        //                         ->orderBy('so_luong','desc')->offset(0)->limit(2)->get()->pluck('san_phams_id');

        // $sanphamphobiens = SanPham::with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             })) 
        //                             ->whereIn('id',$ctsp)
        //                             ->get();
        // if(Auth::check() and Auth::user()->admin != 1) {
        //     $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
        //     return view('pages.like_ajax', compact('slides','sanphammoinhats','sanphams','sanphamhots','sanphamphobiens','is_like'));
        // }
        // // $sanphamphobiens = SanPham::inRandomOrder() ->with(array('anh' => function($query) {
        // //                     $query->where('anhchinh',1);
        // //                 }))->offset(0)->limit(2)->get();
        // // sản phẩm phổ biến đổ sản phẩm bán nhiều nhất  của web
        // // dd($sanphamphobiens);
        // else {
        //     return view('pages.like_ajax', compact('slides','sanphammoinhats','sanphams','sanphamhots','sanphamphobiens'));
        // }

    }
    public function likeProductDetail($sp_id, $tk_id) {
        $new = new YeuThich();
        $new->san_phams_id = $sp_id;
        $new->tai_khoans_id = $tk_id;
        $new->save();
        $sanpham = SanPham::where('id',$sp_id)->first();
        if(Auth::check() and Auth::user()->admin != 1) {
            $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
            return view('pages.like_product_detail_ajax', compact('is_like','sanpham'));
        }
        else {
            return view('pages.like_product_detail_ajax', compact('sanpham'));
        }
    }
    public function dislikeProductDetail($sp_id, $tk_id) {
        $new = YeuThich::where('tai_khoans_id',$tk_id)->where('san_phams_id',$sp_id)->delete();
        $sanpham = SanPham::where('id',$sp_id)->first();
        if(Auth::check() and Auth::user()->admin != 1) {
            $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
            return view('pages.like_product_detail_ajax', compact('is_like','sanpham'));
        }
        else {
            return view('pages.like_product_detail_ajax', compact('sanpham'));
        }
    }
    public function likeProductDetailSPLQ($sp_id, $tk_id) {
        $new = new YeuThich();
        $new->san_phams_id = $sp_id;
        $new->tai_khoans_id = $tk_id;
        $new->save();
        $sanpham = SanPham::where('id',$sp_id)->first();
        $sanphamlienquans = SanPham::where('loai_san_phams_id','=',$sanpham->loai_san_phams_id)->where('id','<>',$sanpham->id)->orderby('id', 'desc')->with('loaiSanPham') 
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->offset(0)->limit(4)->get();
        if(Auth::check() and Auth::user()->admin != 1) {
            $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
            return view('pages.like_product_detail_splq', compact('is_like','sanphamlienquans','sanpham'));
        }
        else {
            return view('pages.like_product_detail_splq', compact('sanphamlienquans','sanpham'));
        }
    }
    public function dislikeProductDetailSPLQ($sp_id, $tk_id) {
        $new = YeuThich::where('tai_khoans_id',$tk_id)->where('san_phams_id',$sp_id)->delete();
        $sanpham = SanPham::where('id',$sp_id)->first();
        $sanphamlienquans = SanPham::where('loai_san_phams_id','=',$sanpham->loai_san_phams_id)->where('id','<>',$sanpham->id)->orderby('id', 'desc')->with('loaiSanPham') 
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->offset(0)->limit(4)->get();

        if(Auth::check() and Auth::user()->admin != 1) {
            $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
            return view('pages.like_product_detail_splq', compact('is_like','sanphamlienquans','sanpham'));
        }
        else {
            return view('pages.like_product_detail_splq', compact('sanphamlienquans','sanpham'));
        }
    }
    public function dislike($sp_id, $tk_id) {
        $new = YeuThich::where('tai_khoans_id',$tk_id)->where('san_phams_id',$sp_id)->delete();
        echo 'done';
        // $slides = Slideshow::orderby('id', 'desc')->offset(0)->limit(3)->get();
        // $sanphammoinhats= SanPham::orderby('id', 'desc') ->with(array('anh' => function($query) {
        //     $query->where('anhchinh',1);
        // }))->offset(0)->limit(4)->get();

        // $sanphams = SanPham::inRandomOrder() ->with(array('anh' => function($query) {
        //     $query->where('anhchinh',1);
        // }))->offset(0)->limit(6)->get();

        // $sanphamhots = SanPham::whereNotNull('giam_gia')->orderby('id', 'desc') 
        //                         ->with(array('anh' => function($query) {
        //                             $query->where('anhchinh',1);
        //                         }))->offset(0)->limit(4)->get();

        // $ctsp = ChiTietHoaDon::select('chi_tiet_san_phams_id', DB::raw('SUM(so_luong) as so_luong'))
        //                         ->groupBy('chi_tiet_san_phams_id')
        //                         ->orderBy('so_luong','desc')->offset(0)->limit(2)->get()->pluck('san_phams_id');

        // $sanphamphobiens = SanPham::with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             })) 
        //                             ->whereIn('id',$ctsp)
        //                             ->get();
        // if(Auth::check() and Auth::user()->admin != 1) {
        //     $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
        //     return view('pages.like_ajax', compact('slides','sanphammoinhats','sanphams','sanphamhots','sanphamphobiens','is_like'));
        // }
        // // $sanphamphobiens = SanPham::inRandomOrder() ->with(array('anh' => function($query) {
        // //                     $query->where('anhchinh',1);
        // //                 }))->offset(0)->limit(2)->get();
        // // sản phẩm phổ biến đổ sản phẩm bán nhiều nhất  của web
        // // dd($sanphamphobiens);
        // else {
        //     return view('pages.like_ajax', compact('slides','sanphammoinhats','sanphams','sanphamhots','sanphamphobiens'));
        // }
    }
    public function indexRating() {
        $check_bills = HoaDon::where('tai_khoans_id', Auth::user()->id)
                                        ->whereHas('chiTietHoaDon', function($query) {
                                            $query->whereHas('chiTietSanPham', function($que) {
                                                $que->where('san_phams_id', 100);
                                            });
                                        })
                                        ->get();
        $check_rate = DanhGia::where('tai_khoans_id', 3)->where('san_phams_id', 1)->first();
        return view('pages.rating', compact('check_rate','check_bills'));
    }
    public function rating($sao, $id, $sanpham) {
        $check_rate = DanhGia::where('tai_khoans_id', $id)->where('san_phams_id', $sanpham)->first();
        if($check_rate != null) {
            $update_rate = DanhGia::where('tai_khoans_id', $id)->where('san_phams_id', $sanpham)->first();
            $update_rate->diem = $sao;
            $update_rate->save();
        }
        else {
            $new = new DanhGia();
            $new->tai_khoans_id = $id;
            $new->san_phams_id = $sanpham;
            $new->diem = $sao;
            $new->save();
        }
        $rating = DanhGia::select(array(DB::raw('AVG(diem) as danh_gia')))
        ->where('san_phams_id', $sanpham)
        ->first();
        echo "$rating->danh_gia";
        
    }
    public function danhSachYeuThich() {
        $like = ['likes'=>YeuThich::where('tai_khoans_id', Auth::user()->id)
                                    ->with(array('sanPham' => function($query) {
                                                            $query->with(array('anh' => function($querys) {
                                                                                            $querys->where('anhchinh',1);
                                                                        }));
                                            }))->get()];
        return view('pages.listlike', $like);
    }
}