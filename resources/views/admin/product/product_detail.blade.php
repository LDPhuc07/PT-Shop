@extends('admin.master.master')
@section('content')
<style>
  .content-wrapper {
    margin-top: unset;
  }
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
    .search {
      width: calc( 100% - 96px);
      margin: unset;
    }
    .sanpham-chitiet {
      padding: unset;
    } 
  }
</style>
<div class="content-wrapper">
  <div class="head-title head-add-pro">
    <a href="{{ route('sanpham.indexAdmin') }}">
      <i class="fas fa-chevron-left"></i>
      <span>Quay lại danh sách sản phẩm</span>
    </a>
    <h3>{{ $sanpham->ten_san_pham}}</h3>
    <div class="add-pro">
      <a href="{{route('chitietsanpham.create',$id)}}">
        <i class="fas fa-plus"></i>
        <p>Thêm chi tiết sản phẩm</p>
      </a>
    </div>
  </div>
  @include('admin.mess.message')
  <div class="row">
      <div class="col-sm-12 sanpham-chitiet">
          <div class="ds-sanpham">
            <div class="head-table">
              <form class="search-form" action="{{route('chitietsanpham.index',$id)}}" method="GET">
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
    {{--  <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <a href="{{route('chitietsanpham.index',['id' =>$id])}}" style="color:black;"><h3>CHI TIẾT SẢN PHẨM</h3></a> 
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
                  <div class="head-table">
                    <div class="search">
                      <form action="{{route('chitietsanpham.index',['id' =>$id])}}" method="GET">
                        <input class="search-txt" value="{{Request::get('search')}}" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                  </div>
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
    </div>  --}}
     <!-- The Modal -->
  <div class="modal fade" id="modalChiTietSanPham">
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
          <button type="button" class="btn btn-danger" id="chitietsanpham" style="background-color:red;color:white">OK</button>
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