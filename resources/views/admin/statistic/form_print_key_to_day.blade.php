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
            td, th {
                border: 1px solid;
                padding: 4px;
            }
            table {
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <h1>P&amp;T Shop</h1>
        <p>Địa chỉ: 86 Đinh Bộ Lĩnh, P.26, Q. Bình Thạnh, TPHCM</p>
        <p>ĐT: 0123456789</p>
        <hr/>
        <h2>BÁO CÁO THỐNG KÊ ĐẾN NGÀY {{ $key_to_day }}</h2>
        <div class="info">
            <div class="info_item">
                <label for="">Ngày lập báo cáo thống kê:</label> 21/02/2021 <br/>
            </div>
            <div class="info_item">
                <label for="">Người lập báo cáo thống kê:</label> {{ Auth::user()->ho_ten }}
            </div>
        </div>
        <table style="width: 100%;">
            <thead>
                <tr style="border: 1px solid">
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Lãi</th>
                </tr>
            </thead>
            <tbody >
                <?php
                    $tong = 0;
                ?>
                @foreach($arrays as $array)
                <tr style="border: 1px solid">
                    <td>{{ $array->ten_san_pham }}</td>
                    <td>{{ $array->so_luong}}</td>
                    <td>{{number_format(($array->gia_ban - $array->gia_goc) * $array->so_luong,0,',','.').' '.'VNĐ'}}</td>
                    <?php
                        $tong += ($array->gia_ban - $array->gia_goc) * $array->so_luong;
                    ?>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total">
            <label for="">Tổng tiền: </label>    {{number_format($tong,0,',','.').' '.'VNĐ'}}
        </div>
    </body>
</html>