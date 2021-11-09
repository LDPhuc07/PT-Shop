<div class="alert__heading">

      <h4>Thêm vào giỏ hàng</h4>
</div>
@if(Auth::check() and Auth::user()->admin != 1)
      <div class="alert__body">
            @foreach($arrays->chiTietSanPham->sanPham->anh as $anh)
                  <img src="{{asset($anh->link)}}" alt="" class="alert__body-img">
            @endforeach
            
            <div>
            <h3 class="alert__body-name">{{ $arrays->chiTietSanPham->sanPham->ten_san_pham }}</h3>
            <div style="display:flex;justify-content: space-between;">
              <h4 style="font-size: 16px;margin-right: 10px">Màu: {{ $arrays->chiTietSanPham->mau }}</h4>
              <h4 style="font-size: 16px">Size: {{ $arrays->chiTietSanPham->kich_thuoc }}</h4>
            </div>
            <h4 class="alert__body-amount">Số lượng: {{ $arrays->so_luong }}</h4>
            <h4 class="alert__body-price">{{number_format($arrays->chiTietSanPham->sanpham->gia_ban*(100-$arrays->chiTietSanPham->sanpham->giam_gia)/100,0,',','.').' '.'VNĐ'}}</h4>
            </div>
      </div>
      <div class="alert__footer">
            <a href="{{ route('cart.index') }}" class="click__cart" style="border-radius: 4px">Xem giỏ hàng</a>
      </div>
@else
      @foreach($arrays as $array)
      <div class="alert__body">
            <img src="{{asset(getLink('product',$array->options->image))}}" alt="" class="alert__body-img">
            <div>
            <h5 class="alert__body-name">{{ $array->name }}</h5>
            <div style="display:flex;justify-content: space-between;">
              <span>Màu: {{ $arrays->chiTietSanPham->mau }}</span>
              <span>Size: {{ $arrays->chiTietSanPham->kich_thuoc }}</span>
            </div>
            <span class="alert__body-amount">Số lượng: {{ $array->qty }}</span>
            <h6 class="alert__body-price">{{number_format($array->price,0,',','.').' '.'VNĐ'}}</h6>
            </div>
      </div>
      <div class="alert__footer">
            <a href="{{ route('cart.index') }}" class="click__cart">Xem giỏ hàng</a>
      </div>
      @endforeach
@endif
