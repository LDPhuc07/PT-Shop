@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/account.css">
@endsection
@section('content')
<style>
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
    
  }

  /* mobile */
  @media (max-width: 739px) {
    
  }
</style>
<div class="cart" style="margin-top: 30px">
    <div class="container">
        <div class="row">
          <div class="col-lg-4 col-12">
              <div class="heading">
                  <img src="{{asset(getLink('anh-dai-dien',Auth::user()->anh_dai_dien))}}" alt="" class="heading-img">
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
                @foreach($arrays as $account)
                <form action="{{ route('accounts.update',$account->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
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
                  <div class="form-group">
                    <label for="avatar" class="form-label">Cập nhật avatar</label>
                    <input id="avatar" name="anh_dai_dien" type="file" onchange="loadfile(event)" class="form-control">
                    <span class="form-message"></span>
                  </div>
                  <div class="form-group">
                    @if($account->anh_dai_dien == null)
                      <img src="{{asset('img/no-image.png')}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                    @else
                      <img src="{{asset(getLink('anh-dai-dien',$account->anh_dai_dien))}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                    @endif
                  </div>
                  <button class="form-submit">Lưu</button>
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
    }
    </script>
@endsection
@section('js')


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
@endsection