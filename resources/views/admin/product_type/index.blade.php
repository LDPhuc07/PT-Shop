@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Loại sản phẩm</h3>
          </div>
          
          <div class="add-pro">
             
              <a href="{{route('loaisanpham.create')}}"> <i class="fas fa-plus" style="margin-right:5px"></i>Thêm loại sản phẩm</a>
          </div>
        </div>
        @include('admin.mess.message')
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  <div class="head-table">
                    <div class="search">
                      <form action="{{route('loaisanpham.index')}}" method="GET">
                        <input class="search-txt" value="{{Request::get('search')}}" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                  </div>
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Tên loại sản phẩm</th>
                              {{-- <th>Trạng thái</th> --}}
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($dsLoaiSanPham as $ds)
                        <tr>
                            <td>{{$ds['ten_loai_san_pham']}}</td>
                            {{-- <td>
                            @if($ds->trang_thai==1)
                            <button style="padding:10px;border-radius:2px" class="btn-success">Hoạt động</button> @else

											      <button style="padding:10px;border-radius:2px" class="btn-danger">Không hoạt động</button>
                            @endif
                            </td> --}}
                            <td style="display:flex">
                              <a href="{{route('loaisanpham.edit',['id' => $ds['id']])}}" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <form id="loaisanpham_{{$ds['id']}}" action="{{route('loaisanpham.delete',['id' => $ds['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <span class="delete-btn cursor" data-target="#modalLoaiSanPham" data-toggle="modal" data-id="{{$ds['id']}}"><i class="fas fa-trash-alt"></i></span>
                              </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $dsLoaiSanPham->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
                  </div>
              </div>
            </div>
        </div>
    </div>

     <!-- The Modal -->
  <div class="modal fade" id="modalLoaiSanPham">
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
          <button type="button" class="btn btn-danger" id="loaisanpham" style="background-color:red;color:white">confirm</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $('.delete-btn').click(function(){
          let id = $(this).data('id');
          $('#loaisanpham').attr('data-id',id);
        })
        $('#loaisanpham').click(function(){
          let id = $(this).data('id');
          $('#loaisanpham_'+id).submit();
        })
    </script>
@endsection
