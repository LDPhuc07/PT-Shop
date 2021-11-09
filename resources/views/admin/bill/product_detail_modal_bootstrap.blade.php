<table style="min-width: unset" class="table-ds-sanpham">
    <thead>
        <tr>
            <th>Mã hóa đơn</th>
            <th>Ảnh</th>
            <th>Tên Sản Phẩm</th>
            <th>Màu</th>
            <th>Kích cỡ</th>
            <th>Giá bán</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
      @foreach($arrays as $bill_detail)
      <tr>
          <td>{{ $bill_detail->hoa_dons_id}}</td>
          <td>@foreach($bill_detail->chiTietSanPham->sanPham->anh as $anh)
            @if($anh->anhchinh == 1)
              <img src="{{asset($anh->link)}}" alt="anh">
            @endif
          @endforeach</td>
          <td>{{ $bill_detail->chiTietSanPham->sanPham->ten_san_pham}}</td>
          <td>{{ $bill_detail->chiTietSanPham->mau }}</td>
          <td>{{ $bill_detail->chiTietSanPham->kich_thuoc }}</td>
          <td>{{number_format(($bill_detail->chiTietSanPham->sanPham->gia_ban*(100-$bill_detail->chiTietSanPham->sanPham->giam_gia)/100),0,',','.').' '.'VNĐ'}}</td>
          <td>{{ $bill_detail->so_luong}}</td>
          <td>{{number_format(($bill_detail->chiTietSanPham->sanPham->gia_ban*(100-$bill_detail->chiTietSanPham->sanPham->giam_gia)/100) * $bill_detail->so_luong,0,',','.').' '.'VNĐ'}}</td>
      </tr>
      @endforeach
  </tbody>
</table>