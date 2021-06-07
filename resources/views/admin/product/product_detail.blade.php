@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Chi tiết Sản phẩm</h3>
          </div>
          <div class="add-pro">
            <a href="{{route('chitietsanpham.create',['id' =>$id])}}">
              <i class="fas fa-plus"></i>
              <p>Thêm chi tiết sản phẩm</p>
            </a>
          </div>
        </div>
        @include('admin.mess.message')
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  </div>
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Màu</th>
                              <th>Kích thước</th>
                              <th>Số lượng</th>
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($dsChiTietSanPham as $ds)
                        <tr>
                            <td>{{$ds['mau']}}</td>
                            <td>{{$ds['kich_thuoc']}}</td>
                            <td>{{$ds['so_luong']}}</td>
                            <td style="display:flex">
                              <a href="{{route('chitietsanpham.edit',['id' =>$id,'idct' => $ds['id']])}}" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <form id="chitietsanpham_{{$ds['id']}}" action="{{route('chitietsanpham.delete',['id' =>$id,'idct' => $ds['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <span class="delete-btn cursor" data-target="#modalChiTietSanPham" data-toggle="modal" data-id="{{$ds['id']}}"><i class="fas fa-trash-alt"></i></span>
                              </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $dsChiTietSanPham->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
                  </div>
              </div>
            </div>
        </div>
    </div>
     <!-- The Modal -->
  <div class="modal fade" id="modalChiTietSanPham">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="color:red">Cảnh báo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Bạn có chắc muốn xóa
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="chitietsanpham" style="background-color:red;color:white">confirm</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $('.delete-btn').click(function(){
          let id = $(this).data('id');
          $('#chitietsanpham').attr('data-id',id);
        })
        $('#chitietsanpham').click(function(){
          let id = $(this).data('id');
          $('#chitietsanpham_'+id).submit();
        })
    </script>
@endsection