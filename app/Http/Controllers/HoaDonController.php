<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\SanPham;
use App\Anh;
use App\TaiKhoan;
use App\HoaDon;
use App\ChiTietHoaDon;
use App\ChiTietSanPham;
use App\DanhSachHanChe;
use App\Giohang;
use Carbon\Carbon;
use PDF;
use Session;
use DB;

class HoaDonController extends Controller
{
    public function index() {
        $sub_30_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->toDateString();

        $array = ['arrays'=>HoaDon::where('ngay_lap_hd',">=",$sub_30_days)->orderBy('ngay_lap_hd', 'DESC')->paginate(5)];
        return view('admin.bill.index',$array);
    }
    public function getSearch() {
        $array = ['arrays'=>HoaDon::paginate(5)];
        return redirect('admin/bill');
    }
    public function billDetail($id) {
        $array = ['arrays'=>ChiTietHoaDon::where('hoa_dons_id',$id)->get()];
        return view('admin.bill.product_detail_modal_bootstrap',$array);
    }

    // thanh toán online

    public function return(Request $request, $id, $ho_ten, $so_dien_thoai, $dia_chi) {
        $url = session('url_prev','/');

        if($request->vnp_ResponseCode == "00") {
            $bill = array();
            $bill['tai_khoans_id'] = $id;
            $bill['ho_ten'] = $ho_ten;
            $bill['so_dien_thoai'] = $so_dien_thoai;
            $bill['dia_chi'] = $dia_chi;
            $bill['ngay_lap_hd'] = Carbon::now();
            $bill['hinh_thuc_thanh_toan'] = true;
            $bill_id = HoaDon::insertGetId($bill);

            $gio_hangs = GioHang::where('tai_khoans_id',$id)->get();
            $tongtien = 0;
            foreach($gio_hangs as $gio_hang) {
                $giaban = $gio_hang->chiTietSanPham->sanpham->gia_ban*(100-$gio_hang->chiTietSanPham->sanpham->giam_gia)/100;
                $bill_detail = new ChiTietHoaDon();
                $bill_detail->hoa_dons_id = $bill_id;
                $bill_detail->chi_tiet_san_phams_id = $gio_hang->chi_tiet_san_phams_id;
                $bill_detail->so_luong = $gio_hang->so_luong; 
                $bill_detail->gia_ban = $giaban;
                $update_ctsp = ChiTietSanPham::find($gio_hang->chi_tiet_san_phams_id);
                $update_ctsp->so_luong -= $gio_hang->so_luong;
                $update_ctsp->save();
                $bill_detail->save();
                $tongtien += ($giaban*$gio_hang->so_luong);
            }
            $add_tong_tien = HoaDon::find($bill_id);
            $add_tong_tien->tong_tien = $tongtien;
            $add_tong_tien->save();

            $delete = GioHang::where('tai_khoans_id', $id)->delete();
            return redirect()->route('ordersuccess');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }


    public function returnBuyNow(Request $request, $id, $ho_ten, $so_dien_thoai, $dia_chi) {
       
        $url = session('url_prev','/');
        $data = Session::all();
        if($request->vnp_ResponseCode == "00") {
            
            if(empty($data['id'])) {
              return view('pages.error');
            }
            $bill = array();
            if($id != "no") {
              $bill['tai_khoans_id'] = $id;
            }
            $bill['ho_ten'] = $ho_ten;
            $bill['so_dien_thoai'] = $so_dien_thoai;
            $bill['dia_chi'] = $dia_chi;
            $bill['ngay_lap_hd'] = Carbon::now();
            $bill['hinh_thuc_thanh_toan'] = true;
            $bill_id = HoaDon::insertGetId($bill);

            
            $tongtien = 0;
            $bill_detail = new ChiTietHoaDon();
            $bill_detail->hoa_dons_id = $bill_id;
            $bill_detail->chi_tiet_san_phams_id = $data['id'];
            $bill_detail->so_luong = $data['so_luong']; 
            $update_ctsp = ChiTietSanPham::find($data['id']);
            $update_ctsp->so_luong -= $data['so_luong'];
            $bill_detail->gia_ban = $data['gia'];
            $tongtien += ($data['gia']*$data['so_luong']);
            $update_ctsp->save();
            $bill_detail->save();
            $add_tong_tien = HoaDon::find($bill_id);
            $add_tong_tien->tong_tien = $tongtien;
            $add_tong_tien->save();

            Session::forget('id');
            Session::forget('ten_san_pham');
            Session::forget('gia');
            Session::forget('so_luong');
            Session::forget('anh');
            Session::forget('size');
            Session::forget('mau');
            return redirect()->route('ordersuccess');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }

    // end

    public function create(Request $request){
        
            $request->validate([
                'ho_ten' => 'required',
                'dia_chi' => 'required',
                'so_dien_thoai' => 'digits:10|required|numeric|unique:danh_sach_han_ches,so_dien_thoai'
            ],[
                'ho_ten.required' => 'Vui lòng nhập họ và tên',
                'dia_chi.required' => 'Vui lòng nhập địa chỉ',
                'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
                'so_dien_thoai.digits' => 'Số điện thoại phải có 10 số',
                'so_dien_thoai.numeric' => 'Số điện thoại không hợp lệ',
                'so_dien_thoai.unique' => 'Số điện thoại của bạn đã bị đưa vào danh sách hạn chế'
            ]);
            

        //         //thanh toán vnpay
        if($request->payment == "1")
        {
          session(['tong_tien' => $request->online]);
          session(['cost_id' => $request->id]);
          session(['url_prev' => url()->previous()]);
          $id = Auth::user()->id;
          $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
          $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
          $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
          $vnp_Returnurl = "http://localhost:8000/return-vnpay/{$id}/{$request->ho_ten}/{$request->so_dien_thoai}/{$request->dia_chi}";
          $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
          $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
          $vnp_OrderType = 'billpayment';
          $vnp_Amount = $request->online * 100;
          $vnp_Locale = 'vn';
          $vnp_IpAddr = request()->ip();

          $inputData = array(
              "vnp_Version" => "2.0.0",
              "vnp_TmnCode" => $vnp_TmnCode,
              "vnp_Amount" => $vnp_Amount,
              "vnp_Command" => "pay",
              "vnp_CreateDate" => date('YmdHis'),
              "vnp_CurrCode" => "VND",
              "vnp_IpAddr" => $vnp_IpAddr,
              "vnp_Locale" => $vnp_Locale,
              "vnp_OrderInfo" => $vnp_OrderInfo,
              "vnp_OrderType" => $vnp_OrderType,
              "vnp_ReturnUrl" => $vnp_Returnurl,
              "vnp_TxnRef" => $vnp_TxnRef,
          );
          $vnp_BankCode = 'ncb';
          if (isset($vnp_BankCode) && $vnp_BankCode != "") {
              $inputData['vnp_BankCode'] = $vnp_BankCode;
          }
          ksort($inputData);
          $query = "";
          $i = 0;
          $hashdata = "";
          foreach ($inputData as $key => $value) {
              if ($i == 1) {
                  $hashdata .= '&' . $key . "=" . $value;
              } else {
                  $hashdata .= $key . "=" . $value;
                  $i = 1;
              }
              $query .= urlencode($key) . "=" . urlencode($value) . '&';
          }

          $vnp_Url = $vnp_Url . "?" . $query;
          if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
              $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
              $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
          }
          return redirect($vnp_Url);
        }
        //ket thuc thanh toan vnpay

            $bill = array();
            $bill['tai_khoans_id'] = Auth::user()->id;
            $bill['ho_ten'] = $request->ho_ten;
            $bill['so_dien_thoai'] = $request->so_dien_thoai;
            $bill['dia_chi'] = $request->dia_chi;
            $bill['ngay_lap_hd'] = Carbon::now();
            $bill_id = HoaDon::insertGetId($bill);

            $gio_hangs = GioHang::where('tai_khoans_id',Auth::user()->id)->get();
            $tongtien = 0;
            foreach($gio_hangs as $gio_hang) {
                $giaban = $gio_hang->chiTietSanPham->sanpham->gia_ban*(100-$gio_hang->chiTietSanPham->sanpham->giam_gia)/100;
                $bill_detail = new ChiTietHoaDon();
                $bill_detail->hoa_dons_id = $bill_id;
                $bill_detail->chi_tiet_san_phams_id = $gio_hang->chi_tiet_san_phams_id;
                $bill_detail->so_luong = $gio_hang->so_luong; 
                $bill_detail->gia_ban = $giaban;
                $update_ctsp = ChiTietSanPham::find($gio_hang->chi_tiet_san_phams_id);
                $update_ctsp->so_luong -= $gio_hang->so_luong;
                $update_ctsp->save();
                $bill_detail->save();
                $tongtien += ($giaban*$gio_hang->so_luong);
            }
            $add_tong_tien = HoaDon::find($bill_id);
            $add_tong_tien->tong_tien = $tongtien;
            $add_tong_tien->save();

            $delete = GioHang::where('tai_khoans_id', Auth::user()->id)->delete();
            return redirect()->route('ordersuccess');
    }
    public function createBuyNow(Request $request){
      
            $request->validate([
                'ho_ten' => 'required',
                'dia_chi' => 'required',
                'so_dien_thoai' => 'digits:10|required|numeric|unique:danh_sach_han_ches,so_dien_thoai'
            ],[
                'ho_ten.required' => 'Vui lòng nhập tên khách hàng',
                'dia_chi.required' => 'Vui lòng nhập địa chỉ',
                'so_dien_thoai.required' => 'Vui lòng nhập số điện thoại',
                'so_dien_thoai.digits' => 'Số điện thoại phải có 10 số',
                'so_dien_thoai.numeric' => 'Số điện thoại không hợp lệ',
                'so_dien_thoai.unique' => 'Số điện thoại của bạn đã bị đưa vào danh sách hạn chế'
            ]);
       

                //thanh toán vnpay
        if($request->payment == "1")
        {
          session(['tong_tien' => $request->online]);
          session(['cost_id' => $request->id]);
          session(['url_prev' => url()->previous()]);
          if(Auth::check() && Auth::user()->admin != 1) {
            $id = Auth::user()->id;
          } else {
            $id = "no";
          }
          $vnp_TmnCode = "UDOPNWS1"; //Mã website tại VNPAY 
          $vnp_HashSecret = "EBAHADUGCOEWYXCMYZRMTMLSHGKNRPBN"; //Chuỗi bí mật
          $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
          $vnp_Returnurl = "http://localhost:8000/return-buy-now-vnpay/{$id}/{$request->ho_ten}/{$request->so_dien_thoai}/{$request->dia_chi}";
          $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
          $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
          $vnp_OrderType = 'billpayment';
          $vnp_Amount = $request->online * 100;
          $vnp_Locale = 'vn';
          $vnp_IpAddr = request()->ip();

          $inputData = array(
              "vnp_Version" => "2.0.0",
              "vnp_TmnCode" => $vnp_TmnCode,
              "vnp_Amount" => $vnp_Amount,
              "vnp_Command" => "pay",
              "vnp_CreateDate" => date('YmdHis'),
              "vnp_CurrCode" => "VND",
              "vnp_IpAddr" => $vnp_IpAddr,
              "vnp_Locale" => $vnp_Locale,
              "vnp_OrderInfo" => $vnp_OrderInfo,
              "vnp_OrderType" => $vnp_OrderType,
              "vnp_ReturnUrl" => $vnp_Returnurl,
              "vnp_TxnRef" => $vnp_TxnRef,
          );
          $vnp_BankCode = 'ncb';
          if (isset($vnp_BankCode) && $vnp_BankCode != "") {
              $inputData['vnp_BankCode'] = $vnp_BankCode;
          }
          ksort($inputData);
          $query = "";
          $i = 0;
          $hashdata = "";
          foreach ($inputData as $key => $value) {
              if ($i == 1) {
                  $hashdata .= '&' . $key . "=" . $value;
              } else {
                  $hashdata .= $key . "=" . $value;
                  $i = 1;
              }
              $query .= urlencode($key) . "=" . urlencode($value) . '&';
          }

          $vnp_Url = $vnp_Url . "?" . $query;
          if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
              $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
              $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
          }
          return redirect($vnp_Url);
        }
        //ket thuc thanh toan vnpay

            $bill = array();
            if(Auth::check() && Auth::user()->admin != 1) {
              $bill['tai_khoans_id'] = Auth::user()->id;
            }
            $bill['ho_ten'] = $request->ho_ten;
            $bill['so_dien_thoai'] = $request->so_dien_thoai;
            $bill['dia_chi'] = $request->dia_chi;
            $bill['ngay_lap_hd'] = Carbon::now();
            $bill_id = HoaDon::insertGetId($bill);

            $data = Session::all();
            $tongtien = 0;
            $bill_detail = new ChiTietHoaDon();
            $bill_detail->hoa_dons_id = $bill_id;
            $bill_detail->chi_tiet_san_phams_id = $data['id'];
            $bill_detail->so_luong = $data['so_luong']; 
            $update_ctsp = ChiTietSanPham::find($data['id']);
            $update_ctsp->so_luong -= $data['so_luong'];
            $bill_detail->gia_ban = $data['gia'];
            $tongtien += ($data['gia']*$data['so_luong']);
            $update_ctsp->save();
            $bill_detail->save();
            $add_tong_tien = HoaDon::find($bill_id);
            $add_tong_tien->tong_tien = $tongtien;
            $add_tong_tien->save();

        Session::forget('id');
        Session::forget('ten_san_pham');
        Session::forget('gia');
        Session::forget('so_luong');
        Session::forget('anh');
        Session::forget('size');
        Session::forget('mau');
        return redirect()->route('ordersuccess');
    }
    public function delete($id) {
        $new = HoaDon::find($id);
        $new->trang_thai_don_hang = 0;
        $new->save();
        echo 'done';
    }
    public function checkBill($id, $val) {
      if($val == 'no') {
      } else {
        

        $check = HoaDon::find($id);
        // $ds_hoa_don_han_che = HoaDon::where('trang_thai_don_hang', -1)->where('so_dien_thoai',$check->so_dien_thoai)->get();
        // $dem = 0;
        // foreach($ds_hoa_don_han_che as $item) {
        //   $dem++;
        // }
        // if($dem > 1) {
        //   $newbacklist = new DanhSachHanChe();
        //   $newbacklist->so_dien_thoai = $check->so_dien_thoai;
        //   $newbacklist->save();
        // } 
        //  {
        //   $newbacklist = DanhSachHanChe::where('so_dien_thoai',$check->so_dien_thoai)->delete();
        // }
        // if($val != -1) {
        //   $ds_hoa_don_han_che = HoaDon::where('trang_thai_don_hang', -1)->where('so_dien_thoai',$check->so_dien_thoai)->get();
        //   $dem = 0;
        //   foreach($ds_hoa_don_han_che as $item) {
        //     $dem++;
        //   }
        //   if($dem <= 3 && $dem > 0) {
        //     $newbacklist = DanhSachHanChe::where('so_dien_thoai',$check->so_dien_thoai)->delete();
        //   } 
        // }

        if($val == 0 && $check->trang_thai_don_hang != 0) {
          $cthds = ChiTietHoaDon::where('hoa_dons_id', $id)->get();
          foreach($cthds as $cthd) {
            $ctsp = ChiTietSanPham::find($cthd->chi_tiet_san_phams_id);
            $ctsp->so_luong += $cthd->so_luong;
            $ctsp->save();
          }
          $new = HoaDon::find($id);
          $new->trang_thai_don_hang = $val;
          $new->save();
          return $val;
        }
        if($val != 0 && $check->trang_thai_don_hang == 0) {
          $cthds = ChiTietHoaDon::where('hoa_dons_id', $id)->get();
          foreach($cthds as $cthd) {
            $ctsp = ChiTietSanPham::find($cthd->chi_tiet_san_phams_id);
            if($ctsp->so_luong >= $cthd->so_luong) {
              $ctsp->so_luong -= $cthd->so_luong;
              $ctsp->save();
            } else {
              return 'no';
            }
          }
          $new = HoaDon::find($id);
          $new->trang_thai_don_hang = $val;
          $new->save();
          return $val;
        }
        if($val == -1 && $check->trang_thai_don_hang != -1) {
          $cthds = ChiTietHoaDon::where('hoa_dons_id', $id)->get();
          foreach($cthds as $cthd) {
            $ctsp = ChiTietSanPham::find($cthd->chi_tiet_san_phams_id);
            $ctsp->so_luong += $cthd->so_luong;
            $ctsp->save();
          }

          $new = HoaDon::find($id);
          $new->trang_thai_don_hang = $val;
          $new->save();
          

          $ds_hoa_don_han_che = HoaDon::where('trang_thai_don_hang', -1)->where('so_dien_thoai',$check->so_dien_thoai)->get();
          $dem = 0;
          foreach($ds_hoa_don_han_che as $item) {
            $dem++;
          }
          if($dem > 1) {
            $newbacklist = new DanhSachHanChe();
            $newbacklist->so_dien_thoai = $check->so_dien_thoai;
            $newbacklist->save();
          } 
          return $val;
        }
        if($val != -1 && $check->trang_thai_don_hang == -1) {
          $cthds = ChiTietHoaDon::where('hoa_dons_id', $id)->get();
          foreach($cthds as $cthd) {
            $ctsp = ChiTietSanPham::find($cthd->chi_tiet_san_phams_id);
            if($ctsp->so_luong >= $cthd->so_luong) {
              $ctsp->so_luong -= $cthd->so_luong;
              $ctsp->save();
            } else {
              return 'no';
            }
          }
          $new = HoaDon::find($id);
          $new->trang_thai_don_hang = $val;
          $new->save();
          
          $ds_hoa_don_han_che = HoaDon::where('trang_thai_don_hang', -1)->where('so_dien_thoai',$check->so_dien_thoai)->get();
          $dem = 0;
          foreach($ds_hoa_don_han_che as $item) {
            $dem++;
          }
          if($dem <= 1) {
            $newbacklist = DanhSachHanChe::where('so_dien_thoai',$check->so_dien_thoai)->delete();
          } 
          return $val;
        }
        $new = HoaDon::find($id);
        $new->trang_thai_don_hang = $val;
        $new->save();
        return $val;
      }
    }
    public function destroyBill($id) {
      $new = HoaDon::find($id);
      $cthds = ChiTietHoaDon::where('hoa_dons_id', $id)->get();
      foreach($cthds as $cthd) {
        $ctsp = ChiTietSanPham::find($cthd->chi_tiet_san_phams_id);
        $ctsp->so_luong += $cthd->so_luong;
        $ctsp->save();
      }
      $new->trang_thai_don_hang = 0;
      $new->save();

      echo "done";
    }
    public function cancelDestroyBill($id) {
      $new = HoaDon::find($id);
      $cthds = ChiTietHoaDon::where('hoa_dons_id', $id)->get();
      foreach($cthds as $cthd) {
        $ctsp = ChiTietSanPham::find($cthd->chi_tiet_san_phams_id);
        if($ctsp->so_luong >= $cthd->so_luong) {
          $ctsp->so_luong -= $cthd->so_luong;
          $ctsp->save();
        } else {
          return 'no';
        }
      }
      $new->trang_thai_don_hang = 1;
      $new->save();

      return "done";
    }
    public function printBill($id) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }
    public function print_order_convert($id) {
        $bill = HoaDon::find($id);
        $bill_detail = ChiTietHoaDon::where('hoa_dons_id', $id)->get();
        return view('admin.bill.form_print',array('bill' => $bill,'bill_detail' => $bill_detail));
    }
    public function search(Request $request) {
        // dd($request->all());
        $key = $request->key_search;
        $key_from_day = $request->key_from_day;
        $key_to_day = $request->key_to_day;
        $trang_thai_don_hang = $request->trang_thai_don_hang;
        if(empty($key)) {
          if(empty($key_from_day)) {
              if(empty($key_to_day)) {
                  if($trang_thai_don_hang == null) {
                    return redirect()->route('admin.bill.index');
                  } else {
                      $query = HoaDon::where('trang_thai_don_hang',$trang_thai_don_hang);
                  }
              } else {
                  if($trang_thai_don_hang == null) {
                      $query = HoaDon::where('ngay_lap_hd','<=',$key_to_day);
                  } else {
                      $query = HoaDon::where('trang_thai_don_hang',$trang_thai_don_hang)
                      ->where('ngay_lap_hd','<=',$key_to_day);
                  }
              }
          } else {
              if(empty($key_to_day)) {
                  if($trang_thai_don_hang == null) {
                      $query = HoaDon::where('ngay_lap_hd','>=',$key_from_day);
                  } else {
                      $query = HoaDon::where('ngay_lap_hd','>=',$key_from_day)
                      ->where('trang_thai_don_hang',$trang_thai_don_hang);
                  }
              } else {
                  if($trang_thai_don_hang == null) {
                      $query = HoaDon::whereBetween('ngay_lap_hd',[$key_from_day,$key_to_day]);
                  } else {
                      $query = HoaDon::where('trang_thai_don_hang',$trang_thai_don_hang)
                      ->whereBetween('ngay_lap_hd',[$key_from_day,$key_to_day]);
                  }
              } 
          }
          $array = ['arrays'=> $query->paginate(5)];
          return view('admin.bill.index',$array);
      } else {
        if(empty($key_from_day)) {
          if(empty($key_to_day)) {
              if($trang_thai_don_hang == null) {
                  $query = HoaDon::where(function($que) use ($key) {
                      $que->where('id','LIKE','%' .$key. '%');
                      $que->orWhere('ho_ten','LIKE','%' .$key. '%');
                  });
              } else {
                  $query = HoaDon::where(function($que) use ($key) {
                      $que->where('id','LIKE','%' .$key. '%');
                      $que->orWhere('ho_ten','LIKE','%' .$key. '%');
                  })
                  ->where('trang_thai_don_hang',$trang_thai_don_hang);
              }
          } else {
              if($trang_thai_don_hang == null) {
                  $query = HoaDon::where(function($que) use ($key) {
                      $que->where('id','LIKE','%' .$key. '%');
                      $que->orWhere('ho_ten','LIKE','%' .$key. '%');
                  })
                  ->where('ngay_lap_hd','<=',$key_to_day);
              } else {
                  $query = HoaDon::where(function($que) use ($key) {
                      $que->where('id','LIKE','%' .$key. '%');
                      $que->orWhere('ho_ten','LIKE','%' .$key. '%');
                  })
                  ->where('trang_thai_don_hang',$trang_thai_don_hang)
                  ->where('ngay_lap_hd','<=',$key_to_day);
              }
          }
      } else {
          if(empty($key_to_day)) {
              if($trang_thai_don_hang == null) {
                  $query = HoaDon::where(function($que) use ($key) {
                      $que->where('id','LIKE','%' .$key. '%');
                      $que->orWhere('ho_ten','LIKE','%' .$key. '%');
                  })
                  ->where('ngay_lap_hd','>=',$key_from_day);
              } else {
                  $query = HoaDon::where(function($que) use ($key) {
                      $que->where('id','LIKE','%' .$key. '%');
                      $que->orWhere('ho_ten','LIKE','%' .$key. '%');
                  })
                  ->where('ngay_lap_hd','>=',$key_from_day)
                  ->where('trang_thai_don_hang',$trang_thai_don_hang);
              }
          } else {
              if($trang_thai_don_hang == null) {
                  $query = HoaDon::where(function($que) use ($key) {
                      $que->where('id','LIKE','%' .$key. '%');
                      $que->orWhere('ho_ten','LIKE','%' .$key. '%');
                  })
                  ->whereBetween('ngay_lap_hd',[$key_from_day,$key_to_day]);
              } else {
                  $query = HoaDon::where(function($que) use ($key) {
                      $que->where('id','LIKE','%' .$key. '%');
                      $que->orWhere('ho_ten','LIKE','%' .$key. '%');
                  })
                  ->where('trang_thai_don_hang',$trang_thai_don_hang)
                  ->whereBetween('ngay_lap_hd',[$key_from_day,$key_to_day]);
              }
          } 
      }
      $array = ['arrays'=> $query->paginate(5)];
      return view('admin.bill.index',$array);
      }
        // if($request->trang_thai_don_hang == null) {
        //     echo "7";
        // } else {
        //     dd($request->trang_thai_don_hang);
        // }
            
        // // dd($request->trang_thai_don_hang);
        // $query = HoaDon::where('trang_thai',1)
        // ->where('id','LIKE','%' .$key. '%');

        // if(!empty($key)){
        //     $query->orWhereHas('taiKhoan', function($query) use ($key) {
        //         $query->where('ho_ten','LIKE','%'.$key.'%');
        //     });
        // }
        // if(!empty($key_from_day) && !empty($key_to_day)){
        //     $query->whereBetween('ngay_lap_hd',[$key_from_day, $key_to_day])
        //     ->orderBy('ngay_lap_hd','ASC');
        // }
        
        // $array = ['arrays'=> $query->paginate(5)];

        // if(!empty($key)){
        //     if(!empty($key_from_day)){
        //         if(!empty($key_to_day)){
        //             $array = ['arrays'=>HoaDon::where('trang_thai',1)
        //             ->where('id','LIKE','%' .$key. '%')
        //             ->orWhereHas('taiKhoan', function($query) use ($key) {
        //                 $query->where('ho_ten','LIKE','%'.$key.'%');
        //             })
        //             ->whereBetween('ngay_lap_hd',[$key_from_day, $key_to_day])->orderBy('ngay_lap_hd','ASC')
        //                     ->get()];
        //         }
        //         else
        //         {
        //             $array = ['arrays'=>HoaDon::where('trang_thai',1)
        //             ->where('id','LIKE','%' .$key. '%')
        //             ->orWhereHas('taiKhoan', function($query) use ($key) {
        //                 $query->where('ho_ten','LIKE','%'.$key.'%');
        //             })
        //             ->get()];
        //         }
        //     }
        //     else
        //     {
        //         $array = ['arrays'=>HoaDon::where('trang_thai',1)
        //             ->where('id','LIKE','%' .$key. '%')
        //             ->orWhereHas('taiKhoan', function($query) use ($key) {
        //                 $query->where('ho_ten','LIKE','%'.$key.'%');
        //             })
        //             ->get()];
        //     }
            
        // }
        // else
        // {
        //     return 'ok';
        // }
                        //  ->whereBetween('ngay_lap_hd',[$key_from_day, $key_to_day])->orderBy('ngay_lap_hd','ASC')
                        //     ->get()];
       
        // return view('admin.bill.index',$array);
    }
    public function myBill() {
      if(Auth::check() && Auth::user()->admin != 1) {
        $array = ['arrays'=>HoaDon::where('tai_khoans_id',Auth::user()->id)->orderBy('ngay_lap_hd', 'DESC')
                                      ->paginate(5)];
        return view('pages.my_order',$array);
      } else {
        return view('pages.login');
      }
    }
    public function myBillDetail($id) {
        $array = ChiTietHoaDon::where('hoa_dons_id', $id)
                                ->with(array('chiTietSanPham' => function($query) {
                                    $query->with(array('sanPham' => function($querys) {
                                        $querys->with(array('anh' => function($que) {
                                            $que->where('anhchinh',1);
                                        }));
                                    }));
                                }))
                                ->get();
        return view('pages.my_bill_detail',compact('array'));
    }
    public function indexStatistic() {

        $sub_30_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();


        $arrays = DB::table('chi_tiet_hoa_dons')
                    ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                    ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                    ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                    ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                    ->where('hoa_dons.trang_thai_don_hang', 4)
                    ->where('hoa_dons.ngay_lap_hd','>=',$sub_30_days)
                    ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                    ->get();
        return view('admin.statistic.index',compact('arrays'));
    }
    public function statistic(Request $request) {
        // dd($request->all());
        if($request->thong_ke_theo != "ko" || !empty($request->key_from_day) || !empty($request->key_to_day)) {
            if($request->thong_ke_theo != "ko") {
                $dau_thang_nay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
                $dau_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
                $cuoi_thang_truoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    
                $sub_7_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();
                $sub_365_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();
    
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
                if($request->thong_ke_theo == '7ngay') {
                    $arrays = DB::table('chi_tiet_hoa_dons')
                            ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                            ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                            ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                            ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                            ->where('hoa_dons.trang_thai_don_hang', 4)
                            ->whereBetween('hoa_dons.ngay_lap_hd',[$sub_7_days, $now])
                            ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                            ->get();
                    
                }
                if($request->thong_ke_theo == 'thangtruoc') {
                    $arrays = DB::table('chi_tiet_hoa_dons')
                            ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                            ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                            ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                            ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                            ->where('hoa_dons.trang_thai_don_hang', 4)
                            ->whereBetween('hoa_dons.ngay_lap_hd',[$dau_thang_truoc, $cuoi_thang_truoc])
                            ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                            ->get();
                    
                }
                if($request->thong_ke_theo == 'thangnay') {
                    $arrays = DB::table('chi_tiet_hoa_dons')
                            ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                            ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                            ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                            ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                            ->where('hoa_dons.trang_thai_don_hang', 4)
                            ->whereBetween('hoa_dons.ngay_lap_hd',[$dau_thang_nay, $now])
                            ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                            ->get();
                    
                }
                if($request->thong_ke_theo == '365ngayqua') {
                    $arrays = DB::table('chi_tiet_hoa_dons')
                            ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                            ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                            ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                            ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                            ->where('hoa_dons.trang_thai_don_hang', 4)
                            ->whereBetween('hoa_dons.ngay_lap_hd',[$sub_365_days, $now])
                            ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                            ->get();
                    
                }
            } else {
                if(!empty($request->key_from_day)) {
                    if(!empty($request->key_to_day)) {
                        $arrays = DB::table('chi_tiet_hoa_dons')
                            ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                            ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                            ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                            ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                            ->where('hoa_dons.trang_thai_don_hang', 4)
                            ->whereBetween('hoa_dons.ngay_lap_hd',[$request->key_from_day, $request->key_to_day])
                            ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                            ->get();
                    } else {
                        $arrays = DB::table('chi_tiet_hoa_dons')
                            ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                            ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                            ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                            ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                            ->where('hoa_dons.trang_thai_don_hang', 4)
                            ->whereDate('hoa_dons.ngay_lap_hd','>=',$request->key_from_day)
                            ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                            ->get();
                    }
                } else {
                    if(!empty($request->key_to_day)) {
                        $arrays = DB::table('chi_tiet_hoa_dons')
                                ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                                ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                                ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                                ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                                ->where('hoa_dons.trang_thai_don_hang', 4)
                                ->whereDate('hoa_dons.ngay_lap_hd','<=',$request->key_to_day)
                                ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                                ->get();
                    } else {
                        $arrays = DB::table('chi_tiet_hoa_dons')
                            ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                            ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                            ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                            ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                            ->where('hoa_dons.trang_thai_don_hang', 4)
                            ->where('hoa_dons.ngay_lap_hd','>=',$sub_30_days)
                            ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                            ->get();
                    }
                }
            }
            $key_from_day = $request->key_from_day;
            $key_to_day = $request->key_to_day;
            $thong_ke_theo = $request->thong_ke_theo;
            return view('admin.statistic.index',compact('arrays','key_from_day','key_to_day','thong_ke_theo'));
        } else {
            return redirect()->route('admin.statistics');
        }
        
        // if($request->key_from_day == null and $request->key_to_day = null and $request->thong_ke_theo == "ko") {
        //     $arrays = DB::table('chi_tiet_hoa_dons')
        //             ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_goc','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
        //             ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
        //             ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
        //             ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_goc','chi_tiet_hoa_dons.gia_ban')
        //             ->get();
        //     echo "1";
        // }
        // else {
        //     echo "2";
        // }
    }
    public function printStatistic() {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_statistic_convert());
        return $pdf->stream();
    }
    public function print_statistic_convert() {
        $sub_30_days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        
        $arrays = DB::table('chi_tiet_hoa_dons')
                    ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                    ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                    ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                    ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                    ->where('hoa_dons.trang_thai_don_hang', 4)
                    ->where('hoa_dons.ngay_lap_hd','>=',$sub_30_days)
                    ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                    ->get();
        return view('admin.statistic.form_print',compact('arrays'));
    }
    public function printStatisticKeyToDay($key_to_day) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_statistic_key_to_day_convert($key_to_day));
        return $pdf->stream();
    }
    public function print_statistic_key_to_day_convert($key_to_day) {
        $arrays = DB::table('chi_tiet_hoa_dons')
                    ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                    ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                    ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                    ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                    ->where('hoa_dons.trang_thai_don_hang', 4)
                    ->whereDate('hoa_dons.ngay_lap_hd','<=',$key_to_day)
                    ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                    ->get();
        return view('admin.statistic.form_print_key_to_day',compact('arrays','key_to_day'));
    }
    public function printStatisticKeyFromDay($key_from_day) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_statistic_key_from_day_convert($key_from_day));
        return $pdf->stream();
    }
    public function print_statistic_key_from_day_convert($key_from_day) {
        $arrays = DB::table('chi_tiet_hoa_dons')
                    ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                    ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                    ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                    ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                    ->where('hoa_dons.trang_thai_don_hang', 4)
                    ->whereDate('hoa_dons.ngay_lap_hd','>=',$key_from_day)
                    ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                    ->get();
        return view('admin.statistic.form_print_key_from_day',compact('arrays','key_from_day'));
    }
    public function printStatisticKeyFromToDay($key_from_day, $key_to_day) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_statistic_key_from_to_day_convert($key_from_day, $key_to_day));
        return $pdf->stream();
    }
    public function printStatisticThongKeTheo($thong_ke_theo) {
        if($thong_ke_theo == '7ngay') {
            $key_from_day = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();
            $key_to_day = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        }
        if($thong_ke_theo == 'thangtruoc') {
            $key_from_day = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
            $key_to_day = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        }
        if($thong_ke_theo == 'thangnay') {
            $key_from_day = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
            $key_to_day = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        }
        if($thong_ke_theo == '365ngayqua') {
            $key_from_day = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();
            $key_to_day = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        }
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_statistic_key_from_to_day_convert($key_from_day, $key_to_day));
        return $pdf->stream();
    }
    public function print_statistic_key_from_to_day_convert($key_from_day, $key_to_day) {
        $arrays = DB::table('chi_tiet_hoa_dons')
                        ->select('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban',DB::raw('SUM(chi_tiet_hoa_dons.so_luong) AS so_luong'))
                        ->join('chi_tiet_san_phams','chi_tiet_hoa_dons.chi_tiet_san_phams_id','=','chi_tiet_san_phams.id')
                        ->join('san_phams','chi_tiet_san_phams.san_phams_id','=','san_phams.id')
                        ->join('hoa_dons','chi_tiet_hoa_dons.hoa_dons_id','=','hoa_dons.id')
                        ->where('hoa_dons.trang_thai_don_hang', 4)
                        ->whereBetween('hoa_dons.ngay_lap_hd',[$key_from_day, $key_to_day])
                        ->groupBy('san_phams.ten_san_pham','chi_tiet_hoa_dons.gia_ban')
                        ->get();
        return view('admin.statistic.form_print_key_from_to_day',compact('arrays','key_from_day','key_to_day'));
    }
}
