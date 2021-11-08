@extends('admin.master.master')
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
    .alert-info {
        width: 430px;
        margin-left: auto;
        margin-right: auto;
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
    @media(max-width: 767px) {
        .head-add-pro {
            padding: 16px;
            margin-bottom: unset;
        }
        .form-login {
            width: unset;
            padding-top: unset;
        }
    }
</style>
    <div class="container-login">
        <div class="head-title head-add-pro">
            <a href="{{ route('admin.dashboards') }}">
              <i class="fas fa-chevron-left"></i>
              <span>Quay lại trang chủ</span>
            </a>
            <h3>Đổi mật khẩu</h3>
        </div>
        @include('admin.mess.message')
        <div class="form-login">
            <div class="container-form-login">
                <form method="POST" id="form">
                    @csrf
                    <div style="position: relative" class="login-txt mb-16">
                        <input class="textbox" style="    width: 100%;" name="mat_khau_cu" type="password" placeholder="Mật khẩu cũ" autofocus>
                        <a id="mat_khau_cu" class="input-inline-btn">
                            <i class="show-pass fas fa-eye"></i>
                        </a>
                        @if($errors->has('mat_khau_cu'))
                        <span class="error-msg">
                            <i class="fas fa-times"></i>
                            {{ $errors->first('mat_khau_cu') }}
                        </span>
                        <style>
                            .login-txt input[name='mat_khau_cu'] {
                                border: 1px solid red;
                            }
                        </style>
                    @endif
                    </div>
                    <div class="login-txt password-txt mb-16">
                        <input class=" textbox" style="    width: 100%;" name="mat_khau_moi" type="password" placeholder="Mật khẩu mới">
                        <a id="mat_khau_moi" class="input-inline-btn">
                            <i class="show-pass fas fa-eye"></i>
                        </a>
                        @if($errors->has('mat_khau_moi'))
                        <span class="error-msg">
                            <i class="fas fa-times"></i>
                            {{ $errors->first('mat_khau_moi') }}
                        </span>
                        <style>
                            .login-txt input[name='mat_khau_moi'] {
                                border: 1px solid red;
                            }
                        </style>
                    @endif
                    </div>
                    <div style="position: relative" class="login-txt password-txt mb-16">
                        <input class="textbox" style="    width: 100%;" name="nhap_lai_mat_khau" type="password" placeholder="Nhập lại mật khẩu mới">
                        <a id="nhap_lai_mat_khau" class="input-inline-btn">
                            <i class="show-pass fas fa-eye"></i>
                        </a>
                        @if($errors->has('nhap_lai_mat_khau'))
                        <span class="error-msg">
                            <i class="fas fa-times"></i>
                            {{ $errors->first('nhap_lai_mat_khau') }}
                        </span>
                        <style>
                            .login-txt input[name='nhap_lai_mat_khau'] {
                                border: 1px solid red;
                            }
                        </style>
                    @endif
                    </div>
                    <div class="login-txt mb-16">
                      @if(session('thong_bao'))
                            <span class="error-msg">
                                <i class="fas fa-times"></i>
                                {{ session('thong_bao') }}
                            </span>
                        @endif
                        <button id="change_pass" class="btn login-btn">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#mat_khau_cu").on('click', function(event){
                showPass('mat_khau_cu');
            });
            $("#mat_khau_moi").on('click', function(event){
                showPass('mat_khau_moi');
            });
            $("#nhap_lai_mat_khau").on('click', function(event){
                showPass('nhap_lai_mat_khau');
            });
            function showPass(key) {
                if($(`#${key} .show-pass`).hasClass("fa-eye")) {
                    $(`input[name="${key}"]`).attr('type','text');
                    $(`#${key} .show-pass`).removeClass("fa-eye");
                    $(`#${key} .show-pass`).addClass("fa-eye-slash");
                } else {
                    $(`input[name="${key}"]`).attr('type','password');
                    $(`#${key} .show-pass`).removeClass("fa-eye-slash");
                    $(`#${key} .show-pass`).addClass("fa-eye");
                }
            }
        });
    </script>
    {{-- <script type="text/javascript">


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
                    url:"admin/accounts/change-password/" + {{ Auth::user()->id }},
                    data:formData,
                    processData:false,
                    contentType:false,
                    type:"POST",
                    success:function(data){
                        if(!$.isEmptyObject(data.success)) {
                            var _html = `<button type="button" class="close cls-logout" ><a href="{{ route('admin.accounts.logout') }}">Đăng xuất</a></button>`;
                                _html += `<button type="button" class="close cls-stay"><a href="{{ route('admin.dashboards') }}">Ở lại</a></button>`;
                                _html += `<strong>` + data.success + `</strong>`;
                            jQuery(".alert-block").append(_html);
                            $(".alert-block").addClass("alert alert-info");
                            $("input").val("");
                        } 
                        if(!$.isEmptyObject(data.error)) {
                            if(!$.isEmptyObject(data.error.nhap_lai_mat_khau)) {
                                printErrorMsg (data.error.nhap_lai_mat_khau, 'nhap_lai_mat_khau');
                                $("input[name='mat_khau_moi']").val("");
                                $("input[name='nhap_lai_mat_khau']").val("");
                            }
                            if(!$.isEmptyObject(data.error.mat_khau_moi)) {
                                printErrorMsg (data.error.mat_khau_moi, 'mat_khau_moi');
                            }
                            if(!$.isEmptyObject(data.error.mat_khau_cu)) {
                                printErrorMsg (data.error.mat_khau_cu, 'mat_khau_cu');
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
            $(`input[name='${name}']`).focus();
          }

          function removeErrorMsg(){
              $(".error-msg").remove();
              $("input").removeClass("border-error");
          }
    </script> --}}
@endsection