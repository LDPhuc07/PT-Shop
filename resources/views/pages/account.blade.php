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
  .head-product-picture .del-img {
      margin-left: 8px;
      color: #8f8888;
      font-size: 13px;
      float: right;
  }
  .head-product-picture .del-img:hover {
      border-bottom: 1px solid #8f8888; 
      text-decoration: none;
  }
  .display-none {
      display: none;
  }
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
  .img-col {
    text-align: center;
  }
  .alert-success {
    font-size: 18px;
    padding: 1.75rem 2.25rem;
  }
  /* Mobile & tablet  */
  @media (max-width: 1023px) {
   .detial__my-profile {
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
<div class="cart" style="margin-top: 30px">
    <div class="container">
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
                    <div class="my-profile-title active">
                      <div class="my-profile-icon"><i class="fas fa-user"></i></div>
                      <div class="my-profile-name">Hồ sơ của tôi</div>
                    </div>
                </div>
                </a>
                <a href="{{ route('bill') }}" class="bbc">
                  <div class="my-order">
                    <div class="my-order-title">
                      <div class="my-order-icon"><i class="fas fa-shopping-bag"></i></div>
                    <div class="my-order-name">Đơn hàng của tôi</div>
                    </div>
                  </div>
                </a>
                  <a href="{{ route('accounts.getChangePassword',Auth::user()->id) }}" class="bbc">
                    <div class="my-password" onclick="hienThiDoiMatKhau()">
                      <div class="my-password-title">
                        <div class="my-password-icon"><i class="fas fa-key"></i></div>
                        <div class="my-password-name">Đổi mật khẩu</div>
                      </div>
                    </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-8 col-12">

            <div class="detial__my-profile ">
              <div class="heading-edit-account">
                <h2>Hồ sơ của tôi</h2>
                <div class=" alert-block">
      
                </div>
                @foreach($arrays as $account)
                <form id="form">
                  @csrf
                  <input type="text" value="{{ $account->id }}" name="id" hidden>
                  <div class="form-group">
                    <label for="fullname" class="form-label">Tên đầy đủ</label>
                    <input id="fullname" name="ho_ten" type="text" placeholder="VD: Quốc Trung" class="form-control" value="{{ $account->ho_ten }}">
                    <span class="form-message"></span>
                    @if($errors->has('ho_ten'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('ho_ten') }}
                      </span>
                      <style>
                          input[name='ho_ten'] {
                              border: 1px solid red;
                          }
                      </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control" value="{{ $account->email }}" >
                    <span class="form-message"></span>
                    @if($errors->has('email'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('email') }}
                      </span>
                      <style>
                          input[name='email'] {
                              border: 1px solid red;
                          }
                      </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Địa chỉ</label>
                    <input id="email" name="dia_chi" type="text" placeholder="VD: 86/2/3 Bình Thạnh TP HCM" class="form-control" value="{{ $account->dia_chi }}" >
                    <span class="form-message"></span>
                    @if($errors->has('dia_chi'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('dia_chi') }}
                      </span>
                      <style>
                          input[name='dia_chi'] {
                              border: 1px solid red;
                          }
                      </style>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input id="sdt" name="so_dien_thoai" type="number" placeholder="VD: 089" class="form-control" value="{{ $account->so_dien_thoai }}">
                    <span class="form-message"></span>
                    @if($errors->has('so_dien_thoai'))
                      <span style="font-size: 13px; color:red">
                          <i class="fas fa-times"></i>
                          {{ $errors->first('so_dien_thoai') }}
                      </span>
                      <style>
                          input[name='so_dien_thoai'] {
                              border: 1px solid red;
                          }
                      </style>
                    @endif
                  </div>
                  
                    @if($account->anh_dai_dien == null)
                      <div class="form-group head-product-picture">
                        <span class="form-label">Cập nhật avatar</span>
                        <input id="avatar" name="anh_dai_dien" type="file" onchange="loadfile(event)" class="form-control" hidden>
                        <label for="avatar">Chọn ảnh</label>
                        <span class="form-message"></span>
                      </div>
                      <div class="form-group img-col">
                          <img src="https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                      </div>
                    @else
                      <div class="form-group head-product-picture">
                        <span class="form-label">Cập nhật avatar</span>
                        <input id="avatar" name="anh_dai_dien" value="{{ $account->anh_dai_dien }}" type="file" onchange="loadfile(event)" class="form-control" hidden>
                        <label for="avatar">Chọn ảnh</label>
                        <span class="form-message"></span>
                      </div>
                      <div class="form-group img-col">
                          <img src="{{asset(getLink('anh-dai-dien',$account->anh_dai_dien))}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                      </div>
                    @endif
                    
                  
                  <button class="form-submit btn-blocker">Lưu</button>
                </form>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
    <script>
      var loadfile = function(event){
        var img = document.getElementById('imgsp');
        img.src = URL.createObjectURL(event.target.files[0]);
        if($(".del-img").hasClass("display-none")) {
          $(".del-img").removeClass("display-none");
        }
      }
      {{--  function delImg () {
        $("input[name='anh_dai_dien']").val("");
        var src1 = 'https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png';
        $("#imgsp").attr("src", src1);
        $(".del-img").addClass("display-none");
      }  --}}
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
                url:"accounts/" + $("input[name='id']").val(),
                data:formData,
                processData:false,
                contentType:false,
                type:"POST",
                success:function(data){
                  if($.isEmptyObject(data.error)){
                    var _html = `<button type="button" class="close" data-dismiss="alert">×</button>`;
                        _html += `<strong>` + data.success + `</strong>`;
                    jQuery(".alert-block").append(_html);
                    $(".alert-block").addClass("alert alert-success");
                  
                  }else{
                      if(!$.isEmptyObject(data.error.so_dien_thoai)) {
                        printErrorMsg (data.error.so_dien_thoai, 'so_dien_thoai');
                      }
                      if(!$.isEmptyObject(data.error.email)) {
                        printErrorMsg (data.error.email, 'email');
                      }
                      if(!$.isEmptyObject(data.error.ho_ten)) {
                        printErrorMsg (data.error.ho_ten, 'ho_ten');
                      }
                      if(!$.isEmptyObject(data.error.anh_dai_dien)) {
                        var _html = '<span class="error-msg">';
                            _html += '<i class="fas fa-times"></i>';
                            _html += data.error.anh_dai_dien;
                            _html += '</span>';
                        jQuery(".img-col").append(_html);
                      }
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
@endsection
@section('js')
@endsection