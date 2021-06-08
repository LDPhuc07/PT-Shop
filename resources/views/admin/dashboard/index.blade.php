@extends('admin.master.master')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row m-0">
            <div class="col-lg-3 col-6 pl-0 pr-8">
                <div class="small-box new-order">
                <div class="inner">
                    <h3>150</h3>
                    <p>Hơn hàng mới</p>
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
                    <h3>564</h3>
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
                    <h3>44</h3>
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
                    <h3>150</h3>
                    <p>Hơn hàng mới</p>
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
                    <div class="col-lg-2">
                        <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                    </div>
                    <div class="col-lg-2">
                        <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                    </div>
                    <div class="col-lg-2">
                        <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
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
        $('#btn-dashboard-filter').click(function() {
            var _token = $('input[name="_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();

            $.ajax({
                url: "admin/dashboard/filter-by-date",
                method: "POST",
                dataType: "JSON",
                data: {from_date:from_date, to_date:to_date, _token:_token},
            })
        })
    </script>
@endsection