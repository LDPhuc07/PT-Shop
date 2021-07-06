@extends('admin.master.master')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Thống kê sản phẩm bán được</h3>
          </div>
          <div class="add-pro">
            @if(empty($thong_ke_theo))
              <a href="admin/statistics/print">
            @else
              @if($thong_ke_theo == "ko")
                @if(empty($key_from_day))
                  @if(empty($key_to_day))
                    <a href="admin/statistics/print">
                  @else
                    <a href="admin/statistics/printKeyToDay/{{ $key_to_day }}">
                  @endif
                @else
                  @if(empty($key_to_day))
                    <a href="admin/statistics/printKeyFromDay/{{ $key_from_day }}">
                  @else
                    <a href="admin/statistics/printKeyFromToDay/{{ $key_from_day }}/{{ $key_to_day }}">
                  @endif
                @endif
              @else
                <a href="admin/statistics/printThongKeTheo/{{ $thong_ke_theo }}">
              @endif
            @endif
              <p>Xuất thông kê</p>
            </a>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  <form action="{{ route('admin.statistics.search') }}" method="POST">
                    @csrf
                    <div class="head-table">
                      <div style="display: flex; margin-right: 16px;">
                        <label style="white-space: nowrap; margin-right: 8px;
                        margin-top: 5px;">Từ ngày: </label>
                        <input name="key_from_day" type="text" id="datepicker" class="form-control">
                      </div>
                      <div style="display: flex; margin-right: 16px;">
                        <label style="white-space: nowrap; margin-right: 8px;
                        margin-top: 5px;">Đến ngày: </label>
                        <input name="key_to_day" type="text" id="datepicker2" class="form-control">
                      </div>
                      <div style="display: flex">
                        <label style="white-space: nowrap; margin-right: 8px;
                        margin-top: 5px;">Thống kê theo: </label>
                        <select name="thong_ke_theo" style="border: 1px solid #ced4da;
                        border-radius: .25rem; margin-right: 16px" class="dashboard-filter">
                          <option value="ko">--Chọn--</option>
                          <option value="7ngay">7 ngày qua</option>
                          <option value="thangtruoc">Tháng trước</option>
                          <option value="thangnay">Tháng này</option>
                          <option value="365ngayqua">365 ngày qua</option>
                        </select>
                      </div>
                      <input type="submit" style="color: #fff;
                      background-color: #0069d9;
                      border-color: #0062cc;" class="btn" value="Thống kê">
                    </div>
                  </form>
                  <div id="ds-hoa-don-div" class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                        <tr>
                          <th>Tên sản phẩm</th>
                          <th>Số lượng</th>
                          <th>Lãi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $tong = 0;
                        ?>
                        @foreach($arrays as $array)
                        <tr>
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
                  {{--  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $arrays->appends(request()->query())->links() !!}
                    </ul>
                  </nav>  --}}
                  <div style="text-align: right;
                  margin-top: 20px;">
                    <label for="">Tổngt doanh thu:</label>
                    <span>{{number_format($tong,0,',','.').' '.'VNĐ'}}</span>
                  </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    @endsection
  @section('script')
  {{--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>  --}}
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
    function showModal(url, title) {
      $.ajax({
        url: url,
        type: 'GET',
      }).done(function(res) {
        //hiện form create edit
        $('#form-modal .modal-body').html(res);
        //hiện tiêu đề
        $('#form-modal .modal-title').html(title);
        //hiện modal
        $('#form-modal').modal('show');
      });
    }

    function deleteBill(id) {
      if(confirm('Bạn có thật sự muốn xóa?') == true){
        $.ajax({
          url: 'admin/bill/delete/' + id,
          type: 'GET',

          success:function(data) {
            if(data == 'done') {
              $(`#bill-item-${id}`).empty();
            }
          }
        });
      }
    }
    function checkbill(id) {
      if($(`.check-${id}`).hasClass('not-check-btn')) {
        $.ajax({
          url: 'admin/bill/check-bill/' + id,
          type: 'GET',
          
          success:function(data) {
            if(data == 'done') {
              $(`.check-${id}`).removeClass('not-check-btn');
              $(`.check-${id}`).addClass('checked');
              $(`.check-${id}`).html('Đã Chốt');
            }
          }
        });
      }
    }
  </script>
@endsection