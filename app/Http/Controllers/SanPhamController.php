<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function indexAdmin() {
        return view('admin.product.index');
    }

    public function create() {
        return view('admin.product.add_product');
    }
    public function index() {
        return view('pages.index');
    }
}
