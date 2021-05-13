@extends('admin.master.master')
@section('content')
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('admin.products') }}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách nhà sản xuất</span>
        </a>
        <h3>Thêm mới nhà sản xuất</h3>
      </div>
      <form action="">
        <div class="row add-product-form">
          <div class="col-8 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên nhà sản xuất<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" placeholder="Nhập tên nhà sản xuất">
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