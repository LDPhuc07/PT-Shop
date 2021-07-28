@extends('admin.master.master')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
  @media(max-width: 767px) {
    .search {
      width: 100%;
      margin-right: unset;
    }
    .head-table {
      display: block;
    }
    .group-filter-btn {
      display: block;
      margin-right: unset !important;
    }
    .w-100 {
      width: 100% !important;
    }
    .inl-blk {
      width: 100%;
      margin-top: 10px;
    }
    .head-title {
      margin-bottom: unset;
    }
    .content-wrapper {
      padding-left: unset;
      padding-right: unset;
    }
    .head-title {
      margin-left: 16px;
    }
  }
  @media(min-width: 768px) and (max-width: 1024px) {
    .head-table {
      display: block;
    }
    .search {
      width: 100%;
    }
    .group-filter-btn {
      display: inline-block;
      margin-right: 19px !important;
    }
    .unset-width {
      width: unset !important;
    }
    .inl-blk {
      display: inline-block;
      height: 38px;
    }
  }
  .table-ds-sanpham {
    min-width: 1000px;
  }
  .ds-sanpham-div {
    overflow-x: auto;
    padding-bottom: unset;
  }
  .content-wrapper {
    margin-top: unset;
  }
</style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Hóa đơn</h3>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  <form action="{{ route('admin.bill.search') }}" method="POST">
                    @csrf
                    <div class="head-table">
                      <div class="search">
                          <input class="search-txt" name="key_search" type="text" placeholder="Tìm theo tên khách hàng, mã hóa đơn">
                      </div>
                        <div class="group-filter-btn">
                          <label style="width: 211px;
                          position: relative;
                          top: 6px;">Từ ngày: </label><input style="margin-right: 16px" name="key_from_day" type="text" id="datepicker" class="form-control">
                        </div>
                        <div class="group-filter-btn">
                          <label class="unset-width" style="width: 242px;
                          position: relative;
                          top: 6px;">Đến ngày: </label><input style="margin-right: 16px" type="text" id="datepicker2" name="key_to_day" class="form-control">
                        </div>
                        <div style="margin-right: 16px;" class="group-filter-btn">
                          <label class="unset-width" style="width: 75px;
                          position: relative;
                          top: 6px;">Chốt đơn: </label>
                          <select  class="w-100 form-control" style="width: 170px;border: 1px solid #ced4da;border-radius: .25rem;" name="chot_don">
                            <option value="">--Chọn--</option>
                            <option value="1">Đã chốt</option>
                            <option value="0">Chưa chốt</option>
                          </select>
                        </div>
                        <input type="submit" style="color: #fff;
                        background-color: #0069d9;
                        border-color: #0062cc;" class="btn inl-blk" value="Tìm kiếm">
                    </div>
                  </form>
                  <div id="ds-hoa-don-div" class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Mã hóa đơn</th>
                              <th>Tên khách hàng</th>
                              <th>Ngày lập hóa đơn</th>
                              <th>Tổng tiền</th>
                              <th>Chốt đơn</th>
                              <th>Hình thức thanh toán</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($arrays as $bill)
                        <tr id="bill-item-{{ $bill->id }}">
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->taiKhoan->ho_ten}}</td>
                            <td>{{ $bill->ngay_lap_hd }}</td>
                            <td>{{number_format($bill->tong_tien,0,',','.').' '.'VNĐ'}}</td>
                            @if ($bill->chot_don == true)
                              <td>
                                <a class="checked">Đã Chốt</a>
                              </td>
                            @else
                              <td> 
                                <a onclick="checkbill({{ $bill->id }})" class="check-{{ $bill->id }} not-check-btn">Chưa Chốt</a>
                              </td>
                            @endif
                            @if ($bill->hinh_thuc_thanh_toan == true)
                              <td>
                                <span style="cursor: unset" class="checked">Trả trước</span>
                              </td>
                            @else
                              <td> 
                                <span style="cursor: unset" class="not-check-btn">Trả sau</span>
                              </td>
                            @endif
                            <td>
                              <a onclick="deleteBill({{ $bill->id }})" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
                              <div class="modal fade" id="modal">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title" style="color:red">Thông báo</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      Bạn có thực sự muốn xóa hóa đơn này ?
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                      <button type="button" class="btn btn-danger" id="khoa" style="background-color:red;color:white">OK</button>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <a  onclick="showModal('admin/bill/bill-detail/{{ $bill->id }}','Chi tiết hóa đơn')" class="view-detail-btn"><i class="fas fa-eye"></i></a>
                              <a target="_blank" class="print-bill-btn" href="{{ route('admin.bill.print',$bill->id) }}"><i class="fas fa-print"></i></a>
                              <div class="modal fade" id="form-modal" role="dialog">
                                <div class="modal-dialog">
                        
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div style="padding: 0" class="modal-body">
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  </div>
                  <nav aria-label="Page navigation example" style="padding: 15px;">
                    <ul class="pagination" style="margin-bottom: unset ">
                      {!! $arrays->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
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
      $('#modal').modal('show');
        $("#khoa").click(function() {
        $.ajax({
          url: 'admin/bill/delete/' + id,
          type: 'GET',

          success:function(data) {
            if(data == 'done') {
              $(`#bill-item-${id}`).empty();
              $('#modal').modal('hide');
            }
          }
        });
      })
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