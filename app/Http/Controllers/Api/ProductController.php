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
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listProduct(Request $request ) {
        $idlsp = $request->idlsp;
        $idmtt = $request->idmtt;
        $priceFrom = $request->priceFrom;
        $priceTo = $request->priceTo;
        $dataSortFrom = $request->dataSortFrom;
        $dataSortTo = $request->dataSortTo;
        $tradeMark = $request->tradeMark;
        $arrayThuongHieu = $request->arrayThuongHieu;
        $page = $request->page;

        $query = SanPham::whereNull('deleted_at');
        if(!empty($idlsp)){
            $query->where('loai_san_phams_id',$idlsp);
        }
        if(!empty($idmtt)){
            $query->where('mon_the_thaos_id',$idmtt);
        }
        if(!empty($priceTo)) {
            $query->whereBetween('gia_ban',[$priceFrom, $priceTo]);
        }
        if(!empty($arrayThuongHieu)) {
            $query->whereHas('nhaSanXuat', function($query) use ($arrayThuongHieu){
                $query->whereIn('id',$arrayThuongHieu);
            });
        }
        if(!empty($dataSortFrom)) {
            $query->orderBy($dataSortFrom, $dataSortTo);
        }
        $data = $query->offset($page*8)
        ->limit(8)
        ->with(array('anh' => function($query) {
            $query->where('anhchinh',1);
        }))->get();
        // if(!empty($idlsp)){
        //     if(!empty($idmtt)){
        //         if(!empty($priceFrom))
        //         {
        //             if(!empty($arrayThuongHieu))
        //             {
        //                 if(!empty($dataSortFrom))
        //                 {
        //                     // có 3 value
        //                     $data = SanPham::whereNull('deleted_at')
        //                             ->where([
        //                                 ['loai_san_phams_id',$idlsp],
        //                                 ['mon_the_thaos_id',$idmtt],
        //                                 ])
        //                             ->whereBetween('gia_ban',[$priceFrom, $priceTo])
        //                             ->whereHas('nhaSanXuat', function($query) use ($arrayThuongHieu){
        //                                 $query->whereIn('id',$arrayThuongHieu);
        //                             })
        //                             ->orderBy($dataSortFrom, $dataSortTo)
        //                             ->offset($page*8)
        //                             ->limit(8)
        //                             ->with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             }))->get();
        //                 }
        //                 else
        //                 {
        //                     // value xs k có 2 cái còn lại có
        //                     $data = SanPham::whereNull('deleted_at')
        //                             ->where([
        //                                 ['loai_san_phams_id',$idlsp],
        //                                 ['mon_the_thaos_id',$idmtt],
        //                                 ])
        //                             ->whereBetween('gia_ban',[$priceFrom, $priceTo])
        //                             ->whereHas('nhaSanXuat', function($query) use ($arrayThuongHieu){
        //                                 $query->whereIn('id',$arrayThuongHieu);
        //                             })
        //                             ->offset($page*8)
        //                             ->limit(8)
        //                             ->with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             }))->get();
        //                 }
        //             }
        //             else
        //             {
        //                 if(!empty($request->idxs))
        //                 {
        //                     // thương hiệu k có 2 cái còn lại có
        //                     $data = SanPham::whereNull('deleted_at')
        //                             ->where([
        //                                 ['loai_san_phams_id',$idlsp],
        //                                 ['mon_the_thaos_id',$idmtt],
        //                                 ])
        //                             ->whereBetween('gia_ban',[$priceFrom, $priceTo])
        //                             ->orderBy($dataSortFrom, $dataSortTo)
        //                             ->offset($page*8)
        //                             ->limit(8)
        //                             ->with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             }))->get();
        //                 }
        //                 else
        //                 {
        //                     // thương hiệu và sx k có cái còn lại có
        //                     $data = SanPham::whereNull('deleted_at')
        //                             ->where([
        //                                 ['loai_san_phams_id',$idlsp],
        //                                 ['mon_the_thaos_id',$idmtt],
        //                                 ])
        //                             ->whereBetween('gia_ban',[$priceFrom, $priceTo])
        //                             ->offset($page*8)
        //                             ->limit(8)
        //                             ->with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             }))->get();
        //                 }
        //             }
        //         }
        //         else
        //         {
        //             if(!empty($request->idth))
        //             {
        //                 if(!empty($request->idxs))
        //                 {
        //                     // khoảng giá k có 2 cái còn lại có
        //                     $data = SanPham::whereNull('deleted_at')
        //                             ->where([
        //                                 ['loai_san_phams_id',$idlsp],
        //                                 ['mon_the_thaos_id',$idmtt],
        //                                 ])
        //                             ->whereHas('nhaSanXuat', function($query) use ($arrayThuongHieu){
        //                                 $query->whereIn('id',$arrayThuongHieu);
        //                             })
        //                             ->orderBy($dataSortFrom, $dataSortTo)
        //                             ->offset($page*8)
        //                             ->limit(8)
        //                             ->with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             }))->get();
        //                 }
        //                 else
        //                 {
        //                     // khoảng giá với sx k có thương hiệu có
        //                     $data = SanPham::whereNull('deleted_at')
        //                             ->where([
        //                                 ['loai_san_phams_id',$idlsp],
        //                                 ['mon_the_thaos_id',$idmtt],
        //                                 ])
        //                             ->whereHas('nhaSanXuat', function($query) use ($arrayThuongHieu){
        //                                 $query->whereIn('id',$arrayThuongHieu);
        //                             })
        //                             ->offset($page*8)
        //                             ->limit(8)
        //                             ->with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             }))->get();
        //                 }
        //             }
        //             else
        //             {
        //                 if(!empty($request->idxs))
        //                 {
        //                     // sắp xếp có 2 cái còn lại k có
        //                     $data = SanPham::whereNull('deleted_at')
        //                             ->where([
        //                                 ['loai_san_phams_id',$idlsp],
        //                                 ['mon_the_thaos_id',$idmtt],
        //                                 ])
        //                             ->orderBy($dataSortFrom, $dataSortTo)
        //                             ->offset($page*8)
        //                             ->limit(8)
        //                             ->with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             }))->get();
        //                 }
        //                 else
        //                 {
        //                     // 3 cái đều k có
        //                     $data = SanPham::whereNull('deleted_at')
        //                             ->where([
        //                                 ['loai_san_phams_id',$idlsp],
        //                                 ['mon_the_thaos_id',$idmtt],
        //                                 ])
        //                             ->offset($page*8)
        //                             ->limit(8)
        //                             ->with(array('anh' => function($query) {
        //                                 $query->where('anhchinh',1);
        //                             }))->get();
        //                 }
        //             }
        //         }
                
        //     }
        //     else
        //     {
        //         $data = SanPham::whereNull('deleted_at')
        //                 ->where('loai_san_phams_id',$idlsp)
        //                 ->orderBy('id','asc')
        //                 ->offset($request->page*8)
        //                 ->limit(8)
        //                 ->with(array('anh' => function($query) {
        //                     $query->where('anhchinh',1);
        //                 }))->get();
        //     }
        // }
        // else
        // {
        //     $data = SanPham::whereNull('deleted_at')
        //             ->offset($request->page*8)
        //             ->limit(8)
        //             ->with(array('anh' => function($query) {
        //                 $query->where('anhchinh',1);
        //             }))->get();
        // }

        return $data;
    }
    public function index(Request $request)
    {
        // dd($request->idmtt);
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
                //  dd($request->idmtt);
                $data = SanPham::whereNull('deleted_at')
                        // ->where('loai_san_phams_id',$request->idlsp)
                        ->where([
                            ['loai_san_phams_id',$request->idlsp],
                            ['mon_the_thaos_id',$request->idmtt],
                            ])
                        // ->where('mon_the_thaos_id ',$request->idmtt)    
                        ->orderBy('id','asc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('id','asc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('id','asc')
                    ->offset($request->page*8)
                    ->limit(8)
                    ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                    }))->get();
        }
        
        return $data;
    }
    public function sanphammoi(Request $request){
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
                //  dd($request->idmtt);
                $data = SanPham::whereNull('deleted_at')
                        // ->where('loai_san_phams_id',$request->idlsp)
                        ->where([
                            ['loai_san_phams_id',$request->idlsp],
                            ['mon_the_thaos_id',$request->idmtt],
                            ])
                        // ->where('mon_the_thaos_id ',$request->idmtt)    
                        ->orderBy('id','desc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
                        dd($data);
            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('id','desc')
                                ->offset($request->page*8)
                                ->limit(8)
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                                ->orderBy('id','desc')
                                ->offset($request->page*8)
                                ->limit(8)
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->get();
        }
        
        return $data;
    }
    public function sanphamcu(Request $request)
    {
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
                //  dd($request->idmtt);
                $data = SanPham::whereNull('deleted_at')
                        // ->where('loai_san_phams_id',$request->idlsp)
                        ->where([
                            ['loai_san_phams_id',$request->idlsp],
                            ['mon_the_thaos_id',$request->idmtt],
                            ])
                        // ->where('mon_the_thaos_id ',$request->idmtt)    
                        ->orderBy('id','asc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('id','asc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('id','asc')
                    ->offset($request->page*8)
                    ->limit(8)
                    ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                    }))->get();
        }
        

        return $data;
    }
    // public function menu(Request $request, $a, $b){
    //     $data = SanPham::whereNull('deleted_at')
    //                     ->orderBy('id','asc')
    // }
    public function giatangdan(Request $request)
    {
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
                //  dd($request->idmtt);
                $data = SanPham::whereNull('deleted_at')
                        // ->where('loai_san_phams_id',$request->idlsp)
                        ->where([
                            ['loai_san_phams_id',$request->idlsp],
                            ['mon_the_thaos_id',$request->idmtt],
                            ])
                        // ->where('mon_the_thaos_id ',$request->idmtt)    
                        ->orderBy('gia_ban','asc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('gia_ban','asc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('gia_ban','asc')
                    ->offset($request->page*8)
                    ->limit(8)
                    ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                    }))->get();
        }
        return $data;
    }
    public function giagiamdan(Request $request)
    {
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
                //  dd($request->idmtt);
                $data = SanPham::whereNull('deleted_at')
                        // ->where('loai_san_phams_id',$request->idlsp)
                        ->where([
                            ['loai_san_phams_id',$request->idlsp],
                            ['mon_the_thaos_id',$request->idmtt],
                            ])
                        // ->where('mon_the_thaos_id ',$request->idmtt)    
                        ->orderBy('gia_ban','desc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('gia_ban','desc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('gia_ban','desc')
                    ->offset($request->page*8)
                    ->limit(8)
                    ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                    }))->get();
        }
        

        return $data;
    }
    public function tenbatdau(Request $request)
    {
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
                //  dd($request->idmtt);
                $data = SanPham::whereNull('deleted_at')
                        // ->where('loai_san_phams_id',$request->idlsp)
                        ->where([
                            ['loai_san_phams_id',$request->idlsp],
                            ['mon_the_thaos_id',$request->idmtt],
                            ])
                        // ->where('mon_the_thaos_id ',$request->idmtt)    
                        ->orderBy('ten_san_pham','asc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('ten_san_pham','asc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('ten_san_pham','asc')
                    ->offset($request->page*8)
                    ->limit(8)
                    ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                    }))->get();
        }
        

        return $data;
    }
    public function tenketthuc(Request $request)
    {
        
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
                //  dd($request->idmtt);
                $data = SanPham::whereNull('deleted_at')
                        // ->where('loai_san_phams_id',$request->idlsp)
                        ->where([
                            ['loai_san_phams_id',$request->idlsp],
                            ['mon_the_thaos_id',$request->idmtt],
                            ])
                        // ->where('mon_the_thaos_id ',$request->idmtt)    
                        ->orderBy('ten_san_pham','desc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('ten_san_pham','desc')
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('ten_san_pham','desc')
                    ->offset($request->page*8)
                    ->limit(8)
                    ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                    }))->get();
        }
        

        return $data;
    }
    public function khoanggia(Request $request){
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
           
                $data = SanPham::whereNull('deleted_at')
                        ->where([
                            ['loai_san_phams_id',$request->idlsp],
                            ['mon_the_thaos_id',$request->idmtt],
                            ]) 
                        ->whereBetween('gia_ban',[$request->priceFrom, $request->priceTo])
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                        }))->get();
            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->whereBetween('gia_ban',[$request->priceFrom, $request->priceTo])
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                        ->whereBetween('gia_ban',[$request->priceFrom, $request->priceTo])
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                        }))->get();
        }
        return $data;

    }
    public function thuonghieu(Request $request)
    {
        $tradeMark = $request->tradeMark;
        $arrayThuongHieu = $request->arrayThuongHieu;
        
        
        if(!empty($request->idlsp)){
            if(!empty($request->idmtt)){
           
                $data = SanPham::whereNull('deleted_at')
                            ->where([
                                ['loai_san_phams_id',$request->idlsp],
                                ['mon_the_thaos_id',$request->idmtt],
                            ]) 
                            ->whereHas('nhaSanXuat', function($query) use ($arrayThuongHieu){
                                $query->whereIn('id',$arrayThuongHieu);
                            })
                            ->offset($request->page*8)
                            ->limit(8)
                            ->with(array('anh' => function($query) {
                                $query->where('anhchinh',1);
                            }))->get();
            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->whereHas('nhaSanXuat', function($query) use ($arrayThuongHieu){
                            $query->whereIn('id',$arrayThuongHieu);
                        })
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                            ->whereHas('nhaSanXuat', function($query) use ($arrayThuongHieu){
                                $query->whereIn('id',$arrayThuongHieu);
                            })
                            ->offset($request->page*8)
                            ->limit(8)
                            ->with(array('anh' => function($query) {
                                $query->where('anhchinh',1);
                            }))->get();
        }
        
        return $data;
    }
    public function kichthuoc(Request $request)
    {
        $key = $request->kichthuoc;
     
        $data = SanPham::whereNull('deleted_at')
                        ->whereHas('chiTietSanPham', function($query) use ($key) {
                            $query->where('kich_thuoc',$key);
                        })
                        ->offset($request->page*8)
                        ->limit(8)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
        return $data;
    }
    public function search(Request $request)
    {
        
        // $yeu_thich = YeuThich::select(array('san_phams_id',DB::raw('COUNT(id) as yeu_thich')))
        //                         ->groupBy('san_phams_id')
        //                         ->get();
        // $danh_gia = DanhGia::select(array('san_phams_id',DB::raw('AVG(diem) as danh_gia')))
        //                         ->groupBy('san_phams_id')
        //                         ->get();
        $data = SanPham::where('ten_san_pham','LIKE','%'.$request->key_search.'%')
                            ->offset($request->page*8)
                            ->limit(8)
                            ->with(array('anh' => function($query) {
                                $query->where('anhchinh',1);
                            }))
                            ->get();              
        
        // if(Auth::check() and Auth::user()->admin != 1) {
        //     $is_like = YeuThich::where('tai_khoans_id',Auth::user()->id)->get();
        //     return view('pages.search_view', compact('yeu_thich','danh_gia','is_like','dsSanPhamSearch'));
        // }
        // else {
        //     return view('pages.search_view', compact('yeu_thich','danh_gia','dsSanPhamSearch'));
        // }
        return $data;           
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
