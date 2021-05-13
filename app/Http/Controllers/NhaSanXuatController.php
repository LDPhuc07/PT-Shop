<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhaSanXuatController extends Controller
{
    public function index() {
        return view('admin.producer.index');
    }
}
