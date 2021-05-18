@extends('admin.master.master')
@section('content')
<div class="product-container">
    <div class="head-title head-add-pro">
      <a href="{{ route('admin.products') }}">
        <i class="fas fa-chevron-left"></i>
        <span>Quay lại trang chủ</span>
      </a>
      <h3>Quản lý tài khoản</h3>
    </div>
    @foreach ($arrays as $array)
      <form action="{{ route('admin.accounts.update',$array->id) }}" method="POST">
      @method('PUT')
      @csrf
      <div style="margin: 25px 300px 0;" class="add-product-form">
          <div class="product-info">
            <div class="product-info-item">
              <label class="product-info-item-label" for="">Họ và tên</label>
              <input class="textbox" type="text" name="ho_ten" value="{{ $array->ho_ten }}" placeholder="Nhập họ và tên">
              @if($errors->has('ho_ten'))
                <span style="font-size: 13px; color:red">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('ho_ten') }}
                </span>
                <style>
                    input[name='ho_ten'] {
                        border: 1px solid red;
                    }
                </style>
              @endif
            </div>
            <div class="product-info-item">
              <label class="product-info-item-label" for="">Email</label>
              <input class="textbox" type="text" name="email" value="{{ $array->email }}" placeholder="Nhập email">
              @if($errors->has('email'))
                <span style="font-size: 13px; color:red">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('email') }}
                </span>
                <style>
                    input[name='email'] {
                        border: 1px solid red;
                    }
                </style>
              @endif
            </div>
            <div class="product-info-item">
              <label class="product-info-item-label" for="">Số điện thoại</label>
              <input class="textbox" type="text" name="so_dien_thoai" value="{{ $array->so_dien_thoai }}" placeholder="Nhập số điện thoại">
              @if($errors->has('so_dien_thoai'))
                <span style="font-size: 13px; color:red">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('so_dien_thoai') }}
                </span>
                <style>
                    input[name='so_dien_thoai'] {
                        border: 1px solid red;
                    }
                </style>
              @endif
            </div>
              <div class="product-info-item">
              <label class="product-info-item-label" for="">Địa chỉ</label>
              <input class="textbox" type="text" name="dia_chi" value="{{ $array->diachi }}" placeholder="Nhập địa chỉ">
              @if($errors->has('dia_chi'))
                <span style="font-size: 13px; color:red">
                    <i class="fas fa-times"></i>
                    {{ $errors->first('dia_chi') }}
                </span>
                <style>
                    input[name='dia_chi'] {
                        border: 1px solid red;
                    }
                </style>
              @endif
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
    @endforeach
  </div>
@endsection