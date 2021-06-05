<?php

namespace App\Http\Controllers;
use App\Slideshow;
use App\SanPham;
use App\Anh;
use App\ChiTietHoaDon;
use App\ChiTietSanPham;
use App\LoaiSanPham;
use Illuminate\Http\Request;
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
<<<<<<< HEAD
=======
                                    })) 
                                    ->whereIn('id',$ctsp)
                                    ->get();

        // $sanphamphobiens = SanPham::inRandomOrder() ->with(array('anh' => function($query) {
        //                     $query->where('anhchinh',1);
        //                 }))->offset(0)->limit(2)->get();
        // sản phẩm phổ biến đổ sản phẩm bán nhiều nhất  của web
        // dd($sanphamphobiens);
<<<<<<< HEAD
>>>>>>> parent of cc9a3d8 (Like_ThanhToanUpdate)
=======
>>>>>>> parent of cc9a3d8 (Like_ThanhToanUpdate)
=======
>>>>>>> parent of 5409a4e (new Like_ThanhToan)
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
        // sản phẩm liên quan lấy chung loại
        $sanphamlienquans = SanPham::where('loai_san_phams_id','=',$sanpham->loai_san_phams_id)->where('id','<>',$sanpham->id)->orderby('id', 'desc')->with('loaiSanPham') 
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->offset(0)->limit(4)->get();
        return view('pages.product_detail',compact('sanpham','anhchinh','size','color','sanphamlienquans'));
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    }
    public function menu(Request $request){
        
=======
>>>>>>> parent of cc9a3d8 (Like_ThanhToanUpdate)
=======
>>>>>>> parent of cc9a3d8 (Like_ThanhToanUpdate)
=======
    }
    public function menu(Request $request){
        
>>>>>>> parent of 5409a4e (new Like_ThanhToan)
    }
    
    
}
