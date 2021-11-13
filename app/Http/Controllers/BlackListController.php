<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhSachHanChe;

class BlackListController extends Controller
{
    public function index() {
      $arrays = DanhSachHanChe::all();
      return view('admin.blacklist.index', compact('arrays'));
    }
}
