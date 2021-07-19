@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <a href="{{route('slideshow.index')}}" style="color:black;"><h3>Slideshow</h3></a>
          </div>
          <div class="add-pro">
            <a href="{{ route('slideshow.create') }}">
              <i class="fas fa-plus"></i>
              <p>Thêm slideshow</p>
            </a>
          </div>
        </div>
        @include('admin.mess.message')
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  <div class="head-table">
                    <div class="search">
                      <form action="{{route('slideshow.index')}}" method="GET">
                        <input class="search-txt" value="{{Request::get('search')}}" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                  </div>
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Tên slideshow</th>
                              <th>Link slideshow</th>
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($dsSlideShow as $ds)
                        <tr>
                            <td>{{$ds['slideshow']}}</td>
                            <td>
                              <img src="{{asset(getLink('slideshow',$ds['link']))}}" alt="anh">
                            </td>
                            <td style="display:flex">
                              <a href="{{route('slideshow.edit',['id' => $ds['id']])}}" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <form id="slideshow_{{$ds['id']}}" action="{{route('slideshow.delete',['id' => $ds['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <span class="delete-btn cursor" data-target="#modalSlideShow" data-toggle="modal" data-id="{{$ds['id']}}"><i class="fas fa-trash-alt"></i></span>
                              </form>
                            </td>
                        </tr>
                        {{-- Không khuyến khích làm cách này nha, kiểm tra đổ ra với edit hơi cưcj --}}
                    </tbody>
                    @endforeach
                  </table>
                  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $dsSlideShow->appends(request()->query())->links() !!}
                    </ul>
                  </nav>  
                  </div>
              </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
  <div class="modal fade" id="modalSlideShow">
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
          <button type="button" class="btn " data-dismiss="modal">Hủy</button>
          <button type="button" class="btn btn-danger" id="slideshow" style="background-color:red;color:white">OK</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $('.delete-btn').click(function(){
          let id = $(this).data('id');
          $('#slideshow').attr('data-id',id);
        })
        $('#slideshow').click(function(){
          let id = $(this).data('id');
          $('#slideshow_'+id).submit();
        })
    </script>
@endsection