@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Nhà sản xuất</h3>
          </div>
          <div class="add-pro">
            <a href="{{ route('admin.products.create') }}">
              <i class="fas fa-plus"></i>
              <p>Thêm nhà sản xuất</p>
            </a>
          </div>
        </div>
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
                              <th>Tên nhà sản xuất</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>Adidas</td>
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