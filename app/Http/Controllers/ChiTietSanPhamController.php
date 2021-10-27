<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiTietSanPham;
use App\SanPham;
use Illuminate\Support\Facades\Validator;
class ChiTietSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        //
        if($request->search != null)
        {
            $timkiem = ChiTietSanPham::where('san_phams_id',$id)->with('sanPham')
                                        ->where('mau','LIKE','%'.$request->search.'%')
                                        ->orWhere('kich_thuoc','LIKE','%'.$request->search.'%')  
                                        ->orWhere('so_luong',$request->search)
                                        ->paginate(4);
                                        // dd($timkiem);
        }
        else
        {
            $timkiem = ChiTietSanPham::where('san_phams_id',$id)->with('sanPham')->paginate(4);
            // dd($timkiem);
        }
        // ["dsMonTheThao"=>MonTheThao::find($id)]
        $dsChiTietSanPham = [
            'dsChiTietSanPham'=>$timkiem,
            'id'=>$id
        ];
        // dd($dsChiTietSanPham['dsChiTietSanPham'][0]->sanPham->id);
        return view('admin.product.product_detail',$dsChiTietSanPham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        //
        $data = [
            'id'=>$id
        ];
        return view('admin.product.add_product_detail',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $rule = [
            'mau' => 'required|max:20',
            'kichthuoc'=>'required|max:10',
            'soluong'=>'required|numeric',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            'numeric' => ':attribute không hợp lệ',
            'mau.required' => 'Bạn chưa nhập màu',
            'mau.max' => 'Màu không quá 20 ký tự',
            'kichthuoc.required' => 'Bạn chưa nhập kích thước',
            'kichthuoc.max' => 'Kích thước không quá 10 ký tự',
            'soluong.required' => 'Bạn chưa nhập số lượng', 
        ];
        $customName = [
            'mau' => 'Màu',
            'kichthuoc' => 'Kích thước',
            'soluong' => 'Số lượng',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        $dsChiTietSanPham = new ChiTietSanPham();
        $dsChiTietSanPham->san_phams_id=$id;
        $dsChiTietSanPham->mau=$request->mau;
        $dsChiTietSanPham->kich_thuoc=$request->kichthuoc;
        $dsChiTietSanPham->so_luong=$request->soluong;
        if(!empty($id))
        {
            $dsChiTietSanPham_check = ChiTietSanPham::where('san_phams_id',$id)->where('mau',$request->mau)->where('kich_thuoc',$request->kichthuoc)->first();
            if(!empty($dsChiTietSanPham_check)){
                return redirect()->route('chitietsanpham.index',['id' =>$id])->with('error', 'Đã có chi tiết sản phẩm');
            }
        }
        $dsChiTietSanPham->save();
        return redirect()->route('chitietsanpham.index',['id' =>$id])->with('success', 'Thêm chi tiết sản phẩm mới thành công');
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
    public function edit(Request $request,$id,$idct)
    {
        // id của sản phẩm
        $data = [
            'id'=>$id,
            'dsChiTietSanPham'=>ChiTietSanPham::find($idct),
        ];
        // id chi tiet sản phẩm

        return view('admin.product.edit_detail_product',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$idct)
    {
        //
        $rule = [
            'mau' => 'required|max:20',
            'kichthuoc'=>'required|max:10',
            'soluong'=>'required|numeric',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            'numeric' => ':attribute không hợp lệ',
            'mau.required' => 'Bạn chưa nhập màu',
            'mau.max' => 'Màu không quá 20 ký tự',
            'kichthuoc.required' => 'Bạn chưa nhập kích thước',
            'kichthuoc.max' => 'Kích thước không quá 10 ký tự',
            'soluong.required' => 'Bạn chưa nhập số lượng', 
        ];
        $customName = [
            'mau' => 'Màu',
            'kichthuoc' => 'Kích thước',
            'soluong' => 'Số lượng',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }

        $dsChiTietSanPham = ChiTietSanPham::find($idct);
        $dsChiTietSanPham->san_phams_id=$id;
        $dsChiTietSanPham->mau=$request->mau;
        $dsChiTietSanPham->kich_thuoc=$request->kichthuoc;
        $dsChiTietSanPham->so_luong=$request->soluong;
        if(!empty($id))
        {
            $dsChiTietSanPham_check = ChiTietSanPham::where('san_phams_id',$id)->where('mau',$request->mau)->where('kich_thuoc',$request->kichthuoc)->first();
            if(!empty($dsChiTietSanPham_check)){
                return redirect()->route('chitietsanpham.index',['id' =>$id])->with('error', 'Đã có chi tiết sản phẩm');
            }
        }
        $dsChiTietSanPham->save();
        return redirect()->route('chitietsanpham.index',['id' =>$id])->with('success', 'Cập nhật chi tiết sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id,$idct)
    {
        //
        if(empty($idct))
        {
            // $dsMonTheThao_check = MonTheThao::whereNull('deleted_at')->where('ten_the_thao',$request->tenthethao)->first();
            // if(!empty($dsMonTheThao_check)){
                return redirect()->route('chitietsanpham.index',['id' =>$id])->with('error', 'không tìm thấy chi tiết sản phẩm');
            // }
        }
        $dsChiTietSanPham = ChiTietSanPham::find($idct);
        $dsChiTietSanPham->delete();
        return redirect()->route('chitietsanpham.index',['id' =>$id])->with('success', 'xóa chi tiết sản phẩm thành công');
    }
}
