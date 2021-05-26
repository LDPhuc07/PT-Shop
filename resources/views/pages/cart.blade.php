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
                        $contents = Cart::content();
                        $total = Cart::subtotal();
                      ?>
                      @foreach($contents as $content)
                          <div class="row cart-body-row">
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
                                        <div class="cart-quantity">
                                            <input type="button" value="-" class="control" onclick="truSoLuong()">
                                            <input type="text"  value="{{ $content->qty }}" class="text-input" name="quantity" id="textsoluong"> 
                                            <input type="button" value="+" class="control" onclick="congSoLuong()">
                                        </div>
                                      </div>
                                      <div class="col-3 center">
                                        <span>{{number_format($content->price * $content->qty,0,',','.').' '.'VNĐ'}}</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-1 center" onclick="xoasanpham()">
                                <span class="delete-btn"><a href="{{ route('cart.deleteItem',$content->rowId) }}"><i data-target="#sanpham" data-toggle="modal" data-id="3" class="fas fa-trash" style="cursor: pointer;"></i></a></span> 
                            </div>
                          </div>
                          @endforeach


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
                      <div class="row">
                        <div class="cart-total col-12">
                          <label for="">Thành tiền:</label>
                          <span class="total__price">{{$total.' VNĐ'}}</span>
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
  <script>
      function xoasanpham(){

      }
  </script>
   <script>
    function congSoLuong(){
      var result = document.getElementById('textsoluong').value;
      document.getElementById('textsoluong').value = parseInt(result) + 1;

      {{--  $.ajax({
        type: 'GET',
        cache: false,
        url: "{{ route('cart.updateItem') }}",
        data: {
          "id":$("#inputId").val(),
          "qty":$("inputQty").val(),
        },
        success: function(data) {
          $('#cart-body').html(data);
          console.log('Cập nhật thành công')
        },
        error: function(data) {
          console.log('Lỗi rồi');
          console.log(data);
        },
      });  --}}
    }
    function truSoLuong(){
      var result = document.getElementById('textsoluong').value;
      if(parseInt(result)>1){
        document.getElementById('textsoluong').value = parseInt(result) - 1;
      }
      
    }
</script>
@endsection