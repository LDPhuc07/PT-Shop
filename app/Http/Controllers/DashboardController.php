<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard.index');
    }
    public function filterByDate(Request $request) {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = HoaDon::whereBetween('ngay_lap_hd',[$from_date, $to_date])->
    }
}
