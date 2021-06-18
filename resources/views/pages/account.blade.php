@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/account.css">
@endsection
@section('content')
<style>
  .head-product-picture label {
    font-size: 14px; 
    cursor: pointer;
    /* float: right; */
    color: blue;
    
    margin: 0;
  }
  .head-product-picture label:hover {
    border-bottom: 1px solid blue; 
  }
</style>
<div class="cart" style="margin-top: 160px;">
    <div class="container" style="margin-top: 180px;">
        <div class="row">
          <div class="col-4">
              <div class="heading">
                  <img src="{{asset('img/product/noavatar.png')}}" alt="" class="heading-img">
                  <span class="heading-name_acc"></span>
              </div>
              <div class="menu-manager">
                  <div class="my-profile" onclick="hienThiDoiThongTin()">
                      <div class="my-profile-title active">
                        <div class="my-profile-icon"><i class="fas fa-user"></i></div>
                        <div class="my-profile-name">Hồ sơ của tôi</div>
                      </div>
                  </div>
                  <div class="my-order">
                    <div class="my-order-title">
                      <div class="my-order-icon"><i class="fas fa-shopping-bag"></i></div>
                    <div class="my-order-name">Đơn hàng của tôi</div>
                    </div>
                  </div>
                  <div class="my-password" onclick="hienThiDoiMatKhau()">
                    <div class="my-password-title">
                      <div class="my-password-icon"><i class="fas fa-key"></i></div>
                      <div class="my-password-name">Đổi mật khẩu</div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-8">
            <div class="detial__my-profile ">
              <div class="heading-edit-account">
                <h2>Hồ sơ của tôi</h2>
                @foreach($arrays as $account)
                <form action="{{ route('accounts.update',$account->id) }}" method="POST">
                  @method('PUT')
                  @csrf
                  <div class="form-group">
                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                    <input id="fullname" name="ho_ten" type="text" placeholder="VD: Quốc Trung" class="form-control" value="{{ $account->ho_ten }}">
                    <span class="form-message"></span>
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
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control" value="{{ $account->email }}" >
                    <span class="form-message"></span>
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
                  <div class="form-group">
                    <label for="email" class="form-label">Địa chỉ</label>
                    <input id="email" name="dia_chi" type="text" placeholder="VD: 86/2/3 Bình Thạnh TP HCM" class="form-control" value="{{ $account->dia_chi }}" >
                    <span class="form-message"></span>
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
                  <div class="form-group">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input id="sdt" name="so_dien_thoai" type="number" placeholder="VD: 089" class="form-control" value="{{ $account->so_dien_thoai }}">
                    <span class="form-message"></span>
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
                  <label for="avatar" class="form-label">Cập nhật avatar</label>
                  @if($account->anh_dai_dien == null)
                  <div class="form-group head-product-picture">
                    <input name="avatar" type="file" id="myFile" class="form-control" style="display: none" onchange="loadfile(event)">
                    <label for="myFile">Chọn ảnh</label>
                    <span class="form-message"></span>
                  </div>
                  <div class="form-group ">
                    <img src="{{asset('img/no-image.png')}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                  </div>
                  @else
                  <div class="form-group head-product-picture">
                    <input name="avatar" type="file" id="myFile" class="form-control" style="display: none" onchange="loadfile(event)">
                    <label for="myFile">Chọn ảnh</label>
                    <span class="form-message"></span>
                  </div>
                  <div class="form-group ">
                    <img src="{{asset(getLink('anh-dai-dien',$array->anh_dai_dien))}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                  </div>
                  @endif
                  <button class="form-submit">Lưu</button>
                </form>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
    <script>
      var loadfile = function(event){
        var img = document.getElementById('imgsp');
        img.src = URL.createObjectURL(event.target.files[0]);
    }
    </script>
@endsection
@section('js')
<script>
    const pass_field = document.querySelector('#password');
    const show_btn = document.querySelector('.fa-eye')
    show_btn.addEventListener("click",function(){
      if(pass_field.type === "password"){
          pass_field.type = "text";
          show_btn.classList.add("hide");
      } else {
          pass_field.type = "password";
          show_btn.classList.remove("hide");
      }
    });
  </script>
  <script>
    const pass_field2 = document.querySelector('#password-new');
    const show_btn2 = document.querySelector('.fa-eye-2')
    show_btn2.addEventListener("click",function(){
      if(pass_field2.type === "password"){
          pass_field2.type = "text";
          show_btn2.classList.add("hide");
      } else {
          pass_field2.type = "password";
          show_btn2.classList.remove("hide");
      }
    });
  </script>
  <script>
    const pass_field3 = document.querySelector('#password-confirm');
    const show_btn3 = document.querySelector('.fa-eye-3')
    show_btn3.addEventListener("click",function(){
      if(pass_field3.type === "password"){
          pass_field3.type = "text";
          show_btn3.classList.add("hide");
      } else {
          pass_field3.type = "password";
          show_btn3.classList.remove("hide");
      }
    });
  </script>

  {{--  <script type="text/javascript">
    $(document).ready(function() {
      $(".submit-change-pass").ckick(function(e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var mat_khau_cu = $("input[name='mat_khau_cu']").val();
        var mat_khau_moi = $("input[name='mat_khau_moi']").val();
        var nhap_lai_mat_khau = $("input[name='nhap_lai_mat_khau']").val();

        $.ajax({
          url: "{{ route('account.changePassword',Auth::user()->id) }}",
          type: 'PUT',
          data: {_token:_token,
            mat_khau_cu:mat_khau_cu,
            mat_khau_moi:mat_khau_moi,
            nhap_lai_mat_khau:nhap_lai_mat_khau},
          success: function(data) {
            if($.isEmptyObject(data.error)) {
              alert(data.success);
            }
            
          }
        });
      });
    };
  </script>  --}}
@endsection