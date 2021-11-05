@extends('admin.master.master')
@section('content') 
<style>
  @media(max-width: 767px) {
    .mobile-sp {
      padding: unset;
    }
    .ds-sanpham {
      border-radius: unset;
    }
    .head-table {
      display: grid;
    }
    .search {
      width: 100%;
      margin-right: unset;
    }
    .group-filter-btn {
      margin-top: 8px;
      margin-right: unset !important;
      display: block;
    }
    .slt-admin, .slt-status {
      height: 38px;
      float: right;
    }
    .lbl-admin, .lbl-status {
      top:0 !important;
    }
    .sub-acc {
      height: 38px;
      margin-top: 8px;
    }
    .ds-sanpham-div {
      overflow-x:auto;
    }
  }
  @media(min-width: 768px) and (max-width: 1023px) {
    .head-table {
      display: block;
    }
    .search {
      width: 100%;
      margin-right: unset;
    }
    .group-filter-btn {
      display: inline-block;
      margin-top: 8px;
    }
    .slt-admin, .slt-status {
      height: 38px;
    }
    .lbl-admin, .lbl-status {
      top:0 !important;
    }
    .sub-acc {
      height: 38px;
      float: right;
      margin-top: 8px;
    }
  }
</style>
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
            <div class="mobile-sp col-sm-12">
                <div class="ds-sanpham">
                  <div class="head-table">
                    <div class="search">
                      <form action="{{ route('admin.accounts.search') }}" method="GET">
                        <input class="search-txt" type="text" placeholder="Nhập họ tên, email, số điện thoại, địa chỉ" name="search">
                    </div>
                    <div style="margin-right: 16px" class="group-filter-btn">
                      <label class="lbl-admin" style="width: 115px;
                      position: relative;
                      top: 6px;">Loại tài khoản: </label>
                      <select class="slt-admin" style="width: 170px;border: 1px solid #ced4da;border-radius: .25rem;" name="admin">
                        <option value="">--Chọn--</option>
                        <option value="1">Admin</option>
                        <option value="0">Người dùng</option>
                      </select>
                    </div>
                    <div style="margin-right: 16px" class="group-filter-btn">
                      <label class="lbl-status" style="width: 90px;
                      position: relative;
                      top: 6px;">Trạng thái: </label>
                      <select class="slt-status" style="width: 170px;border: 1px solid #ced4da;border-radius: .25rem;" name="trang_thai">
                        <option value="">--Chọn--</option>
                        <option value="0">Đã khóa</option>
                        <option value="1">Đang hoạt động</option>
                      </select>
                    </div>
                    <input type="submit" style="color: #fff;
                      background-color: #0069d9;
                      border-color: #0062cc;" class="btn sub-acc" value="Tìm kiếm">
                  </form>
                  </div>
                  <div id="ds-taikhoan" class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Ảnh đại diện</th>
                              <th>Họ và tên</th>
                              <th>Email</th>
                              <th>Số điện thoại</th> 
                              <th>Địa chỉ</th>
                              <th>Loại tài khoản</th>
                              <th>Trạng thái</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($arrays as $account)
                        <tr>
                            <td>
                              @if($account->anh_dai_dien != null)
                                <img class="avt" src="{{asset(getLink('anh-dai-dien',$account->anh_dai_dien))}}" alt="anh"></td>
                              @else
                                <img class="avt" src="https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png" alt="anh"></td>
                              @endif
                            <td>{{ $account->ho_ten }}</td>
                            <td>{{ $account->email }}</td>
                            <td>{{ $account->so_dien_thoai }}</td>
                            <td>{{ $account->dia_chi }}</td>
                            <td>
                              @if($account->admin == true )
                                Admin
                              @else
                                Người dùng
                              @endif
                            </td>
                            <td id="lock-td-{{ $account->id }}">
                              @if($account->trang_thai == true )
                                Đang hoạt động
                              @else
                                Đã khóa
                              @endif
                            </td>
                            <td>
                              @if($account->trang_thai == true )
                                <a onclick="lock({{ $account->id }})" href="javascript:" class="delete-btn"><i class="lock-{{ $account->id }} fas fa-lock"></i></a>
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
                                        Bạn có thực sự muốn khóa tài khoản này ?
                                      </div>
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-danger" id="khoa" style="background-color:red;color:white">OK</button>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              @else
                                <a onclick="lock({{ $account->id }})" href="javascript:" class="delete-btn"><i class="lock-{{ $account->id }} fas fa-lock-open"></i></a>
                              @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  </div>
                  <nav aria-label="Page navigation example" style="padding: 0 15px 20px;">
                    <ul class="pagination">
                      {!! $arrays->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
              </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    function lock(id) {
      if($(`.lock-${id}`).hasClass('fas fa-lock')) {
        $('#modal').modal('show');
        $("#khoa").click(function() {
          $.ajax({
            url: 'admin/accounts/lock/'+id,
            type: 'GET',

            success:function(data) {
              if(data == 'done') {
                $(`.lock-${id}`).removeClass('fa-lock');
                $(`.lock-${id}`).addClass('fa-lock-open');
                $(`#lock-td-${id}`).html("Đã khóa");
                $('#modal').modal('hide');
              }
            }
          });
        });
      }
      else {
        $.ajax({
          url: 'admin/accounts/unlock/'+id,
          type: 'GET',

          success:function(data) {
            if(data == 'done') {
              $(`.lock-${id}`).removeClass('fa-lock-open');
              $(`.lock-${id}`).addClass('fa-lock');
              $(`#lock-td-${id}`).html("Đang hoạt động");
            }
          }
        });
      }
    }
    function doimau(tk_id, sp_id) {
      if($(`.like-${sp_id}`).hasClass('den')) {
        $.ajax({
          url: 'dislike/'+sp_id+"/"+tk_id,
          method: "GET"
        });
        $(`.like-${sp_id}`).removeClass('den');
      }
      else {
        $.ajax({
          url: 'like/'+sp_id+"/"+tk_id,
          method: "GET"
        });
        $(`.like-${sp_id}`).addClass('den');
      }
    }
    function unlock(id) {
      $.ajax({
        url: 'admin/accounts/unlock/'+id,
        type: 'GET',
      }).done(function(response) {
        $("#ds-taikhoan").empty();
        $("#ds-taikhoan").html(response);
      });
    }
  </script>
@endsection