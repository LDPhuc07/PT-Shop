@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Sản phẩm</h3>
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
                      <form action="">
                        <input class="search-txt" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                  </div>
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Tên ảnh</th>
                              <th>Link ảnh</th>
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
                            <td>
                              <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <a href="" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
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
@endsection