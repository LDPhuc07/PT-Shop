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
          $dem = 0;
        ?>
        @foreach($contents as $content)
          <?php $dem++ ?>
        @endforeach
        <div id="cart-body-row" class="row cart-body-row">
        @if($dem != 0)
        @foreach($contents as $content)
        <?php
          $tongtien +=($content->price * $content->qty);
         ?>
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
          @endforeach
          @else
          <h3 style="text-align:center;font-size: 20px; padding:25px 0;margin-left: 233px;">Giỏ hàng của bạn đang trống</h3>
          @endif
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