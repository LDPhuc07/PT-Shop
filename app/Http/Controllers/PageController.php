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
use App\GioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use DB;

class PageController extends Controller
{
    //
    public function tatcasanpham(Request $request){

        return view('pages.product2');
        
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
        $list_danh_gia = DanhGia::where('san_phams_id', $request->id)->get();
        $dem_danh_gia = DanhGia::where('san_phams_id',$request->id)->count();
        $size = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$request->id)->distinct()->get();
        // dd($size);
        $color = ChiTietSanPham::select('mau')->where('san_phams_id',$request->id)->distinct()->get();
        
        
       
        // sản phẩm liên quan lấy chung loại
        $sanphamlienquans = SanPham::where('loai_san_phams_id','=',$sanpham->loai_san_phams_id)->where('id','<>',$sanpham->id)->orderby('id', 'desc')->with('loaiSanPham') 
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->offset(0)->limit(4)->get();
    
        if(count($color) == 0 || count($size) == 0) 
        {
            return view('pages.un_product_detail');
        }
        else
        {
            $first_color = ChiTietSanPham::select('mau')->where('san_phams_id',$request->id)->first();
            $size_by_first_color = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$request->id)->where('mau',$first_color->mau)->distinct()->get();
            $size_by_first_color_set_qty = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$request->id)->where('mau',$first_color->mau)->distinct()->first();
            $qty = ChiTietSanPham::select('so_luong')->where('san_phams_id',$request->id)->where('mau',$first_color->mau)->where('kich_thuoc',$size_by_first_color_set_qty->kich_thuoc)->first();
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
                return view('pages.product_detail',compact('yeu_thich','danh_gia','qty','sanpham','anhchinh','size','color','sanphamlienquans','first_color','size_by_first_color','is_like','check_rate','check_bills','dem_danh_gia','list_danh_gia'));
            }
            
            else {
                return view('pages.product_detail',compact('yeu_thich','danh_gia','qty','sanpham','anhchinh','size','color','sanphamlienquans','first_color','size_by_first_color','dem_danh_gia','list_danh_gia'));
            }
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

        $dem_yeu_thich = YeuThich::where('tai_khoans_id',$tk_id)->count();
        
        return $dem_yeu_thich;
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
        $arrays = DB::table('gio_hangs')->select('chi_tiet_san_phams.mau as mau','chi_tiet_san_phams.kich_thuoc as kich_thuoc','san_phams.ten_san_pham as ten_san_pham', 'anhs.link as link','gio_hangs.so_luong as so_luong')
                                ->join('chi_tiet_san_phams','gio_hangs.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                                ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                                ->join('anhs','anhs.san_phams_id','=','san_phams.id')
                                ->where('gio_hangs.tai_khoans_id',3)
                                ->where('gio_hangs.chi_tiet_san_phams_id',10)
                                ->where('anhs.anhchinh',1)
                                ->first();
            dd($arrays);
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
        $likes = YeuThich::where('tai_khoans_id', Auth::user()->id)
                                    ->with(array('sanPham' => function($query) {
                                                            $query->with(array('anh' => function($querys) {
                                                                                            $querys->where('anhchinh',1);
                                                                        }));
                                            }))->get();

        $dem_yeu_thich = YeuThich::where('tai_khoans_id',Auth::user()->id)->count();
        return view('pages.listlike', compact('likes','dem_yeu_thich'));
    }
    public function timkiem(Request $request)
    {
        $yeu_thich = YeuThich::select(array('san_phams_id',DB::raw('COUNT(id) as yeu_thich')))
                                ->groupBy('san_phams_id')
                                ->get();
        $danh_gia = DanhGia::select(array('san_phams_id',DB::raw('AVG(diem) as danh_gia')))
                                ->groupBy('san_phams_id')
                                ->get();
        $dsSanPhamSearch = SanPham::where('ten_san_pham','LIKE','%'.$request->search.'%')
                            ->with(array('anh' => function($query) {
                                $query->where('anhchinh',1);
                            }))
                            ->paginate(4);
        // $dsSanPhamSearch = ['dsSanPhamSearch'=>$timkiem];
        // return view('pages.search_view',$dsSanPhamSearch);
        if(Auth::check() and Auth::user()->admin != 1) {
            $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
            return view('pages.search_view', compact('yeu_thich','danh_gia','is_like','dsSanPhamSearch'));
        }
        else {
            return view('pages.search_view', compact('yeu_thich','danh_gia','dsSanPhamSearch'));
        }
    }
    public function headerLike() {
        $yeu_thich = YeuThich::select(array(DB::raw('COUNT(id) as yeu_thich')))
                                ->where('tai_khoans_id', Auth::user()->id)
                                ->first();
        echo $yeu_thich->yeu_thich;
    }
    public function headerCart() {
        if(Auth::check() and Auth::user()->admin != 1) {
            $gio_hang = GioHang::select(array(DB::raw('COUNT(id) as gio_hang')))
                                    ->where('tai_khoans_id', Auth::user()->id)
                                    ->first();
            echo $gio_hang->gio_hang;
        } else {
            $gio_hangs = Cart::content();
            $dem = 0;
            foreach($gio_hangs as $gio_hang) {
                $dem++;
            }
            echo $dem;
        }
    }
}