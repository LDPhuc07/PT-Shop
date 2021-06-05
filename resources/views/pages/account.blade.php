@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/account.css">
@endsection
@section('content')
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
                  <div class="form-group">
                    <label for="avatar" class="form-label">Cập nhật avatar</label>
                    <input id="avatar" name="avatar" type="file" class="form-control">
                    <span class="form-message"></span>
                  </div>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                  <div class="form-group">
                    <img src="{{asset('img/no-image.png')}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                </div>
=======
>>>>>>> parent of cc9a3d8 (Like_ThanhToanUpdate)
=======
>>>>>>> parent of cc9a3d8 (Like_ThanhToanUpdate)
=======
                  <div class="form-group">
                    <img src="{{asset('img/no-image.png')}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                </div>
>>>>>>> parent of 5409a4e (new Like_ThanhToan)
                  <button class="form-submit">Lưu</button>
                </form>
              </div>
            </div>
            <div class="detail__confirm-password undisplay">
              <div class="heading-edit-password">
                <h2>Đổi lại mật khẩu</h2>
              </div>
              <form action="{{ route('account.changePassword',$account->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group form-group-old-password">
                  <div style="display:flex;justify-content: space-between;">
                    <label for="password" class="form-label">Mật khẩu cũ</label>
                    <span class="show-hide"><i class="fas fa-eye"></i></span>
                  </div>
                  <input id="password" name="mat_khau_cu" type="password" placeholder="Nhập mật khẩu" class="form-control">
                  <span class="form-message"></span>
                  @if($errors->has('mat_khau_cu'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('mat_khau_cu') }}
                      </span>
                      <style>
                          input[name='mat_khau_cu'] {
                              border: 1px solid red;
                          }
                      </style>
                  @endif
                </div>
                <div class="form-group form-group-new-password">
                  <div style="display:flex;justify-content: space-between;">
                    <label for="password-new" class="form-label">Mật khẩu mới</label>
                    <span class="show-hide-two"><i class="fas fa-eye fa-eye-2"></i></span>
                  </div>
                  <input id="password-new" name="mat_khau_moi" type="password" placeholder="Nhập mật khẩu" class="form-control">
                  <span class="form-message"></span>
                  @if($errors->has('mat_khau_moi'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('mat_khau_moi') }}
                      </span>
                      <style>
                          input[name='mat_khau_moi'] {
                              border: 1px solid red;
                          }
                      </style>
                  @endif
                </div>
                <div class="form-group form-group-confirm-password">
                  <div style="display:flex;justify-content: space-between;">
                    <label for="password-confirm" class="form-label">Nhập lại mật khẩu</label>
                    <span class="show-hide-three"><i class="fas fa-eye fa-eye-3"></i></span>
                  </div>
                  <input id="password-confirm" name="nhap_lai_mat_khau" type="password" placeholder="Nhập mật khẩu" class="form-control">
                  <span class="form-message"></span>
                  @if($errors->has('nhap_lai_mat_khau'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('nhap_lai_mat_khau') }}
                      </span>
                      <style>
                          input[name='nhap_lai_mat_khau'] {
                              border: 1px solid red;
                          }
                      </style>
                  @endif
                </div>
                <button class="form-submit submit-change-pass">Lưu</button>
              </form>
              @endforeach
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
  <script>
    function hienThiDoiMatKhau(){
      $(".detail__confirm-password").removeClass("undisplay");
      $(".detail__confirm-password").addClass("display");
      $(".my-password-title").addClass("active");
      $(".my-profile-title").removeClass("active");
      $(".detial__my-profile").addClass("undisplay");
      $(".detial__my-profile").removeClass("display");
    }
    function hienThiDoiThongTin(){
      $(".detial__my-profile").removeClass("undisplay");
      $(".detial__my-profile").addClass("display");
      $(".my-profile-title").addClass("active");
      $(".my-password-title").removeClass("active");
      $(".detail__confirm-password").addClass("undisplay");
      $(".detail__confirm-password").removeClass("display");
    }
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