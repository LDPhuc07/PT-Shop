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
            <h3>Danh sách đen</h3>
          </div>
        </div>
        <div class="row">
            <div class="mobile-sp col-sm-12">
                <div class="ds-sanpham">
                  <div class="head-table">
                    <form class="search-form" action="{{route('admin.blacklist.search')}}" method="GET">
                      <div class="search">
                        <input class="search-txt" value="{{Request::get('search')}}" type="text" placeholder="Tìm kiếm.." name="search">
                      </div>
                      <input type="submit" class="btn tim_kiem_btn" value="Tìm kiếm">
                    </form>
                  </div>
                  <div id="ds-taikhoan" class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Số điện thoại</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($arrays as $sdt)
                        <tr>
                            <td>{{ $sdt->so_dien_thoai }}</td>
                            <td>
                                <a onclick="unLock({{ $sdt->id }})" href="javascript:" class="delete-btn"><i class="lock-{{ $sdt->id }} fas fa-lock-open"></i></a>
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
                                        Bạn có thực sự muốn bỏ chặn số điện thoại này ?
                                      </div>
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                        <button type="button" class="btn btn-danger" id="mo-khoa" style="background-color:red;color:white">OK</button>
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
    function unLock(id) {
        $('#modal').modal('show');
        $("#mo-khoa").click(function() {
          $.ajax({
            url: 'admin/black-list/un-lock/'+id,
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
    }
  </script>
@endsection