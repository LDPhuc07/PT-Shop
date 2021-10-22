@extends('admin.master.master')
@section('content')
<style>
  .tim_kiem_btn {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
    height: 38px;
    width: 80px;
    margin-left: 16px;
  }
  .search-form {
    width: 100%;
    display: inline-block;
  } 
  .search {
    width: calc( 100% - 96px);
    margin: unset;
  }
  .search-txt {
    padding: 4px 6px 4px 6px;
  }
  @media(max-width: 767px) {
    .content-wrapper {
      margin-top: unset;
    }
    h3 {
      font-size: 1.70rem;
    }
  }
</style>
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <a href="{{route('loaisanpham.index')}}" style="color:black;"><h3>LOẠI SẢN PHẨM</h3></a>
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
                    <form class="search-form"  action="{{route('loaisanpham.index')}}" method="GET">
                      <div class="search">
                        <input class="search-txt" value="{{Request::get('search')}}" type="text" placeholder="Search.." name="search">
                      </div>
                      <input type="submit" class="btn tim_kiem_btn" value="Tìm kiếm">
                  </form>
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
          <h4 class="modal-title" style="color:orange">Cảnh báo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Bạn thật sự muốn xóa
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Hủy</button>
          <button type="button" class="btn btn-danger" id="loaisanpham" style="background-color:red;color:white">OK</button>
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
