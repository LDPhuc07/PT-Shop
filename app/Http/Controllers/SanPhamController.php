<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\Anh;
use App\Slideshow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
        
        if($request->hasFile('anh')){// neu anh co ton
            $img = $request->anh;
            $dsSanPham->anh=$img->getClientOriginalName();
            $request->anh->move('img/product',$img->getClientOriginalName());
           
        }
        else
            {$dsSanPham->anh='noavartar.png';}

        $dsSanPham->gia_ban=$request->giaban;
        $dsSanPham->giam_gia=$request->giamgia;
        $dsSanPham->mo_ta=$request->mota;
        $dsSanPham->save();
        $SanPham_id = $dsSanPham->id;
        if(Input::hasFile('anhchitiet')){
            foreach(Input::file('anhchitiet') as $file) {
                if(isset($file)){
                    $anhsanpham = new Anh();
                    $anhsanpham->anhchitiet = $file->getClientOriginalName();


                    $count_anh = Anh::where('san_phams_id',$SanPham_id)
                    // ->whereNull('deleted_at')
                    ->get()->count();
                    //Oke
                    //add vô ko dung cung được mà
                    if($count_anh == 0 )
                    {
                        $anhsanpham->anhchinh = true; 
                    }
                    //lúc tạo lần đầu kiểm trả count san_phams_id == 0 luôn
                    //nếu chưa có ảnh là count  == 0 thì lấy ảnh đó làm ảnh chính
                    //còn nếu lớn hơn 0 thì đã có ảnh chính rồi thôi không kiểm tra nữa vì đã có ảnh chính rồi
                    //Không vậy là xong r
                    //ừm ừm
                    //ở dưới là sai trên đậy mới đúng
                    
                    $anhsanpham->san_phams_id = $SanPham_id;
                    $file->move('img/product-detail',$file->getClientOriginalName());
                    $anhsanpham->save();
                   // sao nos ra 5 anhr v   
                }
                
            }
        }
        // dd($anhsanpham);
        return redirect()->route('sanpham.indexAdmin')->with('success', 'Tạo thành công');
    }
    // public function create() {
    //     return view('admin.product.add_product');
    // }
    // public function getIndex() {
    //     // $array = ["arrays"=>SanPham::where('daxoa','=',0)->get()];
    //     $slides = Slideshow::whereNull('deleted_at');
    //     print_r($slides);
    //     exit;
    //     return view('pages.index',compact('slideshows'));
    // }
    public function hienThiTatCaSanPham() {
        $array = ["arrays"=>SanPham::where('trang_thai','=',1)->get()];
        return view('pages.product',$array);
    }
}
