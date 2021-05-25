@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Sản phẩm</h3>
          </div>
          <div class="add-pro">
            <a href="{{ route('sanpham.create') }}">
              <i class="fas fa-plus"></i>
              <p>Thêm sản phẩm</p>
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
                    <div class="group-filter-btn">
                      <div class="filter-catagories-wrap">
                        <button id="filter-catagories-wrap-id" class="filter-catagories-btn btn">
                          <span>Loại sản phẩm</span>
                          <i class="fas fa-caret-down"></i>
                        </button>
                        <div id="popover-catagories" class="popover">
                          <div class="arrow"></div>
                        </div>
                      </div>
                      <div class="filter-catagories-sport-wrap">
                        <button id="filter-catagories-sport-wrap-id" class="filter-catagories-sport-btn btn">
                          <span>BM thể thao</span>
                          <i class="fas fa-caret-down"></i>
                        </button>
                        <div id="popover-catagories-sport" class="popover">
                          <div class="arrow"></div>
                        </div>
                      </div>
                      <div class="filter-producer-wrap">
                        <button id="filter-producer-wrap-id" class="filter-producer-btn btn">
                          <span>Nhà sản xuất</span>
                          <i class="fas fa-caret-down"></i>
                        </button>
                        <div id="popover-producer" class="popover">
                          <div class="arrow"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Tên sản phẩm</th>
                              <th>Nhà sản xuất</th>
                              <th>Loại sản phẩm</th>
                              <th>BM thể thao</th>
                              {{-- <th>Ảnh</th> --}}
                              <th>Giá bán</th>
                              <th>Giảm giá</th>
                              <th>Hình ảnh</th>
                              <th>Mô tả</th>
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($dsSanPham as $ds)
                        {{-- @php dd() @endphp --}}
                        <tr>
                            <td>{{$ds['ten_san_pham']}}</td>
                            <td>{{$ds->nhaSanXuat->ten_nha_san_xuat}}</td>
                            <td>{{$ds->loaiSanPham->ten_loai_san_pham}}</td>
                            <td>{{$ds->monTheThao->ten_the_thao}}</td>
                            <td>{{$ds['gia_ban']}}</td>
                            <td>{{$ds['giam_gia']}}</td>
                            <td>
                              {{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  @foreach($ds->anh as $key=>$value)
                                    <div class="carousel-item active">
                                      <img class="d-block" @if(empty($value->link)) src="{{asset('img/no-image.png')}}" @else src="{{asset($value->link)}}" @endif alt="First slide" name='anh1'>
                                    </div>
                                  @endforeach
                                
                                  <div class="carousel-inner" style="width:50px;height:50px">
                                    <div class="carousel-item active">
                                      <img class="d-block w-100" src="{{asset('img/no-image.png')}}" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="{{asset('img/no-image.png')}}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="{{asset('img/no-image.png')}}" alt="Third slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="{{asset('img/no-image.png')}}" alt="Fourth slide">
                                    </div>
                                  </div>  
                                  
                                  </div>
                                    
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                                
                              </div> --}}
                              <img src="{{asset('img/product/'. $ds['anh'] )}}" alt="anh">
                            </td>
                            <td>{{$ds['mo_ta']}}</td>
                            <td>
                              <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <a href="" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
                              <a href="" class="view-detail-btn"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        {{-- Không khuyến khích làm cách này nha, kiểm tra đổ ra với edit hơi cưcj --}}
                    </tbody>
                    @endforeach
                  </table>
                  <nav aria-label="Page navigation example" style="margin-top:20px">
                    <ul class="pagination">
                      {!! $dsSanPham->appends(request()->query())->links() !!}
                    </ul>
                  </nav>
                  </div>
              </div>
            </div>
        </div>
    </div>
@endsection