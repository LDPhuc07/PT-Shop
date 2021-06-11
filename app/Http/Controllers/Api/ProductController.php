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
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('id','asc')
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('id','asc')
                    ->offset($request->page*4)
                    ->limit(4)
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
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('id','desc')
                                ->offset($request->page*4)
                                ->limit(4)
                                ->with(array('anh' => function($query) {
                                    $query->where('anhchinh',1);
                                }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                                ->orderBy('id','desc')
                                ->offset($request->page*4)
                                ->limit(4)
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
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('id','asc')
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('id','asc')
                    ->offset($request->page*4)
                    ->limit(4)
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
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('gia_ban','asc')
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('gia_ban','asc')
                    ->offset($request->page*4)
                    ->limit(4)
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
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('gia_ban','desc')
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('gia_ban','desc')
                    ->offset($request->page*4)
                    ->limit(4)
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
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('ten_san_pham','asc')
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('ten_san_pham','asc')
                    ->offset($request->page*4)
                    ->limit(4)
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
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();

            }
            else
            {
                $data = SanPham::whereNull('deleted_at')
                        ->where('loai_san_phams_id',$request->idlsp)
                        ->orderBy('ten_san_pham','desc')
                        ->offset($request->page*4)
                        ->limit(4)
                        ->with(array('anh' => function($query) {
                            $query->where('anhchinh',1);
                        }))->get();
            }
        }
        else{
            $data = SanPham::whereNull('deleted_at')
                    ->orderBy('ten_san_pham','desc')
                    ->offset($request->page*4)
                    ->limit(4)
                    ->with(array('anh' => function($query) {
                        $query->where('anhchinh',1);
                    }))->get();
        }
        

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
