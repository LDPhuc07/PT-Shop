<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slideshow;
use Illuminate\Support\Facades\Validator;
class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(!empty($request->search))
        {
            $timkiem = Slideshow::where('slideshow','LIKE','%'.$request->search.'%')->paginate(4);
        }
        else
        {
            $timkiem = Slideshow::paginate(4);
        }
        $dsSlideShow = ['dsSlideShow'=>$timkiem];
        return view('admin.slideshow.index',$dsSlideShow);
        // $dsSlideShow = ['dsSlideShow'=>Slideshow::paginate(4)];
        // return view('admin.slideshow.index',$dsSlideShow);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slideshow.add_slideshow');
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
            'tenslideshow' => 'required|unique:slideshows,slideshow|max:100',
            // 'category' => 'numeric',
            // 'price' => 'required|numeric|digits_between:4,11',
            // 'description' => 'required',
            'link' => 'required|mimes:jpeg,jpg,png',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            // 'numeric' => 'The :attribute is invalid',
            // 'digits_between' => 'The :attribute must be more than 1000 and less than 99999999999',
            'mimes'=>'Dữ liệu bạn nhập không thuộc định dạng .jpg,.png,.jpeg',
            // 'max'=> 'The :attribute must be less than :max',
            'tenslideshow.required' => 'Bạn chưa nhập tên slideshow',
            'tenslideshow.max' => 'Slideshow không quá 100 ký tự',
            'tenslideshow.unique' => 'Đã có tên slideshow',
            'link.required' => 'Bạn chưa chọn hình ảnh slideshow'
        ];
        $customName = [
            'tenslideshow' => 'Tên slideshow',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);
        }
        // if(empty($request->id))
        // {
        //     $dsSlideShow_check = Slideshow::whereNull('deleted_at')->where('slideshow',$request->tenslideshow)->first();
        //     if(!empty($dsSlideShow_check)){
        //         return redirect()->route('slideshow.index')->with('error', 'Đã có tên slideshow');
        //     }
        // }
        $dsSlideShow = new Slideshow();
        $dsSlideShow->slideshow=$request->tenslideshow;
        if($request->hasFile('link')){// neu anh co ton
            $img = $request->link;
            $dsSlideShow->link=$img->getClientOriginalName();
            $request->link->move('img/slideshow',$img->getClientOriginalName());
           
        }
        else
            {$dsSlideShow->link='no-image.png';}
        $dsSlideShow->save();
        return response()->json(['success'=>'Thêm slideshow thành công']);
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
        $dsSlideShow = ["dsSlideShow"=>Slideshow::find($id)];
        return view('admin.slideshow.edit_slideshow',$dsSlideShow);
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
            'tenslideshow' => 'required|unique:slideshows,slideshow|max:100',
            // 'category' => 'numeric',
            // 'price' => 'required|numeric|digits_between:4,11',
            // 'description' => 'required',
            'link' => 'required|mimes:jpeg,jpg,png',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            // 'numeric' => 'The :attribute is invalid',
            // 'digits_between' => 'The :attribute must be more than 1000 and less than 99999999999',
            'mimes'=>'Dữ liệu bạn nhập không thuộc định dạng .jpg,.png,.jpeg',
            // 'max'=> 'The :attribute must be less than :max',
            'tenslideshow.required' => 'Bạn chưa nhập tên slideshow',
            'tenslideshow.max' => 'Slideshow không quá 100 ký tự',
            'tenslideshow.unique' => 'Đã có tên slideshow',
            'link.required' => 'Bạn chưa chọn hình ảnh slideshow',
        ];
        $customName = [
            'tenslideshow' => 'Tên slideshow',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);

        }
        // if(empty($request->id))
        // {
        //     $dsSlideShow_check = Slideshow::whereNull('deleted_at')->where('slideshow',$request->tenslideshow)->first();
        //     if(!empty($dsSlideShow_check)){
        //         return redirect()->route('slideshow.index')->with('error', 'Đã có tên slideshow');
        //     }
        // }
        $dsSlideShow = Slideshow::find($id);
        $dsSlideShow->slideshow=$request->tenslideshow;
        if($request->hasFile('link')){// neu anh co ton
            $img = $request->link;
            $dsSlideShow->link=$img->getClientOriginalName();
            $request->link->move('img/slideshow',$img->getClientOriginalName());
           
        }
        // else
        //     {$dsSlideShow->link='no-image.png';}
        $dsSlideShow->save();
        return response()->json(['success'=>'Cập nhật slideshow thành công']);
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
                return redirect()->route('slideshow.index')->with('error', 'không tìm thấy slideshow');
            // }
        }
        $dsSlideShow = Slideshow::find($id);
        $dsSlideShow->delete();
        return redirect()->route('slideshow.index')->with('success', 'xóa slideshow thành công');
    }
}