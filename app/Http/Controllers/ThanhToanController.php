<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\SanPham;
use App\Anh;

class ThanhToanController extends Controller
{
    public function index() {
        return view('pages.pay');   
    }
    public function postindex(Request $request) {
        echo 'mua hang lien';
    }
}
