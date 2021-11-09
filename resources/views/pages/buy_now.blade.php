@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/pay.css">
@endsection
@section('content')
<style>
    .btn-pay {
        background-color: black;
        color: white;
    }
    .mess-pay {
        color: red;
        font-size: 13px;
    }
    .fieldset-phone,
    .fieldset-address
    {
      margin-bottom: 18px;
    }
    /* Mobile & tablet  */
    @media (max-width: 1023px) {
        .summary {
            display: block;
        }
    }

    /* tablet */
    @media (min-width: 740px) and (max-width: 1023px) {}

    /* mobile */
    @media (max-width: 739px) {}
</style>
<div class="content">
    <div class="wrap">
        <div class="container">
            <form action="{{ route('bill.createBuyNow') }}" method="POST">
                @csrf
                <div div class="row">
                    <div class="summary col-lg-6 col-12 hidden">
                        <div class="summary-heading">
                            <div class="summary-heading-title">
                                <h4>Thông tin đơn hàng</h4>
                            </div>
                            <div class="summary-heading-price">
                                <h4>
                                    <i class="fas fa-chevron-down" style="margin-left: 20px;margin-right: 5px;"></i>
                                </h4>
                            </div>
                        </div>
                        <div class="summary-content hidden">
                            <div class="sliderbar">
                                <div class="sliderbar-header">
                                    <h2>Thông tin đơn hàng</h2>
                                </div>
                                <div class="sliderbar-content">
                                    <div class="row row-sliderbar">
                                        @if(Session::has('ten_san_pham'))
                                        <div class="col-4">
                                            <img src="{{asset(getLink('product',$data['anh']))}}" alt="" width="80%">
                                            <span class="notice">{{ $data['so_luong'] }}</span>
                                        </div>
                                        <div class="col-5">
                                            <h5>{{ $data['ten_san_pham'] }}</h5>
                                        </div>
                                        <div class="col-3">
                                            <h4 style="font-size:12px">{{number_format($data['gia'] * $data['so_luong'],0,',','.').' '.'VNĐ'}}</h4>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="slider-footer">
                                    <div class="subtotal">
                                        <div class="row row-sliderbar-footer">
                                            <div class="col-6"><span>Tạm tính:</span></div>
                                            <div class="col-6 text-right">
                                                @if(Session::has('ten_san_pham'))
                                                <span>{{number_format($data['gia'] * $data['so_luong'],0,',','.').' '.'VNĐ'}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row row-sliderbar-footer">
                                            <div class="col-6"><span>Phí vận chuyển</span></div>
                                            <div class="col-6 text-right"><span></span></div>
                                        </div>
                                    </div>
                                    <?php $tongtien = 0 ?>
                                    <div class="total">
                                        <div class="row row-sliderbar-footer">
                                            <div class="col-6"><span>Tổng cộng:</span></div>
                                            <div class="col-6 text-right">
                                                @if(Session::has('ten_san_pham'))
                                                <span>{{number_format($data['gia'] * $data['so_luong'],0,',','.').' '.'VNĐ'}}</span>
                                                <?php $tongtien = $data['gia'] * $data['so_luong'] ?>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                    $vnd_to_usd = $tongtien;
                                    @endphp
                                    <div>
                                        <div id="paypal-button"></div>
                                        <input type="hidden" id="vnd_to_usd" value="{{$vnd_to_usd}}" name="online">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="main">
                            <div class="main-header">
                                <a href=""><h1>P&T SHOP</h1></a>
                            </div>
                            <div class="main-content">
                                <div class="main-title">
                                    <h2>Thông tin giao hàng</h2>
                                </div>
                            <div class="main-customer-info">
                                
                                @if(Auth::check() and Auth::user()->admin != 1)
                                
                                    
                                 
                            </div>
                            <div class="fieldset">
                                  <div class="fieldset-address">
                                        <label class="form-label" for="">Tên khách hàng</label>
                                        <input type="text" name="ho_ten" class="form-control" value="{{ Auth::user()->ho_ten}}">
                                    @if($errors->has('ho_ten'))
                                        <span style="font-size: 13px; color:red">
                                        <i class="fas fa-times"></i>
                                        {{ $errors->first('ho_ten') }}
                                        </span>
                                        <style>
                                            input[name = 'ho_ten'] {
                                                border: 1px solid red;
                                            }
                                        </style>
                                    @endif
                                   
                                <div class="fieldset-phone">
                                    <label class="form-label" for="">Số điện thoại</label>
                                    <input type="text" class="form-control" name="so_dien_thoai" value="{{ Auth::user()->so_dien_thoai}}">
                                    @if($errors->has('so_dien_thoai'))
                                    <span style="font-size: 13px; color:red">
                                    <i class="fas fa-times"></i>
                                    {{ $errors->first('so_dien_thoai') }}
                                    </span>
                                    <style>
                                        input[name = 'so_dien_thoai'] {
                                            border: 1px solid red;
                                        }
                                    </style>
                                @endif
                                </div>
                                {{-- @endif --}}
                              </div>
                              <div class="fieldset-address">
                                  <label class="form-label" for="">Địa chỉ</label>
                                  <input type="text" class="form-control" name="dia_chi" value="{{ Auth::user()->dia_chi}}">
                              @if($errors->has('dia_chi'))
                                  <span style="font-size: 13px; color:red">
                                  <i class="fas fa-times"></i>
                                  {{ $errors->first('dia_chi') }}
                                  </span>
                                  <style>
                                      input[name = 'dia_chi'] {
                                          border: 1px solid red;
                                      }
                                  </style>
                              @endif
                              </div>
                            </div>
                                @else
                                <?php
                                  if(!Auth::check())
                                  {
                                      Session::put('url previous',url()->current());
                                  }
                                ?>
                                <div class="main-customer-info-logged">
                                    <a href="{{ route('accounts.login') }}">Đăng nhập</a>
                                </div>
                            </div>
                            <div class="fieldset">
                                <div class="fieldset-name">
                                    <label class="form-label" for="">Họ tên</label>
                                    <input type="text" name="ho_ten" class="form-control">
                                    @if($errors->has('ho_ten'))
                                    <span  style="font-size: 13px; color:red">
                                    <i class="fas fa-times"></i>
                                    {{ $errors->first('ho_ten') }}
                                    </span>
                                    <style>
                                        input[name = 'ho_ten'] {
                                            border: 1px solid red;
                                        }   
                                    </style>
                                    @endif
                                </div>
                                <div class="fieldset-address">
                                    <label class="form-label" for="">Địa chỉ</label>
                                    <input type="text" name="dia_chi" class="form-control">
                                    @if($errors->has('dia_chi'))
                                    <span style="font-size: 13px; color:red">
                                    <i class="fas fa-times"></i>
                                    {{ $errors->first('dia_chi') }}
                                    </span>
                                    <style>
                                        input[name = 'dia_chi'] {
                                            border: 1px solid red;
                                        }
                                    </style>
                                    @endif
                                </div>
                                <div class="fieldset-phone">
                                    <label class="form-label" for="">Số điện thoại</label>
                                    <input type="text" name="so_dien_thoai" class="form-control">
                                    @if($errors->has('so_dien_thoai'))
                                    <span style="font-size: 13px; color:red">
                                    <i class="fas fa-times"></i>
                                    {{ $errors->first('so_dien_thoai') }}
                                    </span>
                                    <style>
                                        input[name = 'so_dien_thoai'] {
                                            border: 1px solid red;
                                        }
                                    </style>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        <div style="margin-top:20px;font-size: 16px;color:black">
                            <label for="" style="font-weight:bold">Chọn Phương thức thanh toán:</label>
                            
                            <br>
                            <span class="mess-pay hidden"><i>*Vui lòng chọn phương thức thanh toán trước khi thanh toán</i></span>
                            <div style="display:flex;align-items: center;">
                                <input type="radio" name="payment" value="0" style="margin-right:5px" class="tttructiep">
                                <span>Thanh toán trực tiếp</span>
                            </div>
                            <div style="display:flex;justify-content: space-between;">
                                <div style="display:flex;align-items: center;">
                                    <input type="radio" name="payment" value="1" style="margin-right:5px" class="ttonline">
                                    <span>Thanh toán online</span>
                                </div>
                                <img src="{{asset(getLink('logo','vn.png'))}}" alt="" style="width:50%;height:50px">
                            </div>
                            
                        </div>
                        <div class="main-footer">
                            <div class="continue">
                                <a href="">
                                    <i class="fi-rs-angle-left"></i>
                                    Giỏ hàng
                                </a>
                            </div>
                            <div class="pay">
                                @if(Session::has('ten_san_pham'))
                                <button type="button" class="btn-pay submit_id">Thanh toán</button>
                                @else
                                <button type="button" class="btn-pay">Thanh toán</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 hidden-sm hidden-xs" style="background-color:#f3f3f3;">
                    <div class="sliderbar">
                        <div class="sliderbar-header">
                            <h2>Thông tin đơn hàng</h2>
                        </div>
                        <div class="sliderbar-content">
                            <div class="row row-sliderbar">
                                @if(Session::has('ten_san_pham'))
                                <div class="col-4">
                                    <img src="{{asset(getLink('product',$data['anh']))}}" alt="" width="80%">
                                    <span class="notice">{{ $data['so_luong'] }}</span>
                                </div>
                                <div class="col-5">
                                    <h5>{{ $data['ten_san_pham'] }}</h5>
                                </div>
                                <div class="col-3">
                                    <h4 style="font-size:12px">{{number_format($data['gia'] * $data['so_luong'],0,',','.').' '.'VNĐ'}}</h4>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="slider-footer">
                            <div class="subtotal">
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Tạm tính:</span></div>
                                    <div class="col-6 text-right">
                                        @if(Session::has('ten_san_pham'))
                                        <span>{{number_format($data['gia'] * $data['so_luong'],0,',','.').' '.'VNĐ'}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Phí vận chuyển</span></div>
                                    <div class="col-6 text-right"><span></span></div>
                                </div>
                            </div>
                            <?php $tongtien = 0 ?>
                            <div class="total">
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Tổng cộng:</span></div>
                                    <div class="col-6 text-right">
                                        @if(Session::has('ten_san_pham'))
                                        <span>{{number_format($data['gia'] * $data['so_luong'],0,',','.').' '.'VNĐ'}}</span>
                                        <?php $tongtien = $data['gia'] * $data['so_luong'] ?>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @php
                            $vnd_to_usd = $tongtien;
                            @endphp
                            <div>
                                <div id="paypal-button"></div>
                                <input type="hidden" id="vnd_to_usd" value="{{$vnd_to_usd}}" name="online">
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection