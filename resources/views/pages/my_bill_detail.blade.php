{{--  <div class="body-one">
            <div>Tổng tiền: 3.000.000 VNĐ</div>
            <div>Giá đã giảm: 1.000.000 VNĐ</div>
            <div>Phí ship: 30.000 VNĐ</div>
            <div>Thành Tiền: 3.000.000 VNĐ</div>
          </div>  --}}
       
<style>
  .table-ds-sanpham {
    width: 100%;
  }
  .table-ds-sanpham tbody tr {
    background-color: #fafafa;
  }

  .table-ds-sanpham > thead > tr > th:first-of-type, .table-ds-sanpham > tbody > tr > td:first-of-type {
    padding-left: 24px;
  }
  .table-ds-sanpham > thead > tr > th, .table-ds-sanpham > tbody > tr > td {
    padding: 12px;
    font-size: 13px;
  }

  .table-ds-sanpham thead th {
    border-bottom: 1px solid #dee2e6;
    border-top: 1px solid #dee2e6;
    font-weight: 600;
    }

    .table-ds-sanpham tbody td img {
      height: 35px;
      width: 35px;
      object-fit: cover;
    }
    .modal-body {
      padding: unset;
    }
    @media (min-width: 576px){
      .modal-dialog {
        max-width: 700px;
      }
    }
</style>

            {{-- <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sản phẩm</th>
                  <th>Màu</th>
                  <th>Kích thước</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                @foreach($array as $bill_detail)
                  <tr>
                    <td>
                      @foreach($bill_detail->chiTietSanPham->sanPham->anh as $anh)
                        <img src="{{asset($anh->link)}}" alt="" style="width: 50px;height: 50px;margin-right: 5px;">
                      @endforeach
                      <h5>{{ $bill_detail->chiTietSanPham->sanPham->ten_san_pham }}</h5>
                    </td>
                    <td>
                      {{ $bill_detail->chiTietSanPham->mau }}
                    </td>
                    <td>
                      {{ $bill_detail->chiTietSanPham->kich_thuoc }}
                    </td>
                    <td>
                      {{number_format($bill_detail->gia_ban,0,',','.').' '.'VNĐ'}}
                    </td>
                    <td>
                      {{ $bill_detail->so_luong }}
                    </td>
                    <td>
                      {{number_format($bill_detail->gia_ban * $bill_detail->so_luong,0,',','.').' '.'VNĐ'}}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table> --}}
            <table style="min-width: unset" class="table-ds-sanpham"  >
              <thead>
                  <tr>
                      {{-- <th>Mã hóa đơn</th> --}}
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
                @foreach($array as $bill_detail)
                <tr>
                    {{-- <td>{{ $bill_detail->hoa_dons_id}}</td> --}}
                    <td>@foreach($bill_detail->chiTietSanPham->sanPham->anh as $anh)
                      @if($anh->anhchinh == 1)
                        <img src="{{asset($anh->link)}}" alt="anh">
                      @endif
                    @endforeach</td>
                    <td>{{ $bill_detail->chiTietSanPham->sanPham->ten_san_pham}}</td>
                    <td>{{ $bill_detail->chiTietSanPham->mau }}</td>
                    <td>{{ $bill_detail->chiTietSanPham->kich_thuoc }}</td>
                    <td>{{number_format($bill_detail->gia_ban,0,',','.').' '.'VNĐ'}}</td>
                    <td>{{ $bill_detail->so_luong}}</td>
                    <td>{{number_format($bill_detail->gia_ban * $bill_detail->so_luong,0,',','.').' '.'VNĐ'}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>