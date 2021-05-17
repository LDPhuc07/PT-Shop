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
                  <span class="heading-name_acc">Quốc Trung</span>
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
                <div class="form-group">
                  <label for="fullname" class="form-label">Tên đầy đủ</label>
                  <input id="fullname" name="fullname" type="text" placeholder="VD: Quốc Trung" class="form-control" value="Quốc Trung">
                  <span class="form-message"></span>
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Email</label>
                  <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control" value="abc@gmail.com" >
                  <span class="form-message"></span>
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Địa chỉ</label>
                  <input id="email" name="email" type="text" placeholder="VD: 86/2/3 Bình Thạnh TP HCM" class="form-control" value="86 Đinh Bộ Lĩnh Phường 26 Quận Bình Thạnh TP.HCM" >
                  <span class="form-message"></span>
                </div>
                <div class="form-group">
                  <label for="sdt" class="form-label">Số điện thoại</label>
                  <input id="sdt" name="sdt" type="number" placeholder="VD: 089" class="form-control" value="0912420530">
                  <span class="form-message"></span>
                </div>
                <div class="form-group">
                  <label for="avatar" class="form-label">Cập nhật avatar</label>
                  <input id="avatar" name="avatar" type="file" class="form-control">
                  <span class="form-message"></span>
                </div>
                <button class="form-submit">Lưu</button>
              </div>
            </div>
            <div class="detail__confirm-password undisplay">
              <div class="heading-edit-password">
                <h2>Đổi lại mật khẩu</h2>
              </div>
              <div class="form-group form-group-old-password">
                <div style="display:flex;justify-content: space-between;">
                  <label for="password" class="form-label">Mật khẩu cũ</label>
                  <span class="show-hide"><i class="fas fa-eye"></i></span>
                </div>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
              </div>
              <div class="form-group form-group-new-password">
                <div style="display:flex;justify-content: space-between;">
                  <label for="password-new" class="form-label">Mật khẩu mới</label>
                  <span class="show-hide-two"><i class="fas fa-eye fa-eye-2"></i></span>
                </div>
                <input id="password-new" name="password-new" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
              </div>
              <div class="form-group form-group-confirm-password">
                <div style="display:flex;justify-content: space-between;">
                  <label for="password-confirm" class="form-label">Nhập lại mật khẩu</label>
                  <span class="show-hide-three"><i class="fas fa-eye fa-eye-3"></i></span>
                </div>
                <input id="password-confirm" name="password-confirm" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
              </div>
              <button class="form-submit">Lưu</button>
            </div>
          </div>
        </div>
    </div>
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
@endsection