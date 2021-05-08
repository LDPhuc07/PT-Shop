@extends('admin.master.master')
@section('content')
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="sanpham.html">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách sản phẩm</span>
        </a>
        <h3>Thêm mới sản phẩm</h3>
      </div>
      <div class="row add-product-form">
        <div class="col-8 pl-0 pr-10">
          <div class="product-info">
            <div class="product-info-item">
              <label class="product-info-item-label" for="">Tên sản phẩm<span class="repuired"> *</span></label>
              <i class="fas fa-info"></i>
              <input class="textbox" type="text" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="product-info-item">
              <label class="product-info-item-label" for="">Nhà sản xuất<span class="repuired"> *</span></label>
              <i class="fas fa-info"></i>
              <input class="textbox" type="text">
            </div>
            <div class="product-info-item">
              <div class="row">
                <div class="col-6">
                  <label class="product-info-item-label" for="">Loại sản phẩm<span class="repuired"> *</span></label>
                  <i class="fas fa-info"></i>
                  <input class="textbox" type="text">
                </div>
                <div class="col-6">
                  <label class="product-info-item-label" for="">Bộ môn thể thao<span class="repuired"> *</span></label>
                  <i class="fas fa-info"></i>
                  <input class="textbox" type="text">
                </div>
              </div>
            </div>
            <div class="product-info-item">
              <div class="row">
                <div class="col-4">
                  <label class="product-info-item-label" for="">Kích cỡ<span class="repuired"> *</span></label>
                  <i class="fas fa-info"></i>
                  <input class="textbox" type="text">
                </div>
                <div class="col-4">
                  <label class="product-info-item-label" for="">Màu<span class="repuired"> *</span></label>
                  <i class="fas fa-info"></i>
                  <input class="textbox" type="text">
                </div>
                <div class="col-4">
                  <label class="product-info-item-label" for="">Giá bán<span class="repuired"> *</span></label>
                  <i class="fas fa-info"></i>
                  <input class="textbox" type="text">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 pr-0 pl-10">
          <div class="product-info product-picture">
            <div class="head-product-picture">
              <span>Ảnh sản phẩm</span>
              <a href="">Thêm ảnh</a>
            </div>
            <div class="product-picture-item">
              <img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="product-footer">
        <div class="product-footer-btn">
          <button class="destroy-btn btn">Hủy</button>
          <button class="save-btn btn">Lưu</button>
        </div>
      </div>
    </div>
@endsection