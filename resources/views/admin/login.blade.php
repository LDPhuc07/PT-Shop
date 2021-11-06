<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="admin/css/style.css">
    <title>Document</title>
</head>
<body>
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
    </style>
    <div class="container-login">
        <div class="form-login">
            <div class="head-form-login">
                <img class="logo-login" src="{{asset('img/logo/logomain.png')}}" alt="" >
            </div>
            <div class="container-form-login">
                <h3 class="mb-16">Đăng nhập</h3>
                <form id="form">
                    @csrf
                    <div class="login-txt mb-16">
                        @if(Session::has('email'))
                            <input style="width: 100%" class="textbox" name="email" type="text" placeholder="Email" value="{{ Session::get('email')}}">
                        @else
                            <input style="width: 100%" class="textbox" name="email" type="text" placeholder="Email" autofocus>
                        @endif
                        {{--  @if($errors->has('email'))
                            <span class="error-msg">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('email') }}
                            </span>
                            <style>
                                .login-txt input[name='email'] {
                                    border: 1px solid red;
                                }
                            </style>
                        @endif  --}}
                    </div>
                    <div class="login-txt password-txt mb-16">
                        @if(Session::has('mat_khau'))
                            <input style="width: 100%" class=" textbox" name="mat_khau" type="password" placeholder="Mật khẩu" value="{{ Session::get('mat_khau')}}">
                        @else
                            <input style="width: 100%" class=" textbox" name="mat_khau" type="password" placeholder="Mật khẩu">
                        @endif
                        <a class="input-inline-btn">
                            <i class="show-pass fas fa-eye"></i>
                        </a>
                        {{--  @if($errors->has('mat_khau'))
                            <span class="error-msg">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('mat_khau') }}
                            </span>
                            <style>
                                .login-txt input[name='mat_khau'] {
                                    border: 1px solid red;
                                }
                            </style>
                        @endif  --}}
                    </div>
                    <div class="login-txt remember-box mb-16">
                        @if(Session::has('remember'))
                            <input type="checkbox" name="remember" value="remember" checked>
                        @else
                            <input type="checkbox" name="remember" value="remember">
                        @endif
                        Nhớ mật khẩu
                        <a href="{{ route('admin.accounts.sign-up') }}">Đăng ký</a>
                    </div>
                    <div id="login-id" class="login-txt mb-16">
                        {{--  @if(session('thong_bao'))
                            <span class="error-msg">
                                <i class="fas fa-times"></i>
                                {{ session('thong_bao') }}
                            </span>
                        @endif  --}}
                        <button type="submit" class="btn login-btn">Đăng nhập</button>
                    </div>
                    {{--  <div class="social-auth-links text-center">
                        <p>Hoặc</p>
                        <a class="btn facebook-login-btn" href="">
                            <span>Đăng nhâp với facebook</span>
                            <img class= "img-social" src="{{asset('icon/facebook.svg')}}" alt="">
                        </a>
                        <a class="btn google-login-btn" href="">
                            <span>Đăng nhâp với google</span>
                            <img class= "img-social" src="{{asset('icon/google.svg')}}" alt="">
                        </a>
                    </div>  --}}
                </form>
            </div>
        </div>
        @include('admin.master.footer')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $(".input-inline-btn").on('click', function(event){
                if($(".show-pass").hasClass("fa-eye")) {
                    $('input[name="mat_khau"]').attr('type','text');
                    $(".show-pass").removeClass("fa-eye");
                    $(".show-pass").addClass("fa-eye-slash");
                } else {
                    $('input[name="mat_khau"]').attr('type','password');
                    $(".show-pass").removeClass("fa-eye-slash");
                    $(".show-pass").addClass("fa-eye");
                }
            });
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
                    url:"/admin/login",
                    data:formData,
                    processData:false,
                    contentType:false,
                    type:"POST",
                    success:function(data){
                        if(!$.isEmptyObject(data.success)) {
                            location.replace("http://127.0.0.1:8000/admin/dashboards");
                        } 
                        if(!$.isEmptyObject(data.error)) {
                            if(!$.isEmptyObject(data.error.mat_khau)) {
                                printErrorMsg (data.error.mat_khau, 'mat_khau');
                            }
                            if(!$.isEmptyObject(data.error.email)) {
                                printErrorMsg (data.error.email, 'email');
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
            $(`input[name='${name}']`).focus();
          }

          function removeErrorMsg(){
              $(".error-msg").remove();
              $("input").removeClass("border-error");
          }
    </script>
</body>
</html>