<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\Anh;
use App\Slideshow;
use Illuminate\Support\Facades\Validator;
// use Input;
use Illuminate\Support\Facades\Input;
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
            'giaban' => 'required|numeric|digits_between:4,11',
            // 'description' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png|max:10000',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            'numeric' => ':attribute không hợp lệ',
            'digits_between' => ':attribute giá bán lớn hơn 1000 và nhỏ hơn 99999999999',
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
            $dsSanPham_check = SanPham::whereNull('deleted_at')->where('ten_san_pham',$request->tensanpham)->first();
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
        $dsSanPham->mo_ta=$request->mota;
        $dsSanPham->save();
        $SanPham_id = $dsSanPham->id;
        if(Input::hasFile('link')){
            foreach(Input::file('link') as $file) {
                if(isset($file)){
                    $anhsanpham = new Anh();
                    
                    
                    $count_anh = Anh::where('san_phams_id',$SanPham_id)
                    // ->whereNull('deleted_at')
                    ->get()->count();
                    if($count_anh == 0 )
                    {
                        $anhsanpham->anhchinh = true; 
                    }
                    $anhsanpham->san_phams_id = $SanPham_id;
                    $anhsanpham->save();
                    $anhcc = $file->getClientOriginalName();
                    $anhccc = pathinfo($anhcc,PATHINFO_FILENAME);
                    $anhsanpham->anhchitiet = $anhccc."_".$anhsanpham->id.".".$file->getClientOriginalExtension();
                    $anhsanpham->link = '/img/product/'.$anhsanpham->anhchitiet;
                    $file->move('img/product',$anhsanpham->anhchitiet);
                    $anhsanpham->save();
                }
                
            }
        }
        
         return redirect()->route('sanpham.indexAdmin')->with('success', 'Tạo thành công');
    }
    public function create() {
        return view('admin.product.add_product');
    }
    public function edit(Request $request, $id=''){
        if(empty($id)){
            return redirect()->route('sanpham.indexAdmin')->with('error','aaaaaaa');

        }
        $sanpham = SanPham::where('id',$id)->with(['nhaSanXuat','monTheThao','loaiSanPham','anh'])->first();
        if(empty($sanpham)){
            return redirect()->route('sanpham.indexAdmin')->with('error','bbbbb');
        }
        $dsSanPham = ['dsSanPham'=>$sanpham];
        // dd($dsSanPham);
        return view('admin.product.edit_product',$dsSanPham);

    }
    public function update(Request $request, $id){
        $rule = [
            'mota' => 'required',
            'giamgia' => 'numeric',
            // 'giaban' => 'numeric',
            'tensanpham' => 'required',
            'giaban' => 'required|numeric|digits_between:4,11',
            // 'description' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png|max:10000',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            'numeric' => ':attribute không hợp lệ',
            'digits_between' => ':attribute giá bán lớn hơn 1000 và nhỏ hơn 99999999999',
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
            $dsSanPham_check = SanPham::whereNull('deleted_at')->where('ten_san_pham',$request->tensanpham)->first();
            if(!empty($dsSanPham_check)){
                return redirect()->route('sanpham.indexAdmin')->with('error', 'Đã có tên sản phẩm');
            }
        }
        
        $files = $request->file('link');
        $file1 = $files[1]['file'];
        $file2 = $files[2]['file'];
        dd($file1);
        $dsSanPham = SanPham::find($id);
        $dsSanPham->ten_san_pham=$request->tensanpham;
        $dsSanPham->nha_san_xuats_id=$request->nhasanxuat;
        $dsSanPham->loai_san_phams_id=$request->loaisanpham;
        $dsSanPham->mon_the_thaos_id=$request->monthethao;
        $dsSanPham->gia_ban=$request->giaban;
        $dsSanPham->giam_gia=$request->giamgia;
        $dsSanPham->mo_ta=$request->mota;
        $dsSanPham->save();
        $SanPham_id = $dsSanPham->id;
  
        if(Input::hasFile('link')) {
            // dd($dsSanPham::file('link'));
            foreach(Input::file('link') as $file) {
                
                if(isset($file)){
                    $anhsanpham = new Anh();
                    $count_anh = Anh::where('san_phams_id',$SanPham_id)
                    // ->whereNull('deleted_at')
                    ->get()->count();
                    if($count_anh == 0 )
                    {
                        $anhsanpham->anhchinh = true; 
                    }
                    $anhsanpham->san_phams_id = $SanPham_id;
                    $anhsanpham->save();
                    $anhcc = $file->getClientOriginalName();
                    $anhccc = pathinfo($anhcc,PATHINFO_FILENAME);
                    $anhsanpham->anhchitiet = $anhccc."_".$anhsanpham->id.".".$file->getClientOriginalExtension();
                    $anhsanpham->link = '/img/product/'.$anhsanpham->anhchitiet;
                    // if(File::exists($image_path)) {
                    //     File::delete($image_path);
                    // }
                    $file->move('img/product',$anhsanpham->anhchitiet);
       
                    $anhsanpham->save();
                }
            }
        }
        //  return redirect()->route('sanpham.indexAdmin')->with('success', 'Cập nhật thành công');
    }
}
