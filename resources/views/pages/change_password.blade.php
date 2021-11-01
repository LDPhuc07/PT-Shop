@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/account.css">
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
  .alert {
    padding: 1.75rem 2.25rem;
  }
  .alert-info strong {
    font-size: 18px;
  }
  .form-login {
      padding-top: 8px;
  }
  .cls-stay {
      font-size: 18px;
  }
  .cls-stay a {
      color: #414c56;
  }
  .cls-logout {
      font-size: 18px;
      margin-left: 8px;
  }
  .cls-stay:hover a {
      color: black;
  }
  /* Mobile & tablet  */
  @media (max-width: 1023px) {
   .detail__confirm-password {
     margin-left: unset;
     margin-top: 20px;
     border-top: 1px solid #000;
   }
  }

  /* tablet */
  @media (min-width: 740px) and (max-width: 1023px) {
      .btn-blocker {
      display: block;
      width: 100%;
    }
  }

  /* mobile */
  @media (max-width: 739px) {
      .btn-blocker {
      display: block;
      width: 100%;
    }
  }
</style>
<div class="cart" style="margin-top:30px">
    <div class="container">
        @include('admin.mess.message')
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="heading">
              @if(Auth::user()->anh_dai_dien != null)
                <img src="{{asset(getLink('anh-dai-dien',Auth::user()->anh_dai_dien))}}" alt="" class="heading-img">
              @else
                <img src="https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png" alt="" class="heading-img">
              @endif
              <span class="heading-name_acc">{{Auth::user()->ho_ten}}</span>
            </div>
            <div class="menu-manager">
              <a href="{{ route('accounts',Auth::user()->id) }}" class="bbc">
                <div class="my-profile" onclick="hienThiDoiThongTin()">
                  <div class="my-profile-title ">
                    <div class="my-profile-icon"><i class="fas fa-user"></i></div>
                    <div class="my-profile-name">Hồ sơ của tôi</div>
                  </div>
              </div>
              </a>
              <a href="{{ route('accounts',Auth::user()->id) }}" class="bbc">
                <div class="my-order">
                  <div class="my-order-title">
                    <div class="my-order-icon"><i class="fas fa-shopping-bag"></i></div>
                  <div class="my-order-name">Đơn hàng của tôi</div>
                  </div>
                </div>
              </a>
                <a href="{{ route('accounts.getChangePassword',Auth::user()->id) }}" class="bbc">
                  <div class="my-password" onclick="hienThiDoiMatKhau()">
                    <div class="my-password-title active">
                      <div class="my-password-icon"><i class="fas fa-key"></i></div>
                      <div class="my-password-name">Đổi mật khẩu</div>
                    </div>
                  </div>
                </a>
            </div>
          </div>
          <div class="col-lg-8 col-12">
            <div class="detail__confirm-password">
              <div class="heading-edit-password">
                <h2>Đổi lại mật khẩu</h2>
              </div>
              <div class="alert-block">
            
              </div>
              @foreach($arrays as $account)
              <form id="form">
                @csrf
                <div class="form-group form-group-old-password">
                  <div style="display:flex;justify-content: space-between;">
                    <label for="password" class="form-label">Mật khẩu cũ</label>
                    <span style="    top: 54px;
    z-index: 1;" class="show-hide"><i class="fas fa-eye"></i></span>
                  </div>
                  <input id="password" name="mat_khau_cu" type="password" placeholder="Nhập mật khẩu" class="form-control">
                  <span class="form-message"></span>
                  
                </div>
                <div class="form-group form-group-new-password">
                  <div style="display:flex;justify-content: space-between;">
                    <label for="password-new" class="form-label">Mật khẩu mới</label>
                    <span style="    top: 54px;
    z-index: 1;" class="show-hide-two"><i class="fas fa-eye fa-eye-2"></i></span>
                  </div>
                  <input id="password-new" name="mat_khau_moi" type="password" placeholder="Nhập mật khẩu" class="form-control">
                  <span class="form-message"></span>
                  
                </div>
                <div class="form-group form-group-confirm-password">
                  <div style="display:flex;justify-content: space-between;">
                    <label for="password-confirm" class="form-label">Nhập lại mật khẩu</label>
                    <span style=" right:0;   top: 54px;
    z-index: 1;" class="show-hide-three"><i class="fas fa-eye fa-eye-3"></i></span>
                  </div>
                  <input id="password-confirm" name="nhap_lai_mat_khau" type="password" placeholder="Nhập mật khẩu" class="form-control">
                  <span class="form-message"></span>
                  
                </div>
                <button id="change_pass" class="form-submit submit-change-pass btn-blocker">Lưu</button>
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
  {{-- <script>
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
  </script> --}}
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
                url:"/accounts/change-password/" + {{ Auth::user()->id }},
                data:formData,
                processData:false,
                contentType:false,
                type:"POST",
                success:function(data){
                    if(!$.isEmptyObject(data.success)) {
                        var _html = `<button type="button" class="close cls-logout" ><a href="{{ route('admin.accounts.logout') }}">Đăng xuất</a></button>`;
                            _html += `<button type="button" class="close cls-stay"><a href="">Ở lại</a></button>`;
                            _html += `<strong>` + data.success + `</strong>`;
                        jQuery(".alert-block").append(_html);
                        $(".alert-block").addClass("alert alert-info");
                        $("input").val("");
                    } 
                    if(!$.isEmptyObject(data.error)) {
                        if(!$.isEmptyObject(data.error.mat_khau_cu)) {
                            printErrorMsg (data.error.mat_khau_cu, 'mat_khau_cu');
                        }
                        if(!$.isEmptyObject(data.error.mat_khau_moi)) {
                            printErrorMsg (data.error.mat_khau_moi, 'mat_khau_moi');
                        }
                        if(!$.isEmptyObject(data.error.nhap_lai_mat_khau)) {
                            printErrorMsg (data.error.nhap_lai_mat_khau, 'nhap_lai_mat_khau');
                            $("input[name='mat_khau_moi']").val("");
                            $("input[name='nhap_lai_mat_khau']").val("");
                        }
                    }
                    if(!$.isEmptyObject(data.errorAll)) {
                        var _html = '<span class="error-msg">';
                            _html += '<i class="fas fa-times"></i>';
                            _html += data.errorAll;
                            _html += '</span>';
                        jQuery("#change_pass").before(_html);
                        $("input").val("");
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