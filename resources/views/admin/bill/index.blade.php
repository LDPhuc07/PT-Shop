@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Tài khoản</h3>
          </div>
          <div class="add-pro">
            <a href="admin/sign-up">
              <p>Đăng ký</p>
            </a>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  <div class="head-table">
                    <div class="search">
                      <form action="">
                        <input class="search-txt" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                    {{--  <div class="group-filter-btn">
                      <div class="filter-catagories-wrap">
                        <button id="filter-catagories-wrap-id" class="filter-catagories-btn btn">
                          <span>Loại sản phẩm</span>
                          <i class="fas fa-caret-down"></i>
                        </button>
                        <div id="popover-catagories" class="popover">
                          <div class="arrow"></div>
                        </div>
                      </div>
                      <div class="filter-catagories-sport-wrap">
                        <button id="filter-catagories-sport-wrap-id" class="filter-catagories-sport-btn btn">
                          <span>BM thể thao</span>
                          <i class="fas fa-caret-down"></i>
                        </button>
                        <div id="popover-catagories-sport" class="popover">
                          <div class="arrow"></div>
                        </div>
                      </div>
                      <div class="filter-producer-wrap">
                        <button id="filter-producer-wrap-id" class="filter-producer-btn btn">
                          <span>Nhà sản xuất</span>
                          <i class="fas fa-caret-down"></i>
                        </button>
                        <div id="popover-producer" class="popover">
                          <div class="arrow"></div>
                        </div>
                      </div>
                    </div>  --}}
                  </div>
                  <div id="ds-hoa-don-div" class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Mã hóa đơn</th>
                              <th>Tên khách hàng</th>
                              <th>Ngày lập hóa đơn</th>
                              <th>Tổng tiền</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($arrays as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->taiKhoan->ho_ten}}</td>
                            <td>{{ $bill->ngay_lap_hd }}</td>
                            <td>{{number_format($bill->tong_tien,0,',','.').' '.'VNĐ'}}</td>
                            <td>
                              <a onclick="deleteBill({{ $bill->id }})" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
                              <a  onclick="showModal('admin/bill/bill-detail/{{ $bill->id }}','Chi tiết hóa đơn')" class="view-detail-btn"><i class="fas fa-eye"></i></a>
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
              </div>
            </div>
        </div>
    </div>
    @endsection
  @section('script')
  {{--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>  --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
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
      $.ajax({
        url: 'admin/bill/delete/' + id,
        type: 'GET',
      }).done(function(res) {
        $("#ds-hoa-don-div").empty();
        $("#ds-hoa-don-div").html(res);
      });
    }
  </script>
@endsection