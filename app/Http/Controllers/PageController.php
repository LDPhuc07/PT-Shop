<?php

namespace App\Http\Controllers;
use App\Slideshow;
use App\SanPham;
use App\Anh;
use App\ChiTietHoaDon;
use App\ChiTietSanPham;
use App\LoaiSanPham;
use App\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PageController extends Controller
{
    //
    public function tatcasanpham(){

        return view('pages.product');
        
    }
    public function index() {
        $slides = Slideshow::orderby('id', 'desc')->offset(0)->limit(3)->get();
        $sanphammoinhats= SanPham::orderby('id', 'desc') ->with(array('anh' => function($query) {
            $query->where('anhchinh',1);
        }))->offset(0)->limit(4)->get();

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
                                    
                                    
            // dd($sanphamphobiens);
        return view('pages.index', compact('slides','sanphammoinhats','sanphams','sanphamhots','sanphamphobiens'));
       
    }
    public function chitietsanpham(Request $request){
        $sanpham = SanPham::where('id',$request->id)->with(array('anh' => function($query) {
            $query->whereNotNull('link');
        }))->first();
        $anhchinh = SanPham::where('id',$request->id)->with(array('anh' => function($query) {
            $query->where('anhchinh',1);
        }))->first();
       
        $size = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$request->id)->distinct()->get();
        // dd($size);
        $color = ChiTietSanPham::select('mau')->where('san_phams_id',$request->id)->distinct()->get();
        $first_color = ChiTietSanPham::select('mau')->where('san_phams_id',$request->id)->first();
        $size_by_first_color = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$request->id)->where('mau',$first_color->mau)->distinct()->get();
        // sản phẩm liên quan lấy chung loại
        $sanphamlienquans = SanPham::where('loai_san_phams_id','=',$sanpham->loai_san_phams_id)->where('id','<>',$sanpham->id)->orderby('id', 'desc')->with('loaiSanPham') 
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->offset(0)->limit(4)->get();
        if(Auth::check() and Auth::user()->admin != 1) {
            $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
            return view('pages.product_detail',compact('sanpham','anhchinh','size','color','sanphamlienquans','first_color','size_by_first_color','is_like'));
        }
        else {
            return view('pages.product_detail',compact('sanpham','anhchinh','size','color','sanphamlienquans','first_color','size_by_first_color'));
        }
    }
    public function getSize($id, $mau) {
        $id_sp = $id;
        $mau_sp = $mau;
        $size = ChiTietSanPham::select('kich_thuoc')->where('san_phams_id',$id)->where('mau',$mau)->distinct()->get();
        return view('pages.get_size_ajax',compact('size','id_sp','mau_sp'));
    }
    public function getQty($id, $mau, $kichthuoc) {
        $qty = ChiTietSanPham::select('so_luong')->where('san_phams_id',$id)->where('mau',$mau)->where('kich_thuoc',$kichthuoc)->first();
        return view('pages.get_qty_ajax',compact('qty'));
    }
    
    
}
