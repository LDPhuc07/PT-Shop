<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use Illuminate\Support\Facades\Validator;
class SanPhamController extends Controller
{
    public function indexAdmin(Request $request) {
        $dsSanPham = [
            'dsSanPham'=>SanPham::with(['nhaSanXuat','monTheThao','loaiSanPham','anh'])->paginate(4)
        ];
        // dd($dsSanPham['dsSanPham']);    
        return view('admin.product.index',$dsSanPham);
    }
    public function storeAdmin(Request $request) {
        $rule = [
            'mota' => 'required',
            'giamgia' => 'required|numeric',
            // 'giaban' => 'numeric',
            'tensanpham' => 'required',
            'giaban' => 'required|numeric|digits_between:1,3',
            // 'description' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png|max:10000',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            'numeric' => ':attribute không hợp lệ',
            'digits_between' => ':attribute giá bán lớn hơn 1 và nhỏ hơn 100',
            // 'mimes'=>'The :attribute must be .jpg,.png,.jpeg',
            // 'max'=> 'The :attribute must be less than :max',
            'tensanpham.required' => 'Bạn chưa nhập tên sản phẩm',
            'giaban.required' => 'Bạn chưa nhập giá bán',
            'mota.required' => 'Bạn chưa nhập mô tả',
            'giamgia.required' => 'Bạn chưa nhập giảm giá',
        ];
        $customName = [
            'tensanpham' => 'Tên sản phẩm',
            'giaban' => 'Giá bán',
            'mota' => 'Mô tả',
            'giamgia' => 'Giảm giá',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        if(empty($request->id))
        {
            $dsSanPham_check = LoaiSanPham::whereNull('deleted_at')->where('ten_san_pham',$request->tensanpham)->first();
            if(!empty($dsSanPham_check)){
                return redirect()->route('sanpham.indexAdmin')->with('error', 'Đã có tên sản phẩm');
            }
        }
        $dsSanPham = new SanPham();
        $dsSanPham->ten_san_pham=$request->tensanpham;
        $dsSanPham->nha_san_xuats_id=$request->nhasanxuat;
        $dsSanPham->loai_san_phams_id=$request->loaisanpham;
        $dsSanPham->mon_the_thaos_id=$request->monthethao;
        $dsSanPham->gia_ban=$request->giaban;
        $dsSanPham->giam_gia=$request->giamgia;
        $dsSanPham->save();
        return redirect()->route('sanpham.indexAdmin')->with('success', 'Tạo thành công');
    }
    public function create() {
        return view('admin.product.add_product');
    }
    public function index() {
        // $array = ["arrays"=>SanPham::where('daxoa','=',0)->get()];
        return view('pages.index');
    }
    public function hienThiTatCaSanPham() {
        $array = ["arrays"=>SanPham::where('trang_thai','=',1)->get()];
        return view('pages.product',$array);
    }
}
