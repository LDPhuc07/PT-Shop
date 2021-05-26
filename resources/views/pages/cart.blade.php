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
              <?php
               $contents = Cart::content();
               $total = Cart::subtotal();
               print_r($contents);
               echo 'prev';
                print_r($total);
               ?>
              <form action="" class="form-cart">
                  <div class="cart-body-left">
                      <div class="cart-heding">
                          <div class="row cart-row">
                              <div class="col-11">
                                  <div class="row">
                                      <div class="col-5 center">Sản phẩm</div>
                                      <div class="col-2 center">Đơn giá</div>
                                      <div class="col-2 center">Số lượng</div>
                                      <div class="col-3 center">Thành tiền</div>
                                  </div>
                              </div>
                              <div class="col-1"></div>
                          </div>
                      </div>
                      <div class="cart-body">
                          @foreach($contents as $content)
                          <div class="row cart-body-row">
                              <div class="col-11">
                                  <div class="row">
                                      <div class="col-2 center">
                                          <a href=""><img class="cart-img" src="{{asset(getLink('product',$content->options->image))}}" alt=""></a>
                                          {{ $content->options->color }}
                                      </div>
                                      <div class="col-3 center">
                                          <a href="" class="cart-name" ><h5>{{ $content->name }}</h5></a>
                                      </div>
                                      <div class="col-2 center">
                                          <span>{{number_format($content->price,0,',','.').' '.'VNĐ'}}</span>
                                      </div>
                                      <div class="col-2 center">
                                        <div class="cart-quantity">
                                            <input type="button" value="-" class="control">
                                            <input type="text" value="{{ $content->qty }}" class="text-input"> 
                                            <input type="button" value="+" class="control">
                                        </div>
                                      </div>
                                      <div class="col-3 center">
                                        <span>{{number_format($content->price * $content->qty,0,',','.').' '.'VNĐ'}}</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-1 center" >
                                <span class="delete-btn"><a href="{{ route('cart.deleteItem',$content->rowId) }}"><i class="fas fa-trash" style="cursor: pointer;"></i></a></span> 
                            </div>
                            @endforeach
                          </div>
                          
                        {{--  </div>  --}}
                        {{--  <div class="row cart-body-row">
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-2 center">
                                        <a href=""><img class="cart-img" src="img/product/addidas1.jpg" alt=""></a>
                                    </div>
                                    <div class="col-3 center">
                                        <a href="" class="cart-name" ><h5>ÁO THỦ MÔN ĐTVN 2021 GRAND SPORT - 038-322 - VÀNG CAM</h5></a>
                                    </div>
                                    <div class="col-2 center">
                                        <span>625,000₫</span>
                                    </div>
                                    <div class="col-2 center">
                                      <div class="cart-quantity">
                                          <input type="button" value="-" class="control">
                                          <input type="text" value="1" class="text-input"> 
                                          <input type="button" value="+" class="control">
                                      </div>
                                    </div>
                                    <div class="col-3 center">
                                      <span>625,000₫</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1 center" onclick="xoasanpham()">
                                <span class="delete-btn"><i data-target="#sanpham" data-toggle="modal" data-id="3" class="fas fa-trash" style="cursor: pointer;"></i></span> 
                            </div>
                        </div>  --}}


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
                          <a href="{{ route('checkout.index') }}" class="chekout">Thanh toán</a>
                      </div>
                  </div>
              </form>
          </div>
        </div>
    </div>
  </div>
     <!-- The Modal -->
     <div class="modal fade" id="sanpham">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="color:red">Cảnh báo</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              Bạn có chắc muốn xóa
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="monthethao" style="background-color:red;color:white">confirm</button>
            </div>
            
          </div>
        </div>
      </div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  {{-- <script>
      {{-- function xoasanpham(){

      } --}}
      $("#delete-item-cart").click(function() {
        $.ajax({
            url: 'cart/delete-item/'+$(this).data("id"),
            type: 'GET',
        }).done(function(response){
           
        });
      });
  </script> --}}
@endsection