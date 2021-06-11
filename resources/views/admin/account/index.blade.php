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
                            <td>
                              @if($account->trang_thai == true )
                                Đang hoạt động
                              @else
                                Đã khóa
                              @endif
                            </td>
                            <td>
                              @if($account->trang_thai == true )
                                <a onclick="lock({{ $account->id }})" href="javascript:" class="delete-btn"><i class="fas fa-lock"></i></a>
                              @else
                                <a onclick="unlock({{ $account->id }})" href="javascript:" class="delete-btn"><i class="fas fa-lock-open"></i></a>
                              @endif
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
      $.ajax({
        url: 'admin/accounts/lock/'+id,
        type: 'GET',
      }).done(function(response) {
        $("#ds-taikhoan").empty();
        $("#ds-taikhoan").html(response);
      });
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