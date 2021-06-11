@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
@endsection
@section('content')
<div class="container" style="margin-top:165px">
    <div class="registration__form">
        <div class="row">
            <div class="col-6">
              <form action="" method="POST" class="form">
                  @csrf
                  <h3 class="heading">ĐĂNG KÍ</h3>
                  <div class="form-group">
                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                    <input id="fullname" name="ho_ten" type="text" placeholder="VD: Sơn Đặng" class="form-control">
                    <span class="form-message"></span>
                    @if($errors->has('ho_ten'))
                            <span style="font-size: 13px; color:red">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('ho_ten') }}
                            </span>
                            <style>
                                #fullname {
                                    border: 1px solid red;
                                }
                            </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
                    <span class="form-message"></span>
                    @if($errors->has('email'))
                            <span style="font-size: 13px; color:red">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('email') }}
                            </span>
                            <style>
                                #email {
                                    border: 1px solid red;
                                }
                            </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" name="mat_khau" type="password" placeholder="Nhập mật khẩu" class="form-control">
                    <span class="show-hide" style="top: 51%;"><i class="fas fa-eye"></i></span>
                    <span class="form-message"></span>
                    @if($errors->has('mat_khau'))
                            <span style="font-size: 13px; color:red">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('mat_khau') }}
                            </span>
                            <style>
                                #password {
                                    border: 1px solid red;
                                }
                            </style>
                    @endif
                  </div>
              
                  <div class="form-group">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input id="password_confirmation" name="nhap_lai_mat_khau" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
                    <span class="show-hide-two" style="top: 66%;"><i class="fas fa-eye fa-eye-2"></i></span>
                    <span class="form-message"></span>
                    @if($errors->has('nhap_lai_mat_khau'))
                            <span style="font-size: 13px; color:red">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('nhap_lai_mat_khau') }}
                            </span>
                            <style>
                                #password_confirmation {
                                    border: 1px solid red;
                                }
                            </style>
                    @endif
                  </div>
                  {{--  <div class="form-group">
                    <label for="gender" class="form-label">Giới tính</label>
                    <div>
                      <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="male">Nam
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" class="form-check-input" name="gender" value="female">Nữ
                    </div>
                    <div class="form-check-inline">
                      <input type="radio" class="form-check-input" name="gender" value="order">Khác
                    </div>
                    </div>
                    <span class="form-message"></span>
                  </div>  --}}
                  
                  <button class="form-submit">Đăng ký <i class="fi-rs-arrow-right"></i></button>
                  <p style="font-size: 16px;margin: 10px 0;">Bạn đã có tài khoản? <a href="./Login.html" style="color: black; font-weight: bold">Đăng nhập</a></p>
              </form>
            </div>
            <div class="col-6">
              <h3 class="heading">TẠO MỘT TÀI KHOẢN</h3>
              <p class="text-login">Đăng nhập bằng tài khoản sẽ giúp bạn truy cập:</p>
              <ul>
                  <li class="text-login-item"><i class="fi-rs-check"></i><p class="text-login">Một lần đăng nhập chung duy nhất để tương tác với các sản phẩm và dịch vụ của P&T shop
                  </p></li>
                  <li class="text-login-item"><i class="fi-rs-check"></i><p class="text-login">Thanh toán nhanh hơn</p></li>
                  <li class="text-login-item"><i class="fi-rs-check"></i><p class="text-login">Xem lịch sử đặt hàng riêng của bạn</p></li>
                  <li class="text-login-item"><i class="fi-rs-check"></i><p class="text-login">Thêm hoặc thay đổi tùy chọn email</p></li>
                </ul>
          </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="js/validator.js"></script>
    <script src="js/main.js"></script>
    <script>
      Validator({
        form: '#form-1',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [ 
          Validator.isRequired('#fullname','Vui lòng nhập tên đầy đủ'),
          Validator.isRequired('#email'),
          Validator.isEmail('#email'),
          Validator.minLength('#password', 6),
          Validator.isRequired('#password_confirmation'),
          Validator.isRequired('input[name="gender"]'),
          Validator.isConfirmed('#password_confirmation', function(){
            return document.querySelector('#form-1 #password').value;
          }, 'Mật khẩu nhập lại không chính xác')
        ],
      });
  </script>
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
    const pass_field2 = document.querySelector('#password_confirmation');
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
@endsection