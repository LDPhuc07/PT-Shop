<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Request as HttpRequest; 
use App\SanPham;
use App\Anh;
use App\YeuThich;
use App\DanhGia;
use App\Slideshow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;
// use Input;
use Illuminate\Support\Facades\Input;
class SanPhamController extends Controller
{
    public function indexAdmin(Request $request) {
        // if(!empty($request->all()))
        // {
        //     $search = $request->search;
        //     $key_loaisanpham = $request->loaisanpham;
        //     $key_monthethao = $request->monthethao;
        //     $key_nhasanxuat = $request->nhasanxuat;
        //     // dd($key_monthethao);
        //     // dd(!empty($key_monthethao));
        //     if($search != null && $key_monthethao != null && $key_nhasanxuat != null && $key_loaisanpham != null) {
        //         $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //                             ->where('mon_the_thaos_id', $key_monthethao)
        //                             ->where('nha_san_xuats_id', $key_nhasanxuat)
        //                             ->where('loai_san_phams_id', $key_loaisanpham)
        //                             ->paginate(4);
        //     } else {
        //         if($search != null && $key_monthethao == null && $key_nhasanxuat == null && $key_loaisanpham == null) {
        //             $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //                             ->paginate(4);
        //         }
                
        //         if($search == null && $key_monthethao != null && $key_nhasanxuat == null && $key_loaisanpham == null) {
        //             // $timkiem = SanPham::where('mon_the_thaos_id', $key_monthethao)
        //             //                 ->paginate(4);
        //             echo "ok";
        //         }

        //         if($search == null && $key_monthethao == null && $key_nhasanxuat != null && $key_loaisanpham == null) {
        //             $timkiem = SanPham::where('nha_san_xuats_id', $key_nhasanxuat)
        //                             ->paginate(4);
        //         }

        //         if($search == null && $key_monthethao == null && $key_nhasanxuat == null && $key_loaisanpham != null) {
        //             $timkiem = SanPham::where('loai_san_phams_id', $key_loaisanpham)
        //                             ->paginate(4);
        //         }

        //         if($search != null && $key_monthethao != null && $key_nhasanxuat == null && $key_loaisanpham == null) {
        //             $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //                             ->where('mon_the_thaos_id', $key_monthethao)
        //                             ->paginate(4);
        //         }

        //         if($search != null && $key_monthethao == null && $key_nhasanxuat != null && $key_loaisanpham == null) {
        //             $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //                             ->where('nha_san_xuats_id', $key_nhasanxuat)
        //                             ->paginate(4);
        //         }

        //         if($search != null && $key_monthethao == null && $key_nhasanxuat == null && $key_loaisanpham != null) {
        //             $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //                             ->where('loai_san_phams_id', $key_loaisanpham)
        //                             ->paginate(4);
        //         }

        //         if($search == null && $key_monthethao != null && $key_nhasanxuat != null && $key_loaisanpham == null) {
        //             $timkiem = SanPham::where('mon_the_thaos_id', $key_monthethao)
        //                             ->where('nha_san_xuats_id', $key_nhasanxuat)
        //                             ->paginate(4);
        //         }

        //         if($search == null && $key_monthethao != null && $key_nhasanxuat == null && $key_loaisanpham != null) {
        //             $timkiem = SanPham::where('mon_the_thaos_id', $key_monthethao)
        //                             ->where('loai_san_phams_id', $key_loaisanpham)
        //                             ->paginate(4);
        //         }

        //         if($search == null && $key_monthethao == null && $key_nhasanxuat != null && $key_loaisanpham != null) {
        //             $timkiem = SanPham::where('nha_san_xuats_id', $key_nhasanxuat)
        //                             ->where('loai_san_phams_id', $key_loaisanpham)
        //                             ->paginate(4);
        //         }

        //         if($search != null && $key_monthethao != null && $key_nhasanxuat != null && $key_loaisanpham == null) {
        //             $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //                             ->where('mon_the_thaos_id', $key_monthethao)
        //                             ->where('nha_san_xuats_id', $key_nhasanxuat)
        //                             ->paginate(4);
        //         }

        //         if($search != null && $key_monthethao != null && $key_nhasanxuat == null && $key_loaisanpham != null) {
        //             $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //                             ->where('mon_the_thaos_id', $key_monthethao)
        //                             ->where('loai_san_phams_id', $key_loaisanpham)
        //                             ->paginate(4);
        //         }

        //         if($search == null && $key_monthethao != null && $key_nhasanxuat != null && $key_loaisanpham != null) {
        //             $timkiem = SanPham::where('mon_the_thaos_id', $key_monthethao)
        //                             ->where('nha_san_xuats_id', $key_nhasanxuat)
        //                             ->where('loai_san_phams_id', $key_loaisanpham)
        //                             ->paginate(4);
        //         }

        //         if($search != null && $key_monthethao == null && $key_nhasanxuat != null && $key_loaisanpham != null) {
        //             $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //                             ->where('nha_san_xuats_id', $key_nhasanxuat)
        //                             ->where('loai_san_phams_id', $key_loaisanpham)
        //                             ->paginate(4);
        //         }
        //     }
        //     // if($key_monthethao != "ko" && $key_nhasanxuat != "ko" && $key_loaisanpham != "ko")
        //     // {
        //     //     $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')->whereHas('monTheThao', function($query) use ($key_monthethao) {
        //     //         $query->where('id','=',$key_monthethao);
        //     //     })
        //     //     ->whereHas('nhaSanXuat', function($query) use ($key_nhasanxuat) {
        //     //         $query->where('id','=',$key_nhasanxuat);
        //     //     })
        //     //     ->whereHas('loaiSanPham', function($query) use ($key_loaisanpham) {
        //     //         $query->where('id','=',$key_loaisanpham);
        //     //     })->paginate(4);
        //     // }
        //     // else if($key_monthethao != "ko" && $key_nhasanxuat != "ko" && $key_loaisanpham == "ko")
        //     // {
        //     //     $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')->whereHas('monTheThao', function($query) use ($key_monthethao) {
        //     //         $query->where('id','=',$key_monthethao);
        //     //     })
        //     //     ->whereHas('nhaSanXuat', function($query) use ($key_nhasanxuat) {
        //     //         $query->where('id','=',$key_nhasanxuat);
        //     //     })->paginate(4);
        //     // }
        //     // else if($key_monthethao != "ko" && $key_nhasanxuat == "ko" && $key_loaisanpham == "ko")
        //     // {
        //     //     $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')->whereHas('monTheThao', function($query) use ($key_monthethao) {
        //     //         $query->where('id','=',$key_monthethao);
        //     //     })->paginate(4);
        //     // }
        //     // else if($key_monthethao == "ko" && $key_nhasanxuat != "ko" && $key_loaisanpham != "ko")
        //     // {
        //     //     $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')->whereHas('nhaSanXuat', function($query) use ($key_nhasanxuat) {
        //     //         $query->where('id','=',$key_nhasanxuat);
        //     //     })
        //     //     ->whereHas('loaiSanPham', function($query) use ($key_loaisanpham) {
        //     //         $query->where('id','=',$key_loaisanpham);
        //     //     })->paginate(4);
        //     // }
        //     // else if($key_monthethao == "ko" && $key_nhasanxuat == "ko" && $key_loaisanpham != "ko")
        //     // {
        //     //     $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')->whereHas('loaiSanPham', function($query) use ($key_loaisanpham) {
        //     //         $query->where('id','=',$key_loaisanpham);
        //     //     })->paginate(4);
        //     // }
        //     // else if($key_monthethao == "ko" && $key_nhasanxuat != "ko" && $key_loaisanpham == "ko")
        //     // {
        //     //     $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')->whereHas('nhaSanXuat', function($query) use ($key_nhasanxuat) {
        //     //         $query->where('id','=',$key_nhasanxuat);
        //     //     })->paginate(4);
        //     // }
        //     // else if($key_monthethao != "ko" && $key_nhasanxuat == "ko" && $key_loaisanpham != "ko")
        //     // {
        //     //     $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')->whereHas('monTheThao', function($query) use ($key_monthethao) {
        //     //         $query->where('id','=',$key_monthethao);
        //     //     })
        //     //     ->whereHas('loaiSanPham', function($query) use ($key_loaisanpham) {
        //     //         $query->where('id','=',$key_loaisanpham);
        //     //     })->paginate(4);
        //     // }
        //     // else
        //     // {
        //     //     $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')->paginate(4);
        //     // }
            
        //     // {
        //     //     if($key_monthethao != 'null')
        //     //     {
        //     //         $a->where('ten_san_pham','LIKE','%'.$search.'%')->where('loai_san_phams_id','=',$key_monthethao);
        //     //         // if(!empty($key_monthethao))
        //     //         // {
        //     //         //     $a->where('loai_san_phams_id','=',$key_monthethao);
        //     //         // }
                    
        //     //     }
        //     //     if($key_monthethao == 'null')
        //     //     {
        //     //         $a->where('ten_san_pham','LIKE','%'.$search.'%');
        //     //     }
        //     // })
            
            
        //     // $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
        //     //                     ->orwhereHas('nhaSanXuat', function($query) use ($search) {
        //     //                         $query->where('ten_nha_san_xuat','LIKE','%'.$search.'%');
        //     //                     })
        //     //                     ->orwhereHas('monTheThao', function($query) use ($search) {
        //     //                         $query->where('ten_the_thao','LIKE','%'.$search.'%');
        //     //                     })
        //     //                     ->with(['nhaSanXuat','monTheThao','loaiSanPham','anh'])
        //     //                     ->paginate(4);


            
        //     // $yeu_thich = YeuThich::select(array('san_phams_id',DB::raw('COUNT(id) as yeu_thich')))
        //     //                     ->groupBy('san_phams_id')
        //     //                     ->get();
        //     // $danh_gia = DanhGia::select(array('san_phams_id',DB::raw('AVG(diem) as danh_gia')))
        //     //                     ->groupBy('san_phams_id')
        //     //                     ->get();
        // }
        // else
        // {
           $timkiem = SanPham::where('trang_thai',1)->paginate(4);
        // }
        $yeu_thich = YeuThich::select(array('san_phams_id',DB::raw('COUNT(id) as yeu_thich')))
                                    ->groupBy('san_phams_id')
                                    ->get();
        $danh_gia = DanhGia::select(array('san_phams_id',DB::raw('AVG(diem) as danh_gia'),DB::raw('COUNT(san_phams_id) as dem_danh_gia')))
                                ->groupBy('san_phams_id')
                                ->get();
        $list_yeu_thich = YeuThich::all();
        $list_danh_gia = DanhGia::all();
        $dsSanPham = [
            'dsSanPham'=>$timkiem,
            'dsYeuThich'=>$yeu_thich,
            'dsDanhGia'=>$danh_gia,
            'listYeuThich'=>$list_yeu_thich,
            'listDanhGia'=>$list_danh_gia

        ];
        return view('admin.product.index',$dsSanPham);
        // dd($dsSanPham['dsSanPham']);    
        // return view('admin.product.index',$dsSanPham);
    }
    public function search(Request $request) {
        $search = $request->search;
        $key_loaisanpham = $request->loaisanpham;
        $key_monthethao = $request->monthethao;
        $key_nhasanxuat = $request->nhasanxuat;

        $yeu_thich = YeuThich::select(array('san_phams_id',DB::raw('COUNT(id) as yeu_thich')))
                                    ->groupBy('san_phams_id')
                                    ->get();
        $danh_gia = DanhGia::select(array('san_phams_id',DB::raw('AVG(diem) as danh_gia'),DB::raw('COUNT(san_phams_id) as dem_danh_gia')))
                                ->groupBy('san_phams_id')
                                ->get();
        $list_yeu_thich = YeuThich::all();
        $list_danh_gia = DanhGia::all();

        // dd($key_monthethao);
        // dd(!empty($key_monthethao));
        if($search != null || $key_monthethao != null || $key_nhasanxuat != null || $key_loaisanpham != null) {
            if($search != null && $key_monthethao != null && $key_nhasanxuat != null && $key_loaisanpham != null) {
                $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
                                    ->where('mon_the_thaos_id', $key_monthethao)
                                    ->where('nha_san_xuats_id', $key_nhasanxuat)
                                    ->where('loai_san_phams_id', $key_loaisanpham)
                                    ->paginate(4);
            } else {
                if($search != null && $key_monthethao == null && $key_nhasanxuat == null && $key_loaisanpham == null) {
                    $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
                                    ->paginate(4);
                }
                
                if($search == null && $key_monthethao != null && $key_nhasanxuat == null && $key_loaisanpham == null) {
                    $timkiem = SanPham::where('mon_the_thaos_id', $key_monthethao)
                                    ->paginate(4);
                }
    
                if($search == null && $key_monthethao == null && $key_nhasanxuat != null && $key_loaisanpham == null) {
                    $timkiem = SanPham::where('nha_san_xuats_id', $key_nhasanxuat)
                                    ->paginate(4);
                }
    
                if($search == null && $key_monthethao == null && $key_nhasanxuat == null && $key_loaisanpham != null) {
                    $timkiem = SanPham::where('loai_san_phams_id', $key_loaisanpham)
                                    ->paginate(4);
                }
    
                if($search != null && $key_monthethao != null && $key_nhasanxuat == null && $key_loaisanpham == null) {
                    $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
                                    ->where('mon_the_thaos_id', $key_monthethao)
                                    ->paginate(4);
                }
    
                if($search != null && $key_monthethao == null && $key_nhasanxuat != null && $key_loaisanpham == null) {
                    $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
                                    ->where('nha_san_xuats_id', $key_nhasanxuat)
                                    ->paginate(4);
                }
    
                if($search != null && $key_monthethao == null && $key_nhasanxuat == null && $key_loaisanpham != null) {
                    $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
                                    ->where('loai_san_phams_id', $key_loaisanpham)
                                    ->paginate(4);
                }
    
                if($search == null && $key_monthethao != null && $key_nhasanxuat != null && $key_loaisanpham == null) {
                    $timkiem = SanPham::where('mon_the_thaos_id', $key_monthethao)
                                    ->where('nha_san_xuats_id', $key_nhasanxuat)
                                    ->paginate(4);
                }
    
                if($search == null && $key_monthethao != null && $key_nhasanxuat == null && $key_loaisanpham != null) {
                    $timkiem = SanPham::where('mon_the_thaos_id', $key_monthethao)
                                    ->where('loai_san_phams_id', $key_loaisanpham)
                                    ->paginate(4);
                }
    
                if($search == null && $key_monthethao == null && $key_nhasanxuat != null && $key_loaisanpham != null) {
                    $timkiem = SanPham::where('nha_san_xuats_id', $key_nhasanxuat)
                                    ->where('loai_san_phams_id', $key_loaisanpham)
                                    ->paginate(4);
                }
    
                if($search != null && $key_monthethao != null && $key_nhasanxuat != null && $key_loaisanpham == null) {
                    $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
                                    ->where('mon_the_thaos_id', $key_monthethao)
                                    ->where('nha_san_xuats_id', $key_nhasanxuat)
                                    ->paginate(4);
                }
    
                if($search != null && $key_monthethao != null && $key_nhasanxuat == null && $key_loaisanpham != null) {
                    $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
                                    ->where('mon_the_thaos_id', $key_monthethao)
                                    ->where('loai_san_phams_id', $key_loaisanpham)
                                    ->paginate(4);
                }
    
                if($search == null && $key_monthethao != null && $key_nhasanxuat != null && $key_loaisanpham != null) {
                    $timkiem = SanPham::where('mon_the_thaos_id', $key_monthethao)
                                    ->where('nha_san_xuats_id', $key_nhasanxuat)
                                    ->where('loai_san_phams_id', $key_loaisanpham)
                                    ->paginate(4);
                }
    
                if($search != null && $key_monthethao == null && $key_nhasanxuat != null && $key_loaisanpham != null) {
                    $timkiem = SanPham::where('ten_san_pham','LIKE','%'.$search.'%')
                                    ->where('nha_san_xuats_id', $key_nhasanxuat)
                                    ->where('loai_san_phams_id', $key_loaisanpham)
                                    ->paginate(4);
                }
    
                if($search == null && $key_monthethao == null && $key_nhasanxuat == null && $key_loaisanpham == null) {
                    $timkiem = SanPham::where('trang_thai',1)->paginate(4);
                }
            }
            $dsSanPham = [
                'dsSanPham'=>$timkiem,
                'dsYeuThich'=>$yeu_thich,
                'dsDanhGia'=>$danh_gia,
                'listYeuThich'=>$list_yeu_thich,
                'listDanhGia'=>$list_danh_gia
    
            ];
            return view('admin.product.index',$dsSanPham);
        } else {
            $timkiem = SanPham::where('trang_thai',1)->paginate(4);
            $dsSanPham = [
                'dsSanPham'=>$timkiem,
                'dsYeuThich'=>$yeu_thich,
                'dsDanhGia'=>$danh_gia,
                'listYeuThich'=>$list_yeu_thich,
                'listDanhGia'=>$list_danh_gia
    
            ];
            return redirect()->route('admin.products');
        }
        
    }
    public function storeAdmin(Request $request) {
        // dd($request->all());
        $rule = [
            // 'giaban' => 'numeric',
            'tensanpham' => 'required|max:50',
            'giaban' => 'required|numeric|digits_between:4,11',
            'giamgia' => 'nullable|numeric|min:1|max:50',
            // 'description' => 'required',
            'link.*' => 'mimes:jpeg,jpg,png',
        ];
        $messages = [
            'required' => 'B???n ch??a nh???p t??n :attribute',
            'numeric' => ':attribute kh??ng h???p l???',
            'digits_between' => ':attribute gi?? b??n l???n h??n 1000 v?? nh??? h??n 99999999999',
            // 'mimes'=>'D??? li???u b???n nh???p kh??ng ph???i l?? .jpg,.png,.jpeg',
            'link.*' => 'D??? li???u b???n nh???p kh??ng ph???i l?? .jpg,.png,.jpeg.',
            // 'max'=> 'The :attribute must be less than :max',
            'tensanpham.required' => 'B???n ch??a nh???p t??n s???n ph???m',
            'tensanpham.unique' => '???? c?? t??n s???n ph???m',
            'tensanpham.max' => 'T??n s???n ph???m kh??ng qu?? 50 k?? t???',
            'giaban.required' => 'B???n ch??a nh???p gi?? b??n',
            'giamgia.min' => 'Gi?? tr??? c???a gi???m gi?? t??? 1% ?????n 100%',
            'giamgia.max' => 'Gi?? tr??? c???a gi???m gi?? t??? 1% ?????n 100%',
        ];
        $customName = [
            'tensanpham' => 't??n s???n ph???m',
            'giaban' => 'gi?? b??n',
            'mota' => 'm?? t???',
            'giamgia' => 'gi???m gi??',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            // dd($validator);
            return response()->json(['error'=>$validator->errors()]);
        }

        //check image

        if(empty($request->id))
        {
            $dsSanPham_check = SanPham::whereNull('deleted_at')->where('ten_san_pham',$request->tensanpham)->first();
            if(!empty($dsSanPham_check)){
                return response()->json(['error1'=>'???? c?? t??n s???n ph???m']);
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
        
        return response()->json(['success'=>'Th??m s???n ph???m th??nh c??ng']);
    }
    public function create() {
        return view('admin.product.add_product');
    }
    public function edit(Request $request, $id=''){
        if(empty($id)){
            return redirect()->route('sanpham.indexAdmin')->with('error','aaaaaaa');

        }
        $sanpham = SanPham::where('id',$id)->with(['nhaSanXuat','monTheThao','loaiSanPham'])
                                        ->with(['anh'=>function($query){
                                            $query->orderBy('anhchinh','desc');
                                        }])->first();
        if(empty($sanpham)){
            return redirect()->route('sanpham.indexAdmin')->with('error','bbbbb');
        }
        $dsSanPham = ['dsSanPham'=>$sanpham];
        // dd($dsSanPham);
        return view('admin.product.edit_product',$dsSanPham);

    }
    public function update(Request $request, $id){
 
        $rule = [
            // 'giaban' => 'numeric',

            'giaban' => 'required|numeric|digits_between:4,11',
            'giamgia' => 'nullable|numeric|min:1|max:50',
            // 'description' => 'required',
            'link.*' => 'mimes:jpeg,jpg,png',
        ];
        $messages = [
            'required' => 'B???n ch??a nh???p t??n :attribute',
            'numeric' => ':attribute kh??ng h???p l???',
            'digits_between' => ':attribute gi?? b??n l???n h??n 1000 v?? nh??? h??n 99999999999',
            // 'mimes'=>'D??? li???u b???n nh???p kh??ng ph???i l?? .jpg,.png,.jpeg',
            'link.*' => 'D??? li???u b???n nh???p kh??ng ph???i l?? .jpg,.png,.jpeg.',
            // 'max'=> 'The :attribute must be less than :max',

            'giaban.required' => 'B???n ch??a nh???p gi?? b??n',
            'giamgia.min' => 'Gi?? tr??? c???a gi???m gi?? t??? 1% ?????n 100%',
            'giamgia.max' => 'Gi?? tr??? c???a gi???m gi?? t??? 1% ?????n 100%',
        ];
        $customName = [
            'tensanpham' => 't??n s???n ph???m',
            'giaban' => 'gi?? b??n',
            'mota' => 'm?? t???',
            'giamgia' => 'gi???m gi??',
        ];
        $validator = Validator::make($request->all(),$rule,$messages,$customName);
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);
        } else {
            $dsSanPham = SanPham::find($id);
            if($dsSanPham->ten_san_pham != $request->tensanpham) {
                $rule1 = [
                    
                    'tensanpham' => 'required|max:50',

                ];
                $messages1 = [
                    
                    'tensanpham.required' => 'B???n ch??a nh???p t??n s???n ph???m',
                    'tensanpham.unique' => '???? c?? t??n s???n ph???m',
                    'tensanpham.max' => 'T??n s???n ph???m kh??ng qu?? 50 k?? t???',
                ];
                $validator1 = Validator::make($request->all(),$rule1,$messages1);

                if($validator1->fails()) {
                    return response()->json(['error'=>$validator1->errors()]);
                }
                
                else {
                  $dsSanPham_check = SanPham::whereNull('deleted_at')->where('ten_san_pham',$request->tensanpham)->first();
                  if(!empty($dsSanPham_check)){
                  return response()->json(['error1'=>'???? c?? t??n s???n ph???m']);
                  }
                    $dsSanPham->ten_san_pham=$request->tensanpham;
                    
                }
                
            }
            $dsSanPham->nha_san_xuats_id=$request->nhasanxuat;
            $dsSanPham->loai_san_phams_id=$request->loaisanpham;
            $dsSanPham->mon_the_thaos_id=$request->monthethao;
            $dsSanPham->gia_ban=$request->giaban;
            $dsSanPham->giam_gia=$request->giamgia;
            $dsSanPham->mo_ta=$request->mota;
            $dsSanPham->save();
            $SanPham_id = $dsSanPham->id;
            
            if(!empty(HttpRequest::file('link'))){
                foreach(HttpRequest::file('link') as $file){
                    $anhsanpham = new Anh();
                    if(isset($file)){
                        $count_anh = Anh::where('san_phams_id',$SanPham_id)
                        // ->whereNull('deleted_at')
                        ->get()->count();
                        if($count_anh == 0 )
                        {
                            $anhsanpham->anhchinh = true; 
                        }

                        $anhgiido= Anh::where('san_phams_id',$SanPham_id)->where('anhchinh',1)->first();
                        if(empty($anhgiido)){
                            $anhsanpham->anhchinh = true; 
                        }

                        $anhsanpham->san_phams_id = $id;
                        $anhcc = $file->getClientOriginalName();
                        $anhsanpham->link = $anhcc;
                        $anhccc = pathinfo($anhcc,PATHINFO_FILENAME);
                        $anhsanpham->anhchitiet = $anhccc."_".$anhsanpham->id.".".$file->getClientOriginalExtension();
                        $anhsanpham->link = '/img/product/'.$anhsanpham->anhchitiet;
                        $file->move('img/product',$anhsanpham->anhchitiet);
                        $anhsanpham->save();
                    }
                }
            }
             
            return response()->json(['success'=>'C???p nh???t s???n ph???m th??nh c??ng']);
        }
        
      
            
        
        

        // if(Input::hasFile('link')) {
        //     // dd($dsSanPham::file('link'));
        //     foreach(Input::file('link') as $file) {
        //         if(isset($file)){
        //             $anhsanpham = new Anh();
        //             $count_anh = Anh::where('san_phams_id',$SanPham_id)
        //             // ->whereNull('deleted_at')
        //             ->get()->count();
        //             if($count_anh == 0 )
        //             {
        //                 $anhsanpham->anhchinh = true; 
        //             }
        //             $anhsanpham->san_phams_id = $SanPham_id;
        //             $anhsanpham->save();
        //             $anhcc = $file->getClientOriginalName();
        //             $anhccc = pathinfo($anhcc,PATHINFO_FILENAME);
        //             $anhsanpham->anhchitiet = $anhccc."_".$anhsanpham->id.".".$file->getClientOriginalExtension();
        //             $anhsanpham->link = '/img/product/'.$anhsanpham->anhchitiet;
        //             $file->move('img/product',$anhsanpham->anhchitiet);
       
        //             $anhsanpham->save();
        //         }
        //     }
        // }
        
    }
    public function getDelImg(Request $request,$id){
    //     return response()->json([
    //         'error' =>true,
    //         'message' => "oke",
    //         'data' => $request->all(),
    //    ]);
       
        if(HttpRequest::ajax()){
            $idHinh = (int)HttpRequest::get('idHinh');
            $image_detail = Anh::find($idHinh);
        //     return response()->json([
        //         'error' =>true,
        //         'message' => "oke",
        //         'data' => $image_detail,
        //    ]);
            if(!empty($image_detail)){
                $img = '/img/product/'.$image_detail->anhchitiet;
                if(File::exists(public_path().$img)){
                    File::delete(public_path().$img);
                }
                $image_detail->delete();
            }
            return response()->json([
                'error' =>false,
                'message' => "Xo?? th??nh c??ng",
                'data' => $image_detail,
           ]);
        }
    }
    public function delete(Request $request, $id){
        if(empty($id))
        {
            // $dsMonTheThao_check = MonTheThao::whereNull('deleted_at')->where('ten_the_thao',$request->tenthethao)->first();
            // if(!empty($dsMonTheThao_check)){
                return redirect()->route('sanpham.indexAdmin')->with('error', 'kh??ng t??m th???y s???n ph???m');
            // }
        }
        $dsSanPham = SanPham::find($id);
        $dsSanPham->delete();
        return redirect()->route('sanpham.indexAdmin')->with('success', 'x??a s???n ph???m th??nh c??ng');
    }
}
