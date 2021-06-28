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
                      <form action="{{ route('admin.accounts.search') }}" method="POST">
                        @csrf
                        <input class="search-txt" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="group-filter-btn">
                      <label style="width: 120px;
                      position: relative;
                      top: 6px;">Loại tài khoản: </label>
                      <select style="width: 170px;" name="admin">
                        <option value="">--Chọn--</option>
                        <option value="1">Admin</option>
                        <option value="0">Người dùng</option>
                      </select>
                    </div>
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
                                <img src="{{asset(getLink('anh-dai-dien',$account->anh_dai_dien))}}" alt="anh"></td>
                              @else
                                <img src="https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png" alt="anh"></td>
                              @endif
                            <td>{{ $account->ho_ten }}</td>
                            <td>{{ $account->email }}</td>
                            <td>{{ $account->so_dien_thoai }}</td>
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
                              @else
                                <a onclick="lock({{ $account->id }})" href="javascript:" class="delete-btn"><i class="lock-{{ $account->id }} fas fa-lock-open"></i></a>
                              @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $arrays->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
                  </div>
              </div>
            </div>
        </div>
    </div>
  {{-- <script>
    function xoasanpham(id){
      $.ajax({
        url: 'cart/delete-item-ajax/'+id,
        type: 'GET',
      }).done(function(response) {
        $("#cart-content").empty();
        $("#cart-content").html(response);
      });
    }
</script> --}}
@endsection
@section('script')
  <script>
    function lock(id) {
      if($(`.lock-${id}`).hasClass('fas fa-lock')) {
        if(confirm('Bạn có thật sự muốn khóa tài khoản này?') == true){
          $.ajax({
            url: 'admin/accounts/lock/'+id,
            type: 'GET',

            success:function(data) {
              if(data == 'done') {
                $(`.lock-${id}`).removeClass('fa-lock');
                $(`.lock-${id}`).addClass('fa-lock-open');
                $(`#lock-td-${id}`).html("Đã khóa");
              }
            }
          });
        }
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