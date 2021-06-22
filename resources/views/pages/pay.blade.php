@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/pay.css">
@endsection
@section('content')
<div class="content" style="margin-top: 160px;">
    <div class="wrap">
        <div class="container">
            <?php
            $tongtien = 0;
            ?>
            <form action="{{ route('bill.create') }}" method="POST">
                @csrf
            <div class="row">
                    <?php
                        $contents = Cart::content();
                    ?>
               
                    <div class="col-6">
                        <div class="main">
                            <div class="main-header">
                                <a href=""><h1>P&T SHOP</h1></a>
                            </div>
                            <div class="main-content">
                                <div class="main-title">
                                    <h2>Thông tin giao hàng</h2>
                                </div>
                            <div class="main-customer-info">
                                <div class="main-customer-info-img">
                                    <img src="img/product/noavatar.png" alt="" width="60px" height="60px">
                                </div>
                                @if(Auth::check() and Auth::user()->admin != 1)
                                <div class="main-customer-info-logged">
                                    <p class="main-customer-info-logged-paragraph">{{ Auth::user()->ho_ten }} ({{ Auth::user()->email }})</p>
                                    <a href="{{ route('accounts.logout') }}">Đăng xuất</a>
                                </div>
                            </div>
                            <div class="fieldset">
                                @if(Auth::user()->dia_chi == null)
                                <div class="fieldset-address">
                                    <label class="form-label" for="">Địa chỉ</label>
                                    <input type="text" class="form-control">
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
                                @endif
                                @if(Auth::user()->so_dien_thoai == null)
                                <div class="fieldset-phone">
                                    <label class="form-label" for="">Số điện thoại</label>
                                    <input type="text" class="form-control">
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
                                @endif
                            </div>
                                @else
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
                        <div class="main-footer">
                            <div class="continue">
                                <a href="">
                                    <i class="fi-rs-angle-left"></i>
                                    Giỏ hàng
                                </a>
                            </div>
                            <div class="pay">
                                <button class="btn-pay">Thanh toán</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-6" style="background-color:#f3f3f3;">
                    <div class="sliderbar">
                        <div class="sliderbar-header">
                            <h2>Thông tin đơn hàng</h2>
                        </div>
                        <div class="sliderbar-content">
                            <div class="row row-sliderbar">
                                @foreach($contents as $content)
                        <?php
                        $tongtien +=($content->price * $content->qty);
                       ?>
                                <div class="col-4">
                                    <img src="{{asset(getLink('product',$content->options->image))}}" alt="" width="80%">
                                    <span class="notice">{{ $content->qty }}</span>
                                </div>
                                <div class="col-5">
                                    <h5>{{ $content->name }}</h5>
                                </div>
                                <div class="col-3">
                                    <h4 style="font-size:12px">{{number_format($content->price * $content->qty,0,',','.').' '.'VNĐ'}}</h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="slider-footer">
                            <div class="subtotal">
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Tạm tính:</span></div>
                                    <div class="col-6 text-right"><span>{{number_format($tongtien,0,',','.').' '.'VNĐ'}}</span></div>
                                </div>
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Phí vận chuyển</span></div>
                                    <div class="col-6 text-right"><span></span></div>
                                </div>
                            </div>
                            <div class="total">
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Tổng cộng:</span></div>
                                    <div class="col-6 text-right"><span>{{number_format($tongtien,0,',','.').' '.'VNĐ'}}</span></div>
                                </div>
                            </div>
                            @php
                            $vnd_to_usd = ($content->price * $content->qty)/23083;
                            @endphp
                            <div>
                                <div id="paypal-button"></div>
                                <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
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
<script src="js/main.js"></script>
@endsection