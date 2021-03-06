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
      $key = $request->search;
        //
        if($request->search != null)
        {
            $dsChiTietSanPham = ChiTietSanPham::where('san_phams_id',$id)
                                        // ->where('mau','LIKE','%'.$request->search.'%')
                                        // ->orWhere('kich_thuoc','LIKE','%'.$request->search.'%')  
                                        // ->orWhere('so_luong',$request->search)

                                        ->where(
                                          function($que) use ($key) {
                                              $que->where('mau','LIKE','%'.$key.'%');
                                              $que->orWhere('kich_thuoc','LIKE','%'.$key.'%');
                                              $que->orWhere('so_luong',$key);
                                        })
                                        ->paginate(4);
                                        // dd($dsChiTietSanPham);
        }
        else
        {
            $dsChiTietSanPham = ChiTietSanPham::where('san_phams_id',$id)->with('sanPham')->paginate(4);
            // dd($timkiem);
        }
        $sanpham = SanPham::where('id',$id)->first();
        // ["dsMonTheThao"=>MonTheThao::find($id)]
        // $dsChiTietSanPham = [
        //     'dsChiTietSanPham'=>$timkiem,
        //     'id'=>$id
        // ];
        // dd($dsChiTietSanPham['dsChiTietSanPham'][0]->sanPham->id);
        return view('admin.product.product_detail',compact('dsChiTietSanPham','id','sanpham'));
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
            'required' => 'B???n ch??a nh???p t??n :attribute',
            'numeric' => ':attribute kh??ng h???p l???',
            'mau.required' => 'B???n ch??a nh???p m??u',
            'mau.max' => 'M??u kh??ng qu?? 20 k?? t???',
            'kichthuoc.required' => 'B???n ch??a nh???p k??ch th?????c',
            'kichthuoc.max' => 'K??ch th?????c kh??ng qu?? 10 k?? t???',
            'soluong.required' => 'B???n ch??a nh???p s??? l?????ng', 
            'mau.unique' => '???? c?? m??u s???n ph???m',
            'kichthuoc.unique' => '???? c?? k??ch th?????c s???n ph???m',
            // 'mau.regex' => 'Vui l??ng nh???p t??n m??u kh??ng d???u ho???c kh??ng ph???i l?? s???'
        ];
        $customName = [
            'mau' => 'M??u',
            'kichthuoc' => 'K??ch th?????c',
            'soluong' => 'S??? l?????ng',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);
        }
       
        
        $dsChiTietSanPham_check = ChiTietSanPham::where('san_phams_id',$id)->where('mau',$request->mau)->where('kich_thuoc',$request->kichthuoc)->first();
        if(empty($dsChiTietSanPham_check->id))
        {
            $dsChiTietSanPham = new ChiTietSanPham();
            $dsChiTietSanPham->san_phams_id=$id;
            $dsChiTietSanPham->mau=$request->mau;
            $dsChiTietSanPham->kich_thuoc=$request->kichthuoc;
            $dsChiTietSanPham->so_luong=$request->soluong;
            $dsChiTietSanPham->save();
        }
        else
        {
            $newdsChiTietSanPham = ChiTietSanPham::find($dsChiTietSanPham_check->id);
            $newdsChiTietSanPham->so_luong+=$request->soluong;
            $newdsChiTietSanPham->save();
        }
        
        return response()->json(['success'=>'Th??m chi ti???t s???n ph???m th??nh c??ng']);
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
        // id c???a s???n ph???m
        $data = [
            'id'=>$id,
            'dsChiTietSanPham'=>ChiTietSanPham::find($idct),
        ];
        // id chi tiet s???n ph???m

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
            'required' => 'B???n ch??a nh???p t??n :attribute',
            'numeric' => ':attribute kh??ng h???p l???',
            'mau.required' => 'B???n ch??a nh???p m??u',
            'mau.max' => 'M??u kh??ng qu?? 20 k?? t???',
            'kichthuoc.required' => 'B???n ch??a nh???p k??ch th?????c',
            'kichthuoc.max' => 'K??ch th?????c kh??ng qu?? 10 k?? t???',
            'soluong.required' => 'B???n ch??a nh???p s??? l?????ng', 
            'mau.unique' => '???? c?? m??u s???n ph???m',
            'kichthuoc.unique' => '???? c?? k??ch th?????c s???n ph???m',
            // 'mau.regex' => 'Vui l??ng nh???p t??n m??u kh??ng d???u ho???c kh??ng ph???i l?? s???'
        ];
        $customName = [
            'mau' => 'M??u',
            'kichthuoc' => 'K??ch th?????c',
            'soluong' => 'S??? l?????ng',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);
        }

        

        $dsChiTietSanPham_check = ChiTietSanPham::where('san_phams_id',$id)->where('mau',$request->mau)->where('kich_thuoc',$request->kichthuoc)->first();
        if(empty($dsChiTietSanPham_check->id))
        {
            
            $dsChiTietSanPham = ChiTietSanPham::find($idct);
            $dsChiTietSanPham->san_phams_id=$id;
            $dsChiTietSanPham->mau=$request->mau;
            $dsChiTietSanPham->kich_thuoc=$request->kichthuoc;
            $dsChiTietSanPham->so_luong=$request->soluong;
            $dsChiTietSanPham->save();
        }
        else {
            if($dsChiTietSanPham_check->id == $idct)
            {
                $dsChiTietSanPham = ChiTietSanPham::find($idct);
                $dsChiTietSanPham->so_luong=$request->soluong;
                $dsChiTietSanPham->save();
            }
            else
            {
                if($dsChiTietSanPham_check->mau == $request->mau && $dsChiTietSanPham_check->kich_thuoc == $request->kichthuoc)
                {
                    $newdsChiTietSanPham = ChiTietSanPham::find($dsChiTietSanPham_check->id);
                    $newdsChiTietSanPham->so_luong+=$request->soluong;
                    $newdsChiTietSanPham->save();
                    $dsChiTietSanPham = ChiTietSanPham::find($idct);
                    $dsChiTietSanPham->delete();
                }
                else
                {
                    return "1";
                }
            }
            
        }
        // if(!empty($id))
        // {
        //     $dsChiTietSanPham_check = ChiTietSanPham::where('san_phams_id',$id)->where('mau',$request->mau)->where('kich_thuoc',$request->kichthuoc)->first();
        //     if(!empty($dsChiTietSanPham_check)){
        //         return redirect()->route('chitietsanpham.index',['id' =>$id])->with('error', '???? c?? chi ti???t s???n ph???m');
        //     }
        // }
        
        return response()->json(['success'=>'C???p nh???t chi ti???t s???n ph???m th??nh c??ng']);
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
                return redirect()->route('chitietsanpham.index',['id' =>$id])->with('error', 'kh??ng t??m th???y chi ti???t s???n ph???m');
            // }
        }
        $dsChiTietSanPham = ChiTietSanPham::find($idct);
        $dsChiTietSanPham->delete();
        return redirect()->route('chitietsanpham.index',['id' =>$id])->with('success', 'x??a chi ti???t s???n ph???m th??nh c??ng');
    }
}
