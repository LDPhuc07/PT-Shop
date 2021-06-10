@extends('admin.master.master')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row m-0">
            <div class="col-lg-3 col-6 pl-0 pr-8">
                <div class="small-box new-order">
                <div class="inner">
                    <h3>{{ $dem_don_hang }}</h3>
                    <p>Đơn hàng mới</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info 
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 pl-8 pr-8">
                <div class="small-box new-registrations">
                <div class="inner">
                    <h3>{{ $dem_yeu_thich }}</h3>
                    <p>Lượt thích</p>
                </div>
                <div class="icon">
                    <i class="fas fa-thumbs-up"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info 
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 pl-8 pr-8">
                <div class="small-box bounce-rate">
                <div class="inner">
                    <h3>{{ $dem_khach_hang }}</h3>
                    <p>Thành viên mới</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info 
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
            <div class="col-lg-3 col-6 pr-0 pl-8">
                <div class="small-box unique-visitors">
                <div class="inner">
                    <h3>{{ $san_pham_max->ten_san_pham }}</h3>
                    <p>Sản phẩm bán chạy</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info 
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
                </div>
            </div>
        </div>
        <div class="thong_ke">
            <p class="title_thongke">Thống kê doanh số</p>
            <form autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <p>Từ ngày: <input type="text" id="datepicker" name="from_date" class="form-control"></p>
                    </div>
                    <div class="col-md-2">
                        <p>Đến ngày: <input type="text" id="datepicker2" name="to_date" class="form-control"></p>
                    </div>
                    <div class="col-md-2">
                        <p>
                            Lọc theo:
                            <select class="dashboard-filter form-control">
                                <option>--Chọn--</option>
                                <option value="7ngay">7 ngày qua</option>
                                <option value="thangtruoc">Tháng trước</option>
                                <option value="thangnay">Tháng này</option>
                                <option value="365ngayqua">365 ngày qua</option>
                            </select>
                         </p>
                    </div>
                    <div class="col-lg-2">
                        <input style="    margin-top: 24px;
                        height: 38px;" type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                    </div>
                </div>
                
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div id="myfirstchart" style="height: 250px;"></div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker({
          dateFormat:"yy-mm-dd"
      });
    } );
    $( function() {
        $( "#datepicker2" ).datepicker({
            dateFormat:"yy-mm-dd"
        });
      } );
    </script>
    <script>
        $(document).ready(function() {

            chart30days();
            
            var chart = new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',

                hideHover: 'auto',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                // The name of the data record attribute that contains x-values.
                xkey: 'ngay_lap_hd',
                // A list of names of data record attributes that contain y-values.
                ykeys: ['tong_tien'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ['Tổng tiền']
            });

            function chart30days() {

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"admin/dashboards/filter-30-days",
                    method: "POST",
                    dataType: "JSON",
                    data:{ _token:_token},

                    success:function(data) {
                        chart.setData(data);
                    }
                });
            }

            $('.dashboard-filter').change(function() {

                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"admin/dashboards/filter",
                    method: "POST",
                    dataType: "JSON",
                    data:{dashboard_value:dashboard_value, _token:_token},

                    success:function(data) {
                        chart.setData(data);
                    }
                });
            });

            $('#btn-dashboard-filter').click(function() {
                var _token = $('input[name="_token"]').val();
                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();

                $.ajax({
                    url: "admin/dashboards/filter-by-date",
                    method: "POST",
                    dataType: "JSON",
                    data: {from_date:from_date, to_date:to_date, _token:_token},

                    success:function(data) {
                        chart.setData(data);
                    }
                });
            });
        });
    </script>
    {{--  <script>
        $(document).ready(function() {
            
        });
    </script>  --}}
@endsection