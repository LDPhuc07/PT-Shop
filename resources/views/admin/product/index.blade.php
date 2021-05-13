@extends('admin.master.master')
@section('content')
    <div class="content-wrapper">
        <div class="head-title">
          <div class="title-name">
            <h3>Sản phẩm</h3>
          </div>
          <div class="add-pro">
            <a href="{{ route('admin.products.create') }}">
              <i class="fas fa-plus"></i>
              <p>Thêm sản phẩm</p>
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
                              <th>Ảnh</th>
                              <th>Mô tả</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>ADIDAS PREDATOR 20.3 AG/MG</td>
                            <td>Adidas</td>
                            <td>Giày</td>
                            <td>Bóng đá</td>
                            <td>
                              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img class="d-block" src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcStHW4IMH4w1X-BpFBo1EBJ_LNWbO_T3wsZrV3Spj-9nUICVjTbpg52fB4pHGvniO3_n6OMOyTk4cc&usqp=CAc" alt="First slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block" src="..." alt="Second slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block" src="..." alt="Third slide">
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
                              </div>
                            </td>
                            <td>Đẹp lắm</td>
                            <td>
                              <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <a href="" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                          <td>ADIDAS PREDATOR 20.3 AG/MG</td>
                          <td>Adidas</td>
                          <td>Giày</td>
                          <td>Bóng đá</td>
                          <td><img src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcStHW4IMH4w1X-BpFBo1EBJ_LNWbO_T3wsZrV3Spj-9nUICVjTbpg52fB4pHGvniO3_n6OMOyTk4cc&usqp=CAc" alt=""></td>
                          <td>Đẹp lắm</td>
                          <td>
                            <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <a href="" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>ADIDAS PREDATOR 20.3 AG/MG</td>
                          <td>Adidas</td>
                          <td>Giày</td>
                          <td>Bóng đá</td>
                          <td><img src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcStHW4IMH4w1X-BpFBo1EBJ_LNWbO_T3wsZrV3Spj-9nUICVjTbpg52fB4pHGvniO3_n6OMOyTk4cc&usqp=CAc" alt=""></td>
                          <td>Đẹp lắm</td>
                          <td>
                            <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <a href="" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>ADIDAS PREDATOR 20.3 AG/MG</td>
                          <td>Adidas</td>
                          <td>Giày</td>
                          <td>Bóng đá</td>
                          <td><img src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcStHW4IMH4w1X-BpFBo1EBJ_LNWbO_T3wsZrV3Spj-9nUICVjTbpg52fB4pHGvniO3_n6OMOyTk4cc&usqp=CAc" alt=""></td>
                          <td>Đẹp lắm</td>
                          <td>
                            <a href="" class="edit-btn"><i class="fas fa-edit"></i></a>
                              <a href="" class="delete-btn"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <td>ADIDAS PREDATOR 20.3 AG/MG</td>
                          <td>Adidas</td>
                          <td>Giày</td>
                          <td>Bóng đá</td>
                          <td><img src="https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcStHW4IMH4w1X-BpFBo1EBJ_LNWbO_T3wsZrV3Spj-9nUICVjTbpg52fB4pHGvniO3_n6OMOyTk4cc&usqp=CAc" alt=""></td>
                          <td>Đẹp lắm</td>
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