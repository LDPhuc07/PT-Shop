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
    <div class="container-login">
        <div class="form-login">
            <div class="head-form-login">
                <img class="logo-login" src="{{asset('img/logo/logomain.png')}}" alt="">
            </div>
            <div class="container-form-login">
                <h3 class="mb-16">Đổi mật khẩu</h3>
                <form method="POST">
                    @method('put')
                    @csrf
                    <div style="position: relative" class="login-txt mb-16">
                        <input class="textbox" name="mat_khau_cu" type="password" placeholder="Mật khẩu cũ" autofocus>
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
                        <input class=" textbox" name="mat_khau_moi" type="password" placeholder="Mật khẩu mới">
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
                        <input class="textbox" name="nhap_lai_mat_khau" type="password" placeholder="Nhập lại mật khẩu mới">
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
                        <button class="btn login-btn">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="admin/js/openSidebar.js"></script>
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
</body>
</html>