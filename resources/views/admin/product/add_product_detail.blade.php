@extends('admin.master.master')
@section('content')
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{route('chitietsanpham.index',['id' =>$id])}}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách chi tiết sản phẩm</span>
        </a>
        <h3>Thêm mới chi tiết sản phẩm</h3>
      </div>
      <form action="{{route('chitietsanpham.store',['id' =>$id])}}" method="POST">
        @csrf
        <div class="row add-product-form">
          <div class="col-12 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                {{-- <input type="hidden" name="id"> --}}
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Màu<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" name="mau" required pattern="[A-Za-z]+">
                <div class="error error-name" 	@if($errors->has('mau')) style="display:block;color:red" @endif>{{$errors->first('mau')}}</div>
              </div>
              <div class="product-info-item">
                <div class="row">
                  <div class="col-6">
                    <label class="product-info-item-label" for="">Kích thước<span class="repuired"> *</span></label>
                    <i class="fas fa-info"></i>
                    <input class="textbox" type="text" name="kichthuoc">
                    <div class="error error-name" 	@if($errors->has('kichthuoc')) style="display:block;color:red" @endif>{{$errors->first('kichthuoc')}}</div>
                  </div>
                  <div class="col-6">
                    <label class="product-info-item-label" for="">Số lượng<span class="repuired"> *</span></label>
                    <i class="fas fa-info"></i>
                    <input class="textbox" type="text" name="soluong">
                    <div class="error error-name" 	@if($errors->has('soluong')) style="display:block;color:red" @endif>{{$errors->first('soluong')}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-footer">
          <div class="product-footer-btn">
            <button class="save-btn btn">Lưu</button>
          </div>
        </div>
      </form>
    </div>
    
@endsection