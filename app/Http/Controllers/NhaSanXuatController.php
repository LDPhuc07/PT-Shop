<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaSanXuat;
use App\SanPham;
use Illuminate\Support\Facades\Validator;
class NhaSanXuatController extends Controller
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
        $timkiem = NhaSanXuat::paginate(4);
        // dd($dsMonTheThao);
        
        if(!empty($request->search))
        {
            $timkiem = NhaSanXuat::where('ten_nha_san_xuat','LIKE','%'.$request->search.'%')->paginate(4);
        }
        else
        {
            $timkiem = NhaSanXuat::paginate(4);
        }
        $dsNhaSanXuat = ['dsNhaSanXuat'=>$timkiem];
        return view('admin.producer.index',$dsNhaSanXuat); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.producer.add_producer');
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
            'tennhasanxuat' => 'required|unique:nha_san_xuats,ten_nha_san_xuat|max:50',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            'tennhasanxuat.required' => 'Bạn chưa nhập tên nhà sản xuất',
            'tennhasanxuat.max' => 'Tên nhà sản xuất không quá 50 ký tự',
            'tennhasanxuat.unique' => 'Đã có tên nhà sản xuất'
        ];
        $customName = [
            'tennhasanxuat' => 'Tên nhà sản xuất',
            
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);
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
        // if(empty($request->id))
        // {
        //     $dsNhaSanXuat_check = NhaSanXuat::whereNull('deleted_at')->where('ten_nha_san_xuat',$request->tennhasanxuat)->first();
        //     if(!empty($dsNhaSanXuat_check)){
        //         return redirect()->route('nhasanxuat.index')->with('error', 'Đã có tên nhà sản xuất');
        //     }
        // }
        $dsNhaSanXuat = new NhaSanXuat();
        $dsNhaSanXuat->ten_nha_san_xuat=$request->tennhasanxuat;
        $dsNhaSanXuat->save();
        
        // return redirect('admin.sport.index',$dsMonTheThao); 
        return response()->json(['success'=>'Thêm nhà sản xuất thành công']);
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
        $dsNhaSanXuat = ["dsNhaSanXuat"=>NhaSanXuat::find($id)];
        
        return view('admin.producer.edit_producer',$dsNhaSanXuat);
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
            'tennhasanxuat' => 'required|unique:nha_san_xuats,ten_nha_san_xuat|max:50',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            'tennhasanxuat.required' => 'Bạn chưa nhập tên nhà sản xuất',
            'tennhasanxuat.max' => 'Tên nhà sản xuất không quá 50 ký tự',
            'tennhasanxuat.unique' => 'Đã có tên nhà sản xuất'
        ];
        $customName = [
            'tennhasanxuat' => 'Tên nhà sản xuất',
            
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);
        }
        
        // if(!empty($request->id))
        // {
        //     $dsNhaSanXuat_check = NhaSanXuat::whereNull('deleted_at')->where('ten_nha_san_xuat',$request->tennhasanxuat)->first();
        //     if(!empty($dsNhaSanXuat_check)){
        //         return redirect()->route('nhasanxuat.index')->with('error', 'Đã có tên nhà sản xuất');
        //     }
        // }
        $dsNhaSanXuat = NhaSanXuat::find($id);
        $dsNhaSanXuat->ten_nha_san_xuat=$request->tennhasanxuat;
        $dsNhaSanXuat->save();
        return response()->json(['success'=>'Cập nhật nhà sản xuất thành công']);
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
                return redirect()->route('nhasanxuat.index')->with('error', 'không tìm thấy nhà sản xuất');
            // }
        }
        $dsNhaSanXuat = NhaSanXuat::find($id);
        $dsSanPham = SanPham::where('nha_san_xuats_id', '=', $id)->get();
        if(count($dsSanPham) != 0){
            return redirect()->route('nhasanxuat.index')->with('error', 'Nhà sản xuất đang được dùng không được xóa');
        }
        else {
            $dsNhaSanXuat->delete();
            return redirect()->route('nhasanxuat.index')->with('success', 'xóa nhà sản xuất thành công');
        }
       
    }
}
