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
    <div class="register-page">
        <div class="register-box">
            <div class="register-logo">
                <img class="logo-login" src="https://banner2.cleanpng.com/20190417/fw/kisspng-adidas-run-waist-bag-black-mens-logo-image-thr-adidas-deerupt-bea-world-festival-5cb752a7e7db73.0092557415555181199497.jpg" alt="">
            </div>
            <div class="register-body">
                <h3 class="mb-16">Đăng ký</h3>
                <form action="" class="register-form" method="POST">
                    @csrf
                    <div class="mb-16 sign-up-txt">
                        <input class="textbox" name="ho_ten" type="text" placeholder="Họ và tên">
                        @if($errors->has('ho_ten'))
                            <span class="error-msg">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('ho_ten') }}
                            </span>
                            <style>
                                .login-txt input[name='ho_ten'] {
                                    border: 1px solid red;
                                }
                            </style>
                        @endif
                    </div>
                    <div class="mb-16 sign-up-txt">
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
                    <div class="mb-16 sign-up-txt">
                        <input class="textbox" name="mat_khau" type="password" placeholder="Mật khẩu">
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
                    <div class="mb-16 sign-up-txt">
                        <input class="textbox" name="nhap_lai_mat_khau" type="password" placeholder="Nhập lại mật khẩu">
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
                    <div class="mb-16 sign-up-txt">
                        <input class="textbox" name="so_dien_thoai" type="text" placeholder="Số điện thoại">
                        @if($errors->has('so_dien_thoai'))
                            <span class="error-msg">
                                <i class="fas fa-times"></i>
                                {{ $errors->first('so_dien_thoai') }}
                            </span>
                            <style>
                                .login-txt input[name='so_dien_thoai'] {
                                    border: 1px solid red;
                                }
                            </style>
                        @endif
                    </div>
                    <div>
                        <input class="register-btn btn" value="Đăng ký" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(session('thong_bao'))
        <script>
            alert({{ session('thong_bao') }});
                        
        </script>
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="admin/js/openSidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>