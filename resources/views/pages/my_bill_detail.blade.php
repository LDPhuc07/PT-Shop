{{--  <div class="body-one">
            <div>Tổng tiền: 3.000.000 VNĐ</div>
            <div>Giá đã giảm: 1.000.000 VNĐ</div>
            <div>Phí ship: 30.000 VNĐ</div>
            <div>Thành Tiền: 3.000.000 VNĐ</div>
          </div>  --}}
          <form action="">
            <div class="my-order-heading">
              <div class="row" style="text-align:center">
                <div class="col-4">Sản phẩm</div>
                <div class="col-1">Số lượng</div>
                <div class="col-3">Giá</div>
                <div class="col-1">Giảm giá</div>
                <div class="col-3">Thành tiền</div>
              </div>
            </div>
            @foreach($array as $bill_detail)
                <div class="body-two">
                    <div class="row" style="text-align:center; margin-top:10px">
                        <div class="col-4" style="display: flex;">
                        @foreach($bill_detail->chiTietSanPham->sanPham->anh as $anh)
                        <img src="{{asset($anh->link)}}" alt="" style="width: 50px;height: 50px;margin-right: 5px;">
                        @endforeach
                          <div>
                            <h5>{{ $bill_detail->chiTietSanPham->sanPham->ten_san_pham }}</h5>
                            <span>Màu: {{ $bill_detail->chiTietSanPham->mau }}</span>
                            <br/>
                            <span>Kích thước: {{ $bill_detail->chiTietSanPham->kich_thuoc }}</span>
                          </div>
                        </div>
                        <div class="col-1">{{ $bill_detail->so_luong }}</div>
                        <div class="col-3">{{number_format($bill_detail->chiTietSanPham->sanPham->gia_ban,0,',','.').' '.'VNĐ'}}</div>
                        <div class="col-1">{{ $bill_detail->chiTietSanPham->sanPham->giam_gia }}%</div>
                        <div class="col-3">{{number_format(($bill_detail->chiTietSanPham->sanPham->gia_ban*(100-$bill_detail->chiTietSanPham->sanPham->giam_gia)/100) * $bill_detail->so_luong,0,',','.').' '.'VNĐ'}}</div>
                    </div>
                </div>
            @endforeach
          </form>