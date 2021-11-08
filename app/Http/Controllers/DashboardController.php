<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;
use Carbon\Carbon;
use App\YeuThich;
use App\TaiKhoan;
use App\ChiTietSanPham;
use App\SanPham;
use App\ChiTietHoaDon;
use DB;

class DashboardController extends Controller
{
    public function index() {
        $dem_yeu_thich = YeuThich::count();
        $dem_khach_hang = TaiKhoan::where('admin',false)->where('trang_thai', true)->count();
        $sub_30_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $dem_don_hang = HoaDon::where('trang_thai',true)->whereBetween('ngay_lap_hd',[$sub_30_days, $now])->count();
        $count_san_pham_max = DB::table('chi_tiet_hoa_dons')->join('chi_tiet_san_phams', 'chi_tiet_hoa_dons.chi_tiet_san_phams_id', '=', 'chi_tiet_san_phams.id')
                            ->join('hoa_dons', 'chi_tiet_hoa_dons.hoa_dons_id', '=', 'hoa_dons.id')
                            ->select(array('chi_tiet_san_phams.san_phams_id',DB::raw('SUM(chi_tiet_san_phams.san_phams_id) as san_pham_max')))->where('hoa_dons.trang_thai', true)->groupBy('chi_tiet_san_phams.san_phams_id')->orderBy('san_pham_max', 'DESC')->limit(1)->first();
        if(empty($count_san_pham_max)) {
            $san_pham_max = null;
        } else {
            $san_pham_max = SanPham::find($count_san_pham_max->san_phams_id);
        }               
        return view('admin.dashboard.index',['dem_yeu_thich' => $dem_yeu_thich,'dem_khach_hang' => $dem_khach_hang,'dem_don_hang' => $dem_don_hang,'san_pham_max' => $san_pham_max]);
    }

    public function filterByDate(Request $request) {
        if($request->dashboard_value != "ko") {
            $dau_thang_nay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
            $dau_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
            $cuoi_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();


            $sub_7_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();
            $sub_365_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();

            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            if($request->dashboard_value == '7ngay') {
                $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->whereBetween('hoa_dons.ngay_lap_hd',[$sub_7_days, $now])
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
                
            }
            if($request->dashboard_value == 'thangtruoc') {
                $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->whereBetween('hoa_dons.ngay_lap_hd',[$dau_thang_truoc, $cuoi_thang_truoc])
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
                
            }
            if($request->dashboard_value == 'thangnay') {
                $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->whereBetween('hoa_dons.ngay_lap_hd',[$dau_thang_nay, $now])
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
                
            }
            if($request->dashboard_value == '365ngayqua') {
                $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->whereBetween('hoa_dons.ngay_lap_hd',[$sub_365_days, $now])
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
                
            }
        } else {
            if(!empty($request->from_date)) {
                if(!empty($request->to_date)) {
                    $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->whereBetween('hoa_dons.ngay_lap_hd',[$request->from_date, $request->to_date])
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
                } else {
                    $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->whereDate('hoa_dons.ngay_lap_hd','>=',$request->from_date)
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
                }
            } else {
                if(!empty($request->to_date)) {
                    $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->whereDate('hoa_dons.ngay_lap_hd','<=',$request->to_date)
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
                } else {
                    $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
                }
            }
        }

        foreach($get as $key => $val) {
            
            $chart_data[] = array(
                'ngay_lap_hoadon' => Carbon::parse($val->ngay_lap_hoadon)->format('Y-m-d'),
                'loi_nhuan' => $val->loi_nhuan
            );
        }
        // dd($chart_data);
        echo $data = json_encode($chart_data);
    }
    public function filter30Days() {

        $sub_30_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        // $get = HoaDon::whereBetween('ngay_lap_hd',[$sub_30_days, $now])->orderBy('ngay_lap_hd','ASC')->get();
        $get = DB::table('hoa_dons')
                    ->select(DB::raw('DATE(hoa_dons.ngay_lap_hd) AS ngay_lap_hoadon'),DB::raw('SUM(hoa_dons.loi_nhuan) AS loi_nhuan'))
                    ->where('hoa_dons.trang_thai',true)
                    ->whereBetween('hoa_dons.ngay_lap_hd',[$sub_30_days, $now])
                    ->groupBy('ngay_lap_hoadon')
                    ->get();
        foreach($get as $key => $val) {
            
            $chart_data[] = array(
                'ngay_lap_hoadon' => Carbon::parse($val->ngay_lap_hoadon)->format('Y-m-d'),
                'loi_nhuan' => $val->loi_nhuan
            );
        }
        // dd($chart_data);
        echo $data = json_encode($chart_data);
    }
}
