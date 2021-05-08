@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/cart.css">
@endsection
@section('content')
<div class="cart" style="margin-top: 160px;">
    <div class="container">
        <div class="cart-wrap">
          <div class="cart-content">
              <form action="" class="form-cart">
                  <div class="cart-body-left">
                      <div class="cart-heding">
                          <div class="row cart-row">
                              <div class="col-1"></div>
                              <div class="col-11">
                                  <div class="row">
                                      <div class="col-5">Sản phẩm</div>
                                      <div class="col-2">Đơn giá</div>
                                      <div class="col-3">Số lượng</div>
                                      <div class="col-2">Thành tiền</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="cart-body">
                          <div class="row cart-body-row">
                              <div class="col-1 text-right">
                                  <a href=""><i class="fi-rs-cross"></i></a>
                              </div>
                              <div class="col-11">
                                  <div class="row">
                                      <div class="col-2">
                                          <a href=""><img class="cart-img" src="img/product/addidas1.jpg" alt=""></a>
                                      </div>
                                      <div class="col-3">
                                          <a href="" class="cart-name" ><h5>ÁO THỦ MÔN ĐTVN 2021 GRAND SPORT - 038-322 - VÀNG CAM</h5></a>
                                      </div>
                                      <div class="col-2">
                                          <span>625,000₫</span>
                                      </div>
                                      <div class="col-3">
                                        <div class="cart-quantity">
                                            <input type="button" value="-" class="control">
                                            <input type="text" value="1" class="text-input"> 
                                            <input type="button" value="+" class="control">
                                        </div>
                                      </div>
                                      <div class="col-2">
                                        <span>625,000₫</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row cart-body-row">
                            <div class="col-1 text-right">
                                <a href=""><i class="fi-rs-cross"></i></a>
                            </div>
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-2">
                                        <a href=""><img class="cart-img" src="img/product/addidas1.jpg" alt=""></a>
                                    </div>
                                    <div class="col-3">
                                        <a href="" class="cart-name" ><h5>ÁO THỦ MÔN ĐTVN 2021 GRAND SPORT - 038-322 - VÀNG CAM</h5></a>
                                    </div>
                                    <div class="col-2">
                                        <span>625,000₫</span>
                                    </div>
                                    <div class="col-3">
                                      <div class="cart-quantity">
                                          <input type="button" value="-" class="control">
                                          <input type="text" value="1" class="text-input"> 
                                          <input type="button" value="+" class="control">
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <span>625,000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row cart-body-row">
                            <div class="col-1 text-right">
                                <a href=""><i class="fi-rs-cross"></i></a>
                            </div>
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-2">
                                        <a href=""><img class="cart-img" src="img/product/addidas1.jpg" alt=""></a>
                                    </div>
                                    <div class="col-3">
                                        <a href="" class="cart-name" ><h5>ÁO THỦ MÔN ĐTVN 2021 GRAND SPORT - 038-322 - VÀNG CAM</h5></a>
                                    </div>
                                    <div class="col-2">
                                        <span>625,000₫</span>
                                    </div>
                                    <div class="col-3">
                                      <div class="cart-quantity">
                                          <input type="button" value="-" class="control">
                                          <input type="text" value="1" class="text-input"> 
                                          <input type="button" value="+" class="control">
                                      </div>
                                    </div>
                                    <div class="col-2">
                                      <span>625,000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="cart-footer">
                          <div class="row cart-footer-row">
                              <div class="col-1"></div>
                              <div class="col-11 continue">
                                  <a href="">
                                    <i class="fi-rs-angle-left"></i>
                                    Tiếp tục mua sắm
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="cart-body-right">
                      <div class="cart-total">
                          <label for="">Thành tiền:</label>
                          <span class="total__price">1,415,000₫</span>
                      </div>
                      <div class="cart-buttons">
                          <button class="chekout">Thanh toán</button>
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