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
    public function index()
    {
        //
        $dsSlideShow = ['dsSlideShow'=>Slideshow::paginate(4)];
        return view('admin.slideshow.index',$dsSlideShow);
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
            'tenslideshow' => 'required',
            // 'category' => 'numeric',
            // 'price' => 'required|numeric|digits_between:4,11',
            // 'description' => 'required',
            'link' => 'mimes:jpeg,jpg,png',
        ];
        $messages = [
            'required' => 'Bạn chưa nhập tên :attribute',
            // 'numeric' => 'The :attribute is invalid',
            // 'digits_between' => 'The :attribute must be more than 1000 and less than 99999999999',
            'mimes'=>'The :attribute must be .jpg,.png,.jpeg',
            // 'max'=> 'The :attribute must be less than :max',
            'tenslideshow.required' => 'Bạn chưa nhập tên slideshow',
        ];
        $customName = [
            'tenslideshow' => 'Tên slideshow',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator);
        }
        if(empty($request->id))
        {
            $dsSlideShow_check = Slideshow::whereNull('deleted_at')->where('slideshow',$request->tenslideshow)->first();
            if(!empty($dsSlideShow_check)){
                return redirect()->route('slideshow.index')->with('error', 'Đã có tên slideshow');
            }
        }
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
        return redirect()->route('slideshow.index')->with('success', 'Tạo thành công');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
