@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Chi tiết Sản phẩm</h3>
          </div>
          <div class="add-pro">
            <a href="{{ route('admin.products.create') }}">
              <i class="fas fa-plus"></i>
              <p>Thêm chi tiết sản phẩm</p>
            </a>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ds-sanpham">
                  {{-- <div class="head-table">
                    {{-- <div class="search">
                      <form action="">
                        <input class="search-txt" type="text" placeholder="Search.." name="search">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                      </form>
                    </div> --}}
                    {{-- <div class="group-filter-btn">
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
                    </div> --}}
                  </div> --}}
                  <div class="ds-sanpham-div">
                    <table class="table-ds-sanpham">
                      <thead>
                          <tr>
                              <th>Màu</th>
                              <th>Kích thước</th>
                              <th>Số lượng</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>Trắng</td>
                            <td>34</td>
                            <td>20</td>
                            <td>
                              <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <a href="" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                  </div>
              </div>
            </div>
        </div>
    </div>
@endsection