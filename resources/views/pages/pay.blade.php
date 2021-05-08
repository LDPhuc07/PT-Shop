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
            <div class="row">
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
                                <div class="main-customer-info-logged">
                                    <p class="main-customer-info-logged-paragraph">Quốc Trung (nguyenquoctrung@gmail.com)</p>
                                    <a href="">Đăng xuất</a>
                                </div>
                            </div>
                            <div class="fieldset">
                                <div class="fieldset-address">
                                    <label class="form-label" for="">Địa chỉ</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="fieldset-name">
                                    <label class="form-label" for="">Họ tên</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="fieldset-phone">
                                    <label class="form-label" for="">Số điện thoại</label>
                                    <input type="text" class="form-control">
                                </div>
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
                                <div class="col-4">
                                    <img src="img/product/stansmith.jpg" alt="" width="80%">
                                    <span class="notice">3</span>
                                </div>
                                <div class="col-6">
                                    <h5>ÁO THỦ MÔN ĐTVN 2021 GRAND SPORT - 038-322 - VÀNG CAM</h5>
                                </div>
                                <div class="col-2">
                                    <span>625,000₫</span>
                                </div>
                            </div>
                            <div class="row row-sliderbar">
                                <div class="col-4">
                                    <img src="img/product/stansmith.jpg" alt="" width="80%">
                                    <span class="notice">3</span>
                                </div>
                                <div class="col-6">
                                    <h5>ÁO THỦ MÔN ĐTVN 2021 GRAND SPORT - 038-322 - VÀNG CAM</h5>
                                </div>
                                <div class="col-2">
                                    <span>625,000₫</span>
                                </div>
                            </div>
                        </div>
                        <div class="slider-footer">
                            <div class="subtotal">
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Tạm tính:</span></div>
                                    <div class="col-6 text-right"><span>625,000₫</span></div>
                                </div>
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Phí vận chuyển</span></div>
                                    <div class="col-6 text-right"><span>625,000₫</span></div>
                                </div>
                            </div>
                            <div class="total">
                                <div class="row row-sliderbar-footer">
                                    <div class="col-6"><span>Tổng cộng:</span></div>
                                    <div class="col-6 text-right"><span>625,000₫</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="js/main.js"></script>
@endsection