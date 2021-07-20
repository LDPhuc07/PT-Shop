@extends('admin.master.master')
@section('content')
<style>
  .head-product-picture label {
    font-size: 14px; 
    cursor: pointer;
    float: right;
    color: blue;
    margin: 0;
  }
  .head-product-picture label:hover {
    border-bottom: 1px solid blue; 
  }
</style>
<div class="product-container">
    <div class="head-title head-add-pro">
      <a href="{{ route('admin.products') }}">
        <i class="fas fa-chevron-left"></i>
        <span>Quay lại trang chủ</span>
      </a>
      <h3>Quản lý tài khoản</h3>
    </div>
    @foreach ($arrays as $array)
      <form action="{{ route('admin.accounts.update',$array->id) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div style="margin: 25px 300px 0;" class="add-product-form">
          <div class="product-info">
            <div class="row">
              <div class="col-md-6">
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Họ và tên</label>
                  <input class="textbox" style="    width: 100%;" type="text" name="ho_ten" value="{{ $array->ho_ten }}" placeholder="Nhập họ và tên">
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
                  <input class="textbox" style="    width: 100%;" type="text" name="email" value="{{ $array->email }}" placeholder="Nhập email">
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
                  <input class="textbox" style="    width: 100%;" type="text" name="so_dien_thoai" value="{{ $array->so_dien_thoai }}" placeholder="Nhập số điện thoại">
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
                  <input class="textbox" style="    width: 100%;" type="text" name="dia_chi" value="{{ $array->diachi }}" placeholder="Nhập địa chỉ">
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
              <div class="col-md-6">
                <div class="head-product-picture">
                  <span>Ảnh đại diện</span>
                  @if($array->anh_dai_dien == null)
                  <input type="file" name="anh_dai_dien" id="myFile" style="display: none" onchange="loadfile(event)">
                  <label for="myFile">Chọn ảnh</label>
                </div>
                <div class="product-picture-item">
                  <img id="imgsp" style="width: 230px; margin: 0; margin-top:30px; height: unset" src="https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png" alt="">
                </div>
                @else
                <input type="file" name="anh_dai_dien" id="myFile" style="display: none" onchange="loadfile(event)">
                  <label for="myFile">Cập nhật ảnh</label>
                </div>
                <div class="product-picture-item">
                  <img id="imgsp" style="width: 230px; margin: 0; margin-top:30px; height: unset" src="{{asset(getLink('anh-dai-dien',$array->anh_dai_dien))}}" alt="">
                </div>
                @endif
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
    @endforeach
  </div>
  <script>
    var loadfile = function(event){
        var img = document.getElementById('imgsp');
        img.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection