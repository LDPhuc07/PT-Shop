<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhSachHanChe;

class BlackListController extends Controller
{
    public function index() {
      $arrays = DanhSachHanChe::paginate(5);
      return view('admin.blacklist.index', compact('arrays'));
    }
    public function search(Request $request) {
      if(empty($request->search)) {
        return redirect()->route('admin.blacklist.index');
      } else {
        $arrays = DanhSachHanChe::where('so_dien_thoai',$request->search)->paginate(5);
        return view('admin.blacklist.index', compact('arrays'));
      }
    }
    public function unLock($id) {
      $delete = DanhSachHanChe::destroy($id);
      $check = DanhSachHanChe::first();
      if(empty($check->id)) {
        return "empty";
      }
      return "have";
    }
}
