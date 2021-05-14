@extends('admin.master.master')
@section('content')
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('nhasanxuat.index')}}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách môn thể thao</span>
        </a>
        <h3>Chỉnh sửa môn thể thao</h3>
      </div>
      <form action="{{route('nhasanxuat.update',$dsNhaSanXuat['id'])}}" method="POST">
        @method('PUT')
        @csrf
        {{-- <input type="hidden" value="{{$dsMonTheThao['id']}}" name="id"> --}}
        <div class="row add-product-form">
          <div class="col-12 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên nhà sản xuất<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" placeholder="Nhập tên nhà sản xuất" value="{{$dsNhaSanXuat['ten_nha_san_xuat']}}" name="tennhasanxuat">
                <div class="error error-name" 	@if($errors->has('tennhasanxuat')) style="display:block;color:red" @endif>{{$errors->first('tennhasanxuat')}}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-footer">
          <div class="product-footer-btn">
            {{-- <button class="destroy-btn btn">Hủy</button> --}}
            <button class="save-btn btn">Lưu</button>
          </div>
        </div>
      </form>
    </div>
@endsection