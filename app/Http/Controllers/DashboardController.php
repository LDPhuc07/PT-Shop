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
        $dem_khach_hang = TaiKhoan::where('admin',false)->count();
        $sub_30_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $dem_don_hang = HoaDon::where('trang_thai',true)->whereBetween('ngay_lap_hd',[$sub_30_days, $now])->count();
        $count_san_pham_max = DB::table('chi_tiet_hoa_dons')->join('chi_tiet_san_phams', 'chi_tiet_hoa_dons.chi_tiet_san_phams_id', '=', 'chi_tiet_san_phams.id')
                     ->select(array('chi_tiet_san_phams.san_phams_id',DB::raw('COUNT(chi_tiet_san_phams.san_phams_id) as san_pham_max')))->groupBy('chi_tiet_san_phams.san_phams_id')->orderBy('san_pham_max', 'DESC')->first();
        if($count_san_pham_max->san_phams_id == null) {
            $san_pham_max = null;
        } else {
            $san_pham_max = SanPham::find($count_san_pham_max->san_phams_id);
        }               
        return view('admin.dashboard.index',['dem_yeu_thich' => $dem_yeu_thich,'dem_khach_hang' => $dem_khach_hang,'dem_don_hang' => $dem_don_hang,'san_pham_max' => $san_pham_max]);
    }
    public function filterByDate(Request $request) {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = HoaDon::whereBetween('ngay_lap_hd',[$from_date, $to_date])->orderBy('ngay_lap_hd','ASC')->get();

        foreach($get as $key => $val) {
            
            $chart_data[] = array(
                'ngay_lap_hd' => Carbon::parse($val->ngay_lap_hd)->format('Y-m-d'),
                'tong_tien' => $val->tong_tien
            );
        }
        // dd($chart_data);
        echo $data = json_encode($chart_data);
    }
    public function filter(Request $request) {
        $data = $request->all();

        $dau_thang_nay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();


        $sub_7_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();
        $sub_365_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value'] == '7ngay') {
            $get = HoaDon::whereBetween('ngay_lap_hd',[$sub_7_days, $now])->orderBy('ngay_lap_hd','ASC')->get();
        }
        if($data['dashboard_value'] == 'thangtruoc') {
            $get = HoaDon::whereBetween('ngay_lap_hd',[$dau_thang_truoc, $cuoi_thang_truoc])->orderBy('ngay_lap_hd','ASC')->get();
        }
        if($data['dashboard_value'] == 'thangnay') {
            $get = HoaDon::whereBetween('ngay_lap_hd',[$dau_thang_nay, $now])->orderBy('ngay_lap_hd','ASC')->get();
        }
        if($data['dashboard_value'] == '365ngayqua') {
            $get = HoaDon::whereBetween('ngay_lap_hd',[$sub_365_days, $now])->orderBy('ngay_lap_hd','ASC')->get();
        }

        foreach($get as $key => $val) {
            
            $chart_data[] = array(
                'ngay_lap_hd' => Carbon::parse($val->ngay_lap_hd)->format('Y-m-d'),
                'tong_tien' => $val->tong_tien
            );
        }
        // dd($chart_data);
        echo $data = json_encode($chart_data);
    }
    public function filter30Days(Request $request) {
        $data = $request->all();

        $sub_30_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $get = HoaDon::whereBetween('ngay_lap_hd',[$sub_30_days, $now])->orderBy('ngay_lap_hd','ASC')->get();

        foreach($get as $key => $val) {
            
            $chart_data[] = array(
                'ngay_lap_hd' => Carbon::parse($val->ngay_lap_hd)->format('Y-m-d'),
                'tong_tien' => $val->tong_tien
            );
        }
        // dd($chart_data);
        echo $data = json_encode($chart_data);
    }
}
