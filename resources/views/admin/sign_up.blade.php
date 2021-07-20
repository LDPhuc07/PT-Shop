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
    <style>
        .head-product-picture label {
          font-size: 14px; 
          cursor: pointer;
          float: right;
          color: blue;
          margin: 0;
        }
        .head-product-picture label:hover {
          border-bottom: 1px solid blue; 
        }
      </style>
    <title>Document</title>
</head>
<body>
    <div class="register-page">
        <div style="width:700px" class="register-box">
            <div class="register-logo">
                <img class="logo-login" src="{{asset('img/logo/logomain.png')}}" alt="">
            </div>
            <div class="register-body">
                <h3 class="mb-16">Đăng ký</h3>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" class="register-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-16 sign-up-txt">
                                <input class="textbox" style="width: 100%" name="ho_ten" type="text" placeholder="Họ và tên">
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
                                <input class="textbox" style="width: 100%" name="email" type="text" placeholder="Email">
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
                            <div style="position: relative" class="mb-16 sign-up-txt">
                                <input class="textbox" style="width: 100%" name="mat_khau" type="password" placeholder="Mật khẩu">
                                <a id="mat_khau" class="input-inline-btn">
                                    <i class="show-pass fas fa-eye"></i>
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
                            <div style="position: relative" class="mb-16 sign-up-txt">
                                <input class="textbox" style="width: 100%" name="nhap_lai_mat_khau" type="password" placeholder="Nhập lại mật khẩu">
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
                            <div class="mb-16 sign-up-txt">
                                <input class="textbox" style="width: 100%" name="so_dien_thoai" type="text" placeholder="Số điện thoại">
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
                            <div style="position: relative" class="mb-16 sign-up-txt">
                                <input class="textbox" style="width: 100%" name="dia_chi" type="text" placeholder="Địa chỉ">
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="head-product-picture">
                            <span>Ảnh đại diện</span>
                            <input type="file" name="anh_dai_dien" id="myFile" style="display: none" onchange="loadfile(event)">
                            <label for="myFile">Chọn ảnh</label>
                        </div>
                        <div class="product-picture-item">
                            <img id="imgsp" style="width: 170px; margin: 0; margin-top:30px; height: unset" src="https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png" alt="">
                        </div>
                    </div>
                    <div style="width: 100%;
                    text-align: center;">
                        <input style="width: 250px;" class="register-btn btn" value="Đăng ký" type="submit">
                    </div>
                </form>
                </div>
                
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
    <script>
        var loadfile = function(event){
            var img = document.getElementById('imgsp');
            img.src = URL.createObjectURL(event.target.files[0]);
        }

        $(document).ready(function() {
            $("#mat_khau").on('click', function(event){
                showPass('mat_khau');
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