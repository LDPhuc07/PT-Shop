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