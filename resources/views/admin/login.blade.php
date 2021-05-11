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
                <img class="logo-login" src="https://banner2.cleanpng.com/20190417/fw/kisspng-adidas-run-waist-bag-black-mens-logo-image-thr-adidas-deerupt-bea-world-festival-5cb752a7e7db73.0092557415555181199497.jpg" alt="">
            </div>
            <div class="container-form-login">
                <h3 class="mb-16">Đăng nhập</h3>
                <form method="POST">
                    @csrf
                    <div class="login-txt mb-16">
                        <input class="textbox" name="email" type="text" placeholder="Email">
                        @if($errors->has('email'))
                            <span class="error-msg">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('email') }}
                            </span>
                            <style>
                                .login-txt input[name='email'] {
                                    border: 1px solid red;
                                }
                            </style>
                        @endif
                    </div>
                    <div class="login-txt password-txt mb-16">
                        <input class=" textbox" name="mat_khau" type="password" placeholder="Mật khẩu">
                        <a class="input-inline-btn" href="#">
                            <i class="fas fa-eye"></i>
                            <i class="fas fa-eye-slash" hidden></i>
                        </a>
                        @if($errors->has('mat_khau'))
                            <span class="error-msg">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('mat_khau') }}
                            </span>
                            <style>
                                .login-txt input[name='mat_khau'] {
                                    border: 1px solid red;
                                }
                            </style>
                        @endif
                    </div>
                    <div class="mb-16">
                        <button class="btn login-btn">Đăng nhập</button>
                    </div>
                    <div class="social-auth-links text-center">
                        <p>Hoặc</p>
                        <a class="btn facebook-login-btn" href="">
                            <i class="fab fa-facebook"></i>Đăng ký bằng Facebook
                        </a>
                        <a class="btn google-login-btn" href="">
                            <i class="fab fa-google-plus-g"></i>Đăng nhập bằng Google
                        </a>
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
</body>
</html>