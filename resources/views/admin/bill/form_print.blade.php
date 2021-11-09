<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: Dejavu Sans;
                text-align: center;
            }
            .info {
                text-align: left;
                margin-bottom: 20px;
            }
            .info_item {
                margin-top: 10px;
            }
            td, th {
                padding-right: 20px;
                padding-top: 4px;
                padding-bottom: 4px;
                text-align: left;
            }
            .total {
                margin-top: 20px;
                text-align: right;
            }
            .greeting {
                text-align: center;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <h1>P&amp;T Shop</h1>
        <p>Địa chỉ: 86 Đinh Bộ Lĩnh, P.26, Q. Bình Thạnh, TPHCM</p>
        <p>ĐT: 0123456789</p>
        <hr/>
        <h2>HÓA ĐƠN THANH TOÁN</h2>
        <div class="info">
            <div style="margin-top:0" class="info_item">
                <label for="">Khách hàng:</label> {{ $bill->ho_ten}} <br/>
            </div>
            <div class="info_item">
              <label for="">Số điện thoại:</label> {{ $bill->so_dien_thoai}}<br/>
            </div>
            <div class="info_item">
              <label for="">Địa chỉ:</label> {{ $bill->dia_chi}}<br/>
            </div>
            <div class="info_item">
                <label for="">Ngày lập HD:</label> {{ date('d-m-Y', strtotime($bill->ngay_lap_hd)) }}<br/>
            </div>
            <div class="info_item">
                <label for="">Thu Ngân:</label> {{ Auth::user()->ho_ten }}
            </div>
        </div>
        <table style="width: 100%">
            <thead style="border-bottom: 1px solid">
                <tr>
                    <th>Sản phẩm</th>
                    <th>SL</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody style="border-bottom: 1px solid">
                @foreach($bill_detail as $i)
                <tr>
                    <td>{{ $i->chiTietSanPham->sanPham->ten_san_pham }}</td>
                    <td>{{ $i->so_luong }} x</td>
                    <td>{{number_format($i->gia_ban,0,',','.').' '.'VNĐ'}}</td>
                    <td>{{number_format($i->gia_ban * $i->so_luong,0,',','.').' '.'VNĐ'}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">Tổng tiền: </td>
                    <td>{{number_format($bill->tong_tien,0,',','.').' '.'VNĐ'}}</td>
                </tr>
            </tfoot>
        </table>
        <div class="greeting">
            <p>Cảm ơn quý khách, hẹn gặp lại!</p>
        </div>
    </body>
</html>