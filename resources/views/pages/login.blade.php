@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
@endsection
@section('content')
<style>
  .error-msg {
      font-size: 13px;
      color: red;
  }
  .error-msg i {
      margin-right: 2px;
  }
  .border-error {
      border: 1px solid red;
  }
  form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }
  
  form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }
  
  form.example button:hover {
    background: #0b7dda;
  }
  
  form.example::after {
    content: "";
    clear: both;
    display: table;
  }
      /* Mobile & tablet  */
@media (max-width: 1023px) {
  .custom-btn {
    margin: unset; 
  }
}
/* tablet */
@media (min-width: 740px) and (max-width: 1023px) {
  .btn-blocker {
    display: block;
    width: 100%;
  }
  .show-hide {
    top: 56px;
  }
}
/* mobile */
@media (max-width: 739px) {
  .btn-blocker {
    display: block;
    width: 100%;
  }
  
  .show-hide {
    top: 56px;
  }
}
  </style>
<div class="container">
    <div class="login__form">
      <div class="row">
        <div class="col-sm-12 col-lg-6">
         <form id="form" class="form" >
           @csrf
            <h3 class="heading">ĐĂNG NHẬP</h3>
            <a href="{{route('resertPassowrd')}}" class="form__forgot-password">Bạn quên mật khẩu?</a>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
              <span class="form-message"></span>
            </div>
        
            <div class="form-group matkhau">
              <label for="mat_khau" class="form-label">Mật khẩu</label>
              <input id="password" name="mat_khau" type="password" placeholder="Nhập mật khẩu" class="form-control">
              <span class="show-hide"><i class="fas fa-eye"></i></span>
              <!-- <i class="fi-rs-eye-crossed undisplay" onclick="showhide()"></i> -->
              <span class="form-message"></span>

            </div>
            <input type="hidden" name="remember">
            <button id="login-id" class="form-submit btn-blocker ">ĐĂNG NHẬP <i class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i></button>
            {{--  <h4>HOẶC</h4>  --}}
            <div class="form-social">
              {{--  <a href="{{url('/login-facebook')}}" class="form-submit-social">
                <span>Facebook</span>
                <img src="icon/facebook.svg" alt="" class="form-submit-social--img">
              </a>
              <a href="{{url('/login-google')}}" class="form-submit-social">
                <span>GOOGLE</span>
                <img src="icon/google.svg" alt="" class="form-submit-social--img">
              </a>  --}}
            </div>
         </form>
        </div>
        <div class="col-sm-12 col-lg-6">
          <h3 class="heading">TẠO MỘT TÀI KHOẢN</h3>
          <p class="text-login">Thật dễ dàng tạo một tài khoản. Hãy nhập địa chỉ email của bạn và điền vào mẫu trên trang tiếp theo và tận hưởng những lợi ích của việc sở hữu một tài khoản :</p>
          <ul>
            <li class="text-login-item"><i class="fas fa-check"></i><p class="text-login">Tổng quan đơn giản về thông tin cá nhân của bạn</p></li>
            <li class="text-login-item"><i class="fas fa-check"></i><p class="text-login">Thanh toán nhanh hơn</p></li>
            <li class="text-login-item"><i class="fas fa-check"></i><p class="text-login">Ưu đãi và khuyến mãi độc quyền</p></li>
            <li class="text-login-item"><i class="fas fa-check"></i><p class="text-login">Các sản phẩm mới nhất</p></li>
            <li class="text-login-item"><i class="fas fa-check"></i><p class="text-login">Các bộ sưu tập giới hạn và bộ sưu tập theo mùa mới</p></li>
            <li class="text-login-item"><i class="fas fa-check"></i><p class="text-login">Các sự kiện sắp tới</p></li>
          </ul>
          <a href="sign-up"><button class="form-submit btn-blocker">ĐĂNG KÍ <i class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i></button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Bạn quên mật khẩu ?</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h5>Nhập địa chỉ email của bạn phía dưới, và nếu tài khoản tồn tại, chúng tôi sẽ gửi cho bạn một đường dẫn để đặt lại mật khẩu</h5>
          <input type="email" placeholder="Nhập mật khẩu"> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         
          <a href="{{ route('resertPassword') }}" type="button" class="btn btn-secondary">
            Đặt lại mật khẩu
          </a>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="js/validator.js"></script>
      <script>
        Validator({
          form: '#form-2',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [ 
            // Validator.isRequired('#fullname','Vui lòng nhập tên đầy đủ'),
            Validator.isRequired('#email'),
            Validator.isEmail('#email'),
            Validator.isRequired('#password'),
            Validator.minLength('#password', 6),
            Validator.isRequired('#password_confirmation'),
            // Validator.isRequired('input[name="gender"]'),
            // Validator.isConfirmed('#password_confirmation', function(){
            //   return document.querySelector('#form-1 #password').value;
            // }, 'Mật khẩu nhập lại không chính xác')
          ],
          onSubmit: function (data) {
            // call api
            console.log(data);
          }
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
    <script type="text/javascript">


      $(function(){
  
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
          });
  
          $("#form").submit(function(e){
              e.preventDefault();
              removeErrorMsg();
              var formData = new FormData($("#form")[0]);
              $.ajax({
                  url:"login",
                  data:formData,
                  processData:false,
                  contentType:false,
                  type:"POST",
                  success:function(data){
                      if(!$.isEmptyObject(data.success)) {
                          location.replace("http://127.0.0.1:8000");
                      } 
                      if(!$.isEmptyObject(data.error)) {
                          if(!$.isEmptyObject(data.error.email)) {
                              printErrorMsg (data.error.email, 'email');
                          }
                          if(!$.isEmptyObject(data.error.mat_khau)) {
                              printErrorMsg (data.error.mat_khau, 'mat_khau');
                          }
                      }
                      if(!$.isEmptyObject(data.errorAll)) {
                          var _html = '<span class="error-msg">';
                              _html += '<i class="fas fa-times"></i>';
                              _html += data.errorAll;
                              _html += '</span>';
                          jQuery("#login-id").before(_html);
                      }
                     
                  }
              })
          });
          
      });
  
      function printErrorMsg (msg, name) {
          var _html = '<span class="error-msg">';
              _html += '<i class="fas fa-times"></i>';
              _html += msg;
              _html += '</span>';
          jQuery(`input[name='${name}']`).after(_html);
          $(`input[name='${name}']`).addClass("border-error");
        }

        function removeErrorMsg(){
            $(".error-msg").remove();
            $("input").removeClass("border-error");
        }
  </script>
@endsection