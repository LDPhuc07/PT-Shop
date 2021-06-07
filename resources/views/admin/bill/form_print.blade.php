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
                text-align: left;
            }
            .total {
                margin-top: 20px;
                text-align: right;
            }
            .info
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
                <label for="">Khách hàng:</label> {{ $bill->taiKhoan->ho_ten}} <br/>
            </div>
            <div class="info_item">
                <label for="">Ngày lập HD:</label> {{ $bill->ngay_lap_hd }} <br/>
            </div>
            <div class="info_item">
                <label for="">Thu Ngân:</label> Lê Đức Phục
            </div>
        </div>
        <table style="width: 100%;">
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
                    <td>{{number_format($i->chiTietSanPham->sanPham->gia_ban,0,',','.').' '.'VNĐ'}}</td>
                    <td>{{number_format($i->chiTietSanPham->sanPham->gia_ban * $i->so_luong,0,',','.').' '.'VNĐ'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total">
            <label for="">Tổng tiền: </label>    {{number_format($bill->tong_tien,0,',','.').' '.'VNĐ'}}
        </div>
        <div class="greeting">
            <p>Cảm ơn quý khách, hẹn gặp lại!</p>
        </div>
    </body>
</html>