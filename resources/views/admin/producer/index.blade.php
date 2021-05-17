@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Nhà sản xuất</h3>
          </div>
          <div class="add-pro">
              <a href="{{route('nhasanxuat.create')}}"> <i class="fas fa-plus" style="margin-right:5px"></i>Thêm nhà sản xuất</a>
          </div>
        </div>
        @include('admin.mess.message')
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  <div class="head-table">
                    <div class="search">
                      <form action="{{route('nhasanxuat.index')}}" method="GET">
                        <input class="search-txt" value="{{Request::get('search')}}" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                  </div>
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Tên nhà sản xuất</th>
                              {{-- <th>Trạng thái</th> --}}
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($dsNhaSanXuat as $ds)
                        <tr>
                            <td>{{$ds['ten_nha_san_xuat']}}</td>
                            {{-- <td>
                            @if($ds->trang_thai==1)
                            <button style="padding:10px;border-radius:2px" class="btn-success">Hoạt động</button> @else

											      <button style="padding:10px;border-radius:2px" class="btn-danger">Không hoạt động</button>
                            @endif
                            </td> --}}
                            <td style="display:flex">
                              <a href="{{route('nhasanxuat.edit',['id' => $ds['id']])}}" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <form id="nhasanxuat_{{$ds['id']}}" action="{{route('nhasanxuat.delete',['id' => $ds['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <span class="delete-btn cursor" data-target="#modalNhaSanXuat" data-toggle="modal" data-id="{{$ds['id']}}"><i class="fas fa-trash-alt"></i></span>
                              </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $dsNhaSanXuat->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
                  </div>
              </div>
            </div>
        </div>
    </div>

     <!-- The Modal -->
  <div class="modal fade" id="modalNhaSanXuat">
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
          <button type="button" class="btn btn-danger" id="nhasanxuat" style="background-color:red;color:white">confirm</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $('.delete-btn').click(function(){
          let id = $(this).data('id');
          $('#nhasanxuat').attr('data-id',id);
        })
        $('#nhasanxuat').click(function(){
          let id = $(this).data('id');
          $('#nhasanxuat_'+id).submit();
        })
    </script>
@endsection
