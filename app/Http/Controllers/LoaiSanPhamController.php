<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;
use Illuminate\Support\Facades\Validator;
class LoaiSanPhamController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // //
        $timkiem = LoaiSanPham::paginate(4);
        // dd($dsMonTheThao);
        
        if(!empty($request->search))
        {
            $timkiem = LoaiSanPham::where('ten_loai_san_pham','LIKE','%'.$request->search.'%')->paginate(4);
        }
        else
        {
            $timkiem = LoaiSanPham::paginate(4);
        }
        $dsLoaiSanPham = ['dsLoaiSanPham'=>$timkiem];
        return view('admin.product_type.index',$dsLoaiSanPham); 
        // $dsLoaiSanPham = ['dsLoaiSanPham'=>LoaiSanPham::paginate(4)];
        // return view('admin.product_type.index',$dsLoaiSanPham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product_type.add_product-type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rule = [
            'tenloaisanpham' => 'required',
            // 'category' => 'numeric',
            // 'price' => 'required|numeric|digits_between:4,11',
            // 'description' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png|max:10000',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            // 'numeric' => 'The :attribute is invalid',
            // 'digits_between' => 'The :attribute must be more than 1000 and less than 99999999999',
            // 'mimes'=>'The :attribute must be .jpg,.png,.jpeg',
            // 'max'=> 'The :attribute must be less than :max',
            'tenloaisanpham.required' => 'Bạn chưa nhập tên loại sản phẩm',
        ];
        $customName = [
            'tenloaisanpham' => 'Tên loại sản phẩm',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
      
        // $count =sizeof(MonTheThao::all());
        // if($count%4!=0)
        // {
        //     $count = floor( $count/4);
        //     $count+=1;
        // }
        // else
        //     $count/=4;
        
        // return redirect('/monthethao);
        // dd($request->tenthethao);
        if(empty($request->id))
        {
            $dsLoaiSanPham_check = LoaiSanPham::whereNull('deleted_at')->where('ten_loai_san_pham',$request->tenloaisanpham)->first();
            if(!empty($dsLoaiSanPham_check)){
                return redirect()->route('loaisanpham.index')->with('error', 'Đã có tên loại sản phẩm');
            }
        }
        $dsLoaiSanPham = new LoaiSanPham();
        $dsLoaiSanPham->ten_loai_san_pham=$request->tenloaisanpham;
        $dsLoaiSanPham->save();
        
        // return redirect('admin.sport.index',$dsMonTheThao); 
        return redirect()->route('loaisanpham.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dsLoaiSanPham = ["dsLoaiSanPham"=>LoaiSanPham::find($id)];
        
        return view('admin.product_type.edit_product-type',$dsLoaiSanPham);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rule = [
            'tenloaisanpham' => 'required',
            // 'category' => 'numeric',
            // 'price' => 'required|numeric|digits_between:4,11',
            // 'description' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png|max:10000',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            // 'numeric' => 'The :attribute is invalid',
            // 'digits_between' => 'The :attribute must be more than 1000 and less than 99999999999',
            // 'mimes'=>'The :attribute must be .jpg,.png,.jpeg',
            // 'max'=> 'The :attribute must be less than :max',
            'tenloaisanpham.required' => 'Bạn chưa nhập tên loại sản phẩm',
        ];
        $customName = [
            'tenloaisanpham' => 'Tên loại sản phẩm',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        
        if(empty($request->id))
        {
            $dsLoaiSanPham_check = LoaiSanPham::whereNull('deleted_at')->where('ten_loai_san_pham',$request->tenloaisanpham)->first();
            if(!empty($dsLoaiSanPham_check)){
                return redirect()->route('loaisanpham.index')->with('error', 'Đã có tên loại sản phẩm');
            }
        }
        $dsLoaiSanPham = LoaiSanPham::find($id);
        $dsLoaiSanPham->ten_loai_san_pham=$request->tenloaisanpham;
        $dsLoaiSanPham->save();
        
        // return redirect('admin.sport.index',$dsMonTheThao); 
        return redirect()->route('loaisanpham.index')->with('success', 'Cập nhật loại sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        if(empty($id))
        {
            // $dsMonTheThao_check = MonTheThao::whereNull('deleted_at')->where('ten_the_thao',$request->tenthethao)->first();
            // if(!empty($dsMonTheThao_check)){
                return redirect()->route('loaisanpham.index')->with('error', 'không tìm thấy loại sản phẩm');
            // }
        }
        $dsLoaiSanPham = LoaiSanPham::find($id);
        $dsLoaiSanPham->delete();
        return redirect()->route('loaisanpham.index')->with('success', 'xóa loại sản phẩm thành công');
    }
    // public function search(Request $request)
    // {
    //     $search_text = $_GET['query'];
    //     $dsLoaiSanPham =["dsLoaiSanPham"=>LoaiSanPham::where('ten_loai_san_pham','LIKE','%'.$search_text.'%')->paginate(4)];
    //     return view('admin.product_type.index',$dsLoaiSanPham);
    // }
}
