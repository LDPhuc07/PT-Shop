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
                              <th>Giá bán</th>
                              <th>Giảm giá</th>
                              <th>Hình ảnh</th>
                              <th>Mô tả</th>
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($dsSanPham as $ds)
                        <tr>
                            <td>{{$ds['ten_san_pham']}}</td>
                            <td>{{$ds->nhaSanXuat->ten_nha_san_xuat}}</td>
                            <td>{{$ds->loaiSanPham->ten_loai_san_pham}}</td>
                            <td>{{$ds->monTheThao->ten_the_thao}}</td>
                            <td>{{$ds['gia_ban']}}</td>
                            <td>{{$ds['giam_gia']}}</td>
                            <td>
                              @foreach($ds->anh as $anh)
                                @if($anh->anhchinh == 1)
                                  <img src="{{asset($anh->link)}}" alt="anh">
                                @endif
                              @endforeach
                            </td>
                            <td>{{$ds['mo_ta']}}</td>
                            <td style="display:flex">
                              <a href="{{route('sanpham.edit',['id' => $ds['id']])}}" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <form id="slideshow_{{$ds['id']}}" action="{{route('slideshow.delete',['id' => $ds['id']])}}" method="POST">
                                @csrf
                                @method('DELETE')
                              <span class="delete-btn cursor" data-target="#modalSlideShow" data-toggle="modal" data-id="{{$ds['id']}}"><i class="fas fa-trash-alt"></i></span>
                              <a href="" class="view-detail-btn"><i class="fas fa-eye"></i></a>
                              </form>
                            </td>
                        </tr>
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