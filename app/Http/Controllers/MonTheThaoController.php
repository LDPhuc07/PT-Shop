<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonTheThao;
use Illuminate\Support\Facades\Validator;
class MonTheThaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // //
        // $timkiem = MonTheThao::paginate(4);
        // dd($dsMonTheThao);
        
        if(!empty($request->search))
        {
            $timkiem = MonTheThao::where('ten_the_thao','LIKE','%'.$request->search.'%')->paginate(4);
        }
        else
        {
            $timkiem = MonTheThao::paginate(4);
        }
        $dsMonTheThao = ['dsMonTheThao'=>$timkiem];
        return view('admin.sport.index',$dsMonTheThao); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sport.add_sport');
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
            'tenthethao' => 'required',
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
            'tenthethao.required' => 'Bạn chưa nhập tên thể thao',
        ];
        $customName = [
            'tenthethao' => 'Tên thể thao',
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
            $dsMonTheThao_check = MonTheThao::whereNull('deleted_at')->where('ten_the_thao',$request->tenthethao)->first();
            if(!empty($dsMonTheThao_check)){
                return redirect()->route('monthethao.index')->with('error', 'Đã có tên môn thể thao');
            }
        }
        $dsMonTheThao = new MonTheThao();
        $dsMonTheThao->ten_the_thao=$request->tenthethao;
        dd($dsMonTheThao);
        $dsMonTheThao->save();
        
        // return redirect('admin.sport.index',$dsMonTheThao); 
        return redirect()->route('monthethao.index')->with('success', 'Tao thanh cong');
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
        $dsMonTheThao = ["dsMonTheThao"=>MonTheThao::find($id)];
        
        return view('admin.sport.edit_sport',$dsMonTheThao);
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
            'tenthethao' => 'required',
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
            'tenthethao.required' => 'Bạn chưa nhập tên thể thao',
        ];
        $customName = [
            'tenthethao' => 'Tên thể thao',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        
        if(empty($request->id))
        {
            $dsMonTheThao_check = MonTheThao::whereNull('deleted_at')->where('ten_the_thao',$request->tenthethao)->first();
            if(!empty($dsMonTheThao_check)){
                return redirect()->route('monthethao.index')->with('error', 'Đã có tên môn thể thao');
            }
        }
        $dsMonTheThao = MonTheThao::find($id);
        $dsMonTheThao->ten_the_thao=$request->tenthethao;
        $dsMonTheThao->save();
        
        // return redirect('admin.sport.index',$dsMonTheThao); 
        return redirect()->route('monthethao.index')->with('success', 'Cập nhật môn thể thao thành công');
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
                return redirect()->route('monthethao.index')->with('error', 'không tìm thấy môn thể thao');
            // }
        }
        $dsMonTheThao = MonTheThao::find($id);
        $dsMonTheThao->delete();
        return redirect()->route('monthethao.index')->with('success', 'xóa môn thể thao thành công');
    }
    public function search(Request $request)
    {
        
    }
}
