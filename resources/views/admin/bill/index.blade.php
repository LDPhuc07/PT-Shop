@extends('admin.master.master')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
  .group-filter-btn .trang-thai-label {
    width: 300px;
  }
  .trang-thai-dh {
    text-align: center;
  }

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
    .group-filter-btn label {
      text-align: unset !important;
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
      margin-right: 5px!important;
      width: 200px;
    }
    .unset-width {
      width: unset !important;
    }
    .inl-blk {
      display: inline-block;
      height: 38px;
    }
    .group-filter-btn label {
      text-align: unset !important;
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
  .group-filter-btn label {
    width: 211px;
    margin-top: 6px;
    text-align: center;
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
                  <form action="{{ route('admin.bill.search') }}" method="GET">
                    <div class="head-table">
                      <div class="search">
                          <input class="search-txt" name="key_search" type="text" placeholder="Tìm theo tên khách hàng, mã hóa đơn">
                      </div>
                        <div class="group-filter-btn">
                          <label>Từ ngày: </label><input style="margin-right: 16px" name="key_from_day" type="text" id="datepicker" class="form-control">
                        </div>
                        <div class="group-filter-btn">
                          <label class="unset-width">Đến ngày: </label><input style="margin-right: 16px" type="text" id="datepicker2" name="key_to_day" class="form-control">
                        </div>
                        <div style="margin-right: 16px;" class="group-filter-btn">
                          <label class="trang-thai-label" class="unset-width">Trạng thái đơn hàng: </label>
                          <select  class="w-100 form-control" style="width: 170px;border: 1px solid #ced4da;border-radius: .25rem;" name="trang_thai_don_hang">
                            <option value="">--Chọn--</option>
                            <option value="0">Đã hủy</option>
                            <option value="1">Chờ xác nhận</option>
                            <option value="2">Chờ lấy hàng</option>
                            <option value="3">Đang giao</option>
                            <option value="4">Đã Giao</option>
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
                              <th>Số điện thoại</th>
                              <th>Địa chỉ</th>
                              <th>Ngày lập hóa đơn</th>
                              <th >
                                <div style="text-align: center">
                                  Trạng thái đơn hàng
                                </div>
                              </th>
                              <th >
                                <div style="text-align: center">
                                  Hình thức thanh toán
                                </div>
                              </th>
                              <th>Tổng tiền</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($arrays as $bill)
                        <tr id="bill-item-{{ $bill->id }}">
                            <td>{{ $bill->id }}</td>
                            <td> 
                              {{ $bill->ho_ten }}
                            </td>
                            <td> 
                              {{ $bill->so_dien_thoai }}
                            </td>
                            <td> 
                              {{ $bill->dia_chi }}
                            </td>
                            <td>{{ date('d-m-Y', strtotime($bill->ngay_lap_hd)) }}</td>
                            
                            {{--  @if ($bill->chot_don == true)
                              <td>
                                <a class="checked"><i class="fas fa-check-circle"></i></a>
                              </td>
                            @else
                              <td> 
                                <a class="check-{{ $bill->id }} not-check-btn"><i class="fas fa-exclamation-circle"></i></a>
                              </td>
                            @endif  --}}
                            <td>
                              <div style="text-align: center" class="trang-thai-dh-{{ $bill->id }}">
                                @if($bill->trang_thai_don_hang == 0)
                                <span style="cursor: unset;background: linear-gradient( 
                                  180deg ,#ea4040,#e64040)!important; border-color: unset; box-shadow: unset" class="postpaid">Đã hủy</span>
                                @endif
                                @if($bill->trang_thai_don_hang == 1)
                                <span style="cursor: unset;background: linear-gradient( 
                                  180deg ,#2944e0,#1c18f7)!important; border-color: unset; box-shadow: unset" class="postpaid">Chờ xác nhận</span>
                                @endif
                                @if($bill->trang_thai_don_hang == 2)
                                <span style="cursor: unset;background: linear-gradient( 
                                  180deg ,#ffc107,#ffc107)!important; border-color: unset; box-shadow: unset" class="postpaid">Chờ lấy hàng</span>
                                @endif
                                @if($bill->trang_thai_don_hang == 3)
                                <span style="cursor: unset;background: linear-gradient( 
                                  180deg ,#ffc107,#ffc107)!important; border-color: unset; box-shadow: unset" class="postpaid">Đang giao</span>
                                @endif
                                @if($bill->trang_thai_don_hang == 4)
                                <span style="cursor: unset;background: linear-gradient( 
                                  180deg ,#2dcc33,#41ca46)!important; border-color: unset; box-shadow: unset" class="postpaid">Đã giao</span>
                                @endif
                              </div>
                            </td>
                            
                            <td>
                              <div style="text-align: center">
                                @if ($bill->hinh_thuc_thanh_toan == true)
                                  <span style="cursor: unset" class="repaid">Trả trước</span>
                                @else
                                  <span style="cursor: unset" class="postpaid">Trả sau</span>
                                @endif
                              </div>
                            </td>
                      
                            <td>{{number_format($bill->tong_tien,0,',','.').' '.'VNĐ'}}</td>
                            <td>
                              {{--  <a onclick="deleteBill({{ $bill->id }})" class="delete-btn"><i class="fas fa-trash-alt"></i></a>  --}}
                              <div class="modal fade" id="modal">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Cập nhật trạng thái đơn hàng</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form id="form">
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <div style="margin-right: 16px;" class="group-filter-btn">
                                        <input type="text" name="cap_nhat_ttdh" hidden>
                                        <label style="font-size: 18px" class="trang-thai-label unset-width">Trạng thái đơn hàng: </label>
                                        <select id="ttdh_val" class="w-100 form-control" style="width: 170px;border: 1px solid #ced4da;border-radius: .25rem;" name="trang_thai_don_hang">
                                          <option value="no">--Chọn--</option>
                                          <option value="0">Đã hủy</option>
                                          <option value="1">Chờ xác nhận</option>
                                          <option value="2">Chờ lấy hàng</option>
                                          <option value="3">Đang giao</option>
                                          <option value="4">Đã Giao</option>
                                        </select>
                                        </div>
                                      </div>
                                      <!-- Modal footer -->
                                      <div style=" border-top: unset;" class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-danger" id="khoa" style="background-color:#08f;color:white">Lưu</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <a  onclick="showModal('admin/bill/bill-detail/{{ $bill->id }}','Chi tiết hóa đơn')" class="view-detail-btn"><i class="fas fa-eye"></i></a>
                              <a target="_blank" class="print-bill-btn" href="{{ route('admin.bill.print',$bill->id) }}"><i class="fas fa-print"></i></a>
                              <a onclick="checkbill({{ $bill->id }})" id="check-bill-{{ $bill->id }}" class="check-bill-btn"><i class="fas fa-calendar-check"></i></a>
                              <div class="modal fade" id="form-modal" role="dialog">
                                <div style="max-width: 800px" class="modal-dialog">
                        
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

    function checkbill(id) {
      $('#modal').modal('show');
      $("input[name='cap_nhat_ttdh']").val(id);
      console.log($("input[name='cap_nhat_ttdh']").val());  
    }
    $("#form").submit(function(e){

      e.preventDefault();
      var id = $("input[name='cap_nhat_ttdh']").val();
      var val = $("#ttdh_val").val();
      $.ajax({
        url: 'admin/bill/check-bill/' + id + '/' + val,
        type: 'GET',
        success:function(data) {
          if(data == 0) {
            var _html = `<span style="cursor: unset;background: linear-gradient(`;
                _html += `180deg ,#ea4040,#e64040)!important; border-color: unset; box-shadow: unset" class="postpaid">Đã hủy</span>`;
            $(`.trang-thai-dh-${id}`).html(_html);
          }
          if(data == 1) {
            var _html = `<span style="cursor: unset;background: linear-gradient(`;
                _html += `180deg ,#2944e0,#1c18f7)!important; border-color: unset; box-shadow: unset" class="postpaid">Chờ xác nhận</span>`;
            $(`.trang-thai-dh-${id}`).html(_html);
          }
          if(data == 2) {
            var _html = `<span style="cursor: unset;background: linear-gradient(`;
                _html += `180deg ,#ffc107,#ffc107)!important; border-color: unset; box-shadow: unset" class="postpaid">Chờ lấy hàng</span>`;
            $(`.trang-thai-dh-${id}`).html(_html);
          }
          if(data == 3) {
            var _html = `<span style="cursor: unset;background: linear-gradient(`;
                _html += `180deg ,#ffc107,#ffc107)!important; border-color: unset; box-shadow: unset" class="postpaid">Đang giao</span>`;
            $(`.trang-thai-dh-${id}`).html(_html);
          }
          if(data == 4) {
            var _html = `<span style="cursor: unset;background: linear-gradient(`;
                _html += `180deg ,#2dcc33,#41ca46)!important; border-color: unset; box-shadow: unset" class="postpaid">Đã giao</span>`;
            $(`.trang-thai-dh-${id}`).html(_html);
          }     
          $('#modal').modal('hide');   
        }
      });
    });
  </script>
@endsection