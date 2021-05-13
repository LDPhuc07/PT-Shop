@extends('admin.master.master')
@section('content')
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('admin.products') }}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách chi tiết sản phẩm</span>
        </a>
        <h3>Chỉnh sửa chi tiết sản phẩm</h3>
      </div>
      <form action="">
        <div class="row add-product-form">
          <div class="col-12 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên sản phẩm<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" placeholder="Nhập tên sản phẩm">
              </div>
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Màu<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text">
              </div>
              <div class="product-info-item">
                <div class="row">
                  <div class="col-6">
                    <label class="product-info-item-label" for="">Kích thước<span class="repuired"> *</span></label>
                    <i class="fas fa-info"></i>
                    <input class="textbox" type="text">
                  </div>
                  <div class="col-6">
                    <label class="product-info-item-label" for="">Số lượng<span class="repuired"> *</span></label>
                    <i class="fas fa-info"></i>
                    <input class="textbox" type="text">
                  </div>
                </div>
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
      </form>
    </div>
@endsection