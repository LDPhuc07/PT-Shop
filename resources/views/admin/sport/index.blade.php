@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
           <a href="{{route('monthethao.index')}}" style="color:black;"><h3>MÔN THỂ THAO</h3></a> 
          </div>
          
          <div class="add-pro">
             
              <a href="{{route('monthethao.create')}}"> <i class="fas fa-plus" style="margin-right:5px"></i>Thêm môn thể thao</a>
          </div>
        </div>
        @include('admin.mess.message')
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  <div class="head-table">
                    <div style="width: 100%; margin: unset" class="search">
                      <form action="{{route('monthethao.index')}}" method="GET">
                        <input class="search-txt" value="{{Request::get('search')}}" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                  </div>
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Tên môn thể thao</th>
                              {{-- <th>Trạng thái</th> --}}
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($dsMonTheThao as $ds)
                        <tr>
                            <td>{{$ds['ten_the_thao']}}</td>
                            {{-- <td>
                            @if($ds->trang_thai==1)
                            <button style="padding:10px;border-radius:2px" class="btn-success">Hoạt động</button> @else

											      <button style="padding:10px;border-radius:2px" class="btn-danger">Không hoạt động</button>
                            @endif
                            </td> --}}
                            <td style="display:flex">
                              <a href="{{route('monthethao.edit',['id' => $ds['id']])}}" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <form id="monthethao_{{$ds['id']}}" action="{{route('monthethao.delete',['id' => $ds['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <span class="delete-btn cursor" data-target="#modalTheThao" data-toggle="modal" data-id="{{$ds['id']}}"><i class="fas fa-trash-alt"></i></span>
                              </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $dsMonTheThao->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
                  </div>
              </div>
            </div>
        </div>
    </div>

     <!-- The Modal -->
  <div class="modal fade" id="modalTheThao">
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
          <button type="button" class="btn btn-danger" id="monthethao" style="background-color:red;color:white">OK</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        $('.delete-btn').click(function(){
          let id = $(this).data('id');
          $('#monthethao').attr('data-id',id);
        })
        $('#monthethao').click(function(){
          let id = $(this).data('id');
          $('#monthethao_'+id).submit();
        })
    </script>
@endsection
