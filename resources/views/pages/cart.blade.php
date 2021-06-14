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
          <div id="cart-content" class="cart-content">
              <form action="" id="form-cart" class="form-cart">
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
                      <div id="cart-body" class="cart-body">
                      <?php
                      $tongtien = 0;
                        $contents = Cart::content();
                      ?>
                      @foreach($contents as $content)
                      <?php
                        $tongtien +=($content->price * $content->qty);
                       ?>
                          <div id="cart-body-row" class="row cart-body-row">
                              <div class="col-11">
                                  <div class="row">
                                      <div class="col-2 center">
                                          <a href=""><img class="cart-img" src="{{asset(getLink('product',$content->options->image))}}" alt=""></a>
                                      </div>
                                      <div class="col-3 center">
                                          <a href="" class="cart-name" >
                                              <h5>{{ $content->name }}</h5>
                                              <div style="display:flex;justify-content: space-between;">
                                                <span>Màu: {{ $content->options->color }}</span>
                                                <span>Size: {{ $content->options->size }}</span>
                                              </div>
                                          </a>
                                      </div>
                                      <div class="col-2 center">
                                          <span>{{number_format($content->price,0,',','.').' '.'VNĐ'}}</span>
                                      </div>
                                      <div class="col-2 center">
                                       
                                        <div class="cart-quantity cart-{{$content->rowId}}">
                                            <input type="button" value="-" class="control" onclick="truSoLuong(`{{ $content->rowId }}`)">
                                            <input type="text"  value="{{ $content->qty }}" class="text-input" name="quantity" id="textsoluong"> 
                                            <input type="button" value="+" class="control" onclick="congSoLuong(`{{ $content->rowId }}`,{{ $content->options->qty_original }})">
                                        </div>
                                      </div>
                                      <div class="col-3 center">
                                        <span>{{number_format($content->price * $content->qty,0,',','.').' '.'VNĐ'}}</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-1 center" onclick="xoasanpham(`{{ $content->rowId }}`)">
                                <span class="delete-btn"><a href="javascript:"><i data-target="#sanpham" data-toggle="modal" data-id="3" class="fas fa-trash" style="cursor: pointer;"></i></a></span> 
                            </div>
                          </div>
                          
                          @endforeach


                      </div>
                      {{-- layout chưa có sản phẩm --}}
                      {{-- <div class="cart-body">
                        <h3 style="text-align:center;font-size: 20px; padding:25px 0">Giỏ hàng của bạn đang trống</h3>
                      </div> --}}
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
                      <div class="row">
                        <div class="cart-total col-12">
                          <label for="">Thành tiền:</label>
                          <span class="total__price">{{number_format($tongtien,0,',','.').' '.'VNĐ'}}</span>
                      </div>
                      <div class="cart-buttons col-12">
                          <a href="{{ route('checkout.index') }}" class="chekout">Thanh toán</a>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
  <script>
      function xoasanpham(id){
        $.ajax({
          url: 'cart/delete-item-ajax/'+id,
          type: 'GET',
        }).done(function(response) {
          $("#cart-content").empty();
          $("#cart-content").html(response);
        });
      }
  </script>
   <script>
    function congSoLuong(id, sl){
      if(document.querySelector(`.cart-${id} #textsoluong`).value < sl) {
        var result = document.querySelector(`.cart-${id} #textsoluong`).value;
        document.querySelector(`.cart-${id} #textsoluong`).value = parseInt(result) + 1;

        $.ajax({
          type: 'GET',
          url: "cart/update-item/"+id+"/"+document.querySelector(`.cart-${id} #textsoluong`).value,
        }).done(function(response) {
          $("#cart-content").empty();
          $("#cart-content").html(response);
        }); 
      }
    }
    function truSoLuong(id){
      var result = document.querySelector(`.cart-${id} #textsoluong`).value;
      if(parseInt(result)>1){
        document.querySelector(`.cart-${id} #textsoluong`).value = parseInt(result) - 1;
        $.ajax({
          type: 'GET',
          url: "cart/update-item/"+id+"/"+document.querySelector(`.cart-${id} #textsoluong`).value,
        }).done(function(response) {
          $("#cart-content").empty();
          $("#cart-content").html(response);
        }); 
      }
      
    }
</script>
@endsection