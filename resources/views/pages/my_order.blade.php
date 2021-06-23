@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/account.css">
@endsection
@section('content')
<div class="cart" style="margin-top: 160px;">
    <div class="container" style="margin-top: 180px;">
        @include('admin.mess.message')
        <div class="row">
          <div class="col-4">
              <div class="heading">
                  <img src="{{asset('img/product/noavatar.png')}}" alt="" class="heading-img">
                  <span class="heading-name_acc"></span>
              </div>
              <div class="menu-manager">
                  <div class="my-profile" onclick="hienThiDoiThongTin()">
                      <div class="my-profile-title ">
                        <div class="my-profile-icon"><i class="fas fa-user"></i></div>
                        <div class="my-profile-name">Hồ sơ của tôi</div>
                      </div>
                  </div>
                  <div class="my-order">
                    <div class="my-order-title active">
                      <div class="my-order-icon"><i class="fas fa-shopping-bag"></i></div>
                    <div class="my-order-name">Đơn hàng của tôi</div>
                    </div>
                  </div>
                  <div class="my-password" onclick="hienThiDoiMatKhau()">
                    <div class="my-password-title ">
                      <div class="my-password-icon"><i class="fas fa-key"></i></div>
                      <div class="my-password-name">Đổi mật khẩu</div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-8">
            <div class="detail__my-order">
                <div class="heading-edit-password">
                  <h2>Đơn hàng của bạn</h2>
                </div>
                <div class="detail__my-order-content">
                  <form action="">
                    <div class="my-order-heading">
                      <div class="row">
                        <div class="col-2">MĐH</div>
                        <div class="col-3">Ngày</div>
                        <div class="col-3">Tổng tiền</div>
                        <div class="col-2">Trạng thái</div>
                        <div class="col-2">Chi tiết</div>
                      </div>
                    </div>
                    <div class="my-order-body">
                      <div class="row bd-bottom">
                        <div class="col-2">#1</div>
                        <div class="col-3">05-06-2021</div>
                        <div class="col-3">3.000.000 VNĐ</div>
                        <div class="col-2">
                          <span class="btn-stt blue" >Đang xác nhận</span>
                        </div>
                        <div class="col-2">
                          <a href="" data-toggle="modal" data-target="#myModal">Xem</a>
                        </div>
                      </div>
                      <div class="row bd-bottom">
                        <div class="col-2">#2</div>
                        <div class="col-3">05-06-2021</div>
                        <div class="col-3">3.000.000 VNĐ</div>
                        <div class="col-2">
                          <span class="btn-stt green">Đã giao</span>
                        </div>
                        <div class="col-2">
                          <a href="">Xem</a>
                        </div>
                      </div>
                      <div class="row bd-bottom">
                        <div class="col-2">#3</div>
                        <div class="col-3">05-06-2021</div>
                        <div class="col-3">3.000.000 VNĐ</div>
                        <div class="col-2">
                          <span class="btn-stt red">Đã hủy</span>
                        </div>
                        <div class="col-2">
                          <a href="">Xem</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Chi tiết đơn hàng</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="body-one">
            <div>Tổng tiền: 3.000.000 VNĐ</div>
            <div>Giá đã giảm: 1.000.000 VNĐ</div>
            <div>Phí ship: 30.000 VNĐ</div>
            <div>Thành Tiền: 3.000.000 VNĐ</div>
          </div>
          <form action="">
            <div class="my-order-heading">
              <div class="row" style="text-align:center">
                <div class="col-4">Sản phẩm</div>
                <div class="col-1">Số lượng</div>
                <div class="col-3">Giá</div>
                <div class="col-1">Giảm giá</div>
                <div class="col-3">Tổng</div>
              </div>
            </div>
            <div class="body-two">
              <div class="row" style="text-align:center; margin-top:10px">
                <div class="col-4" style="display: flex;">
                  <a href=""><img src="./assets/img/product/addidas1.jpg" alt="" style="width: 50px;height: 50px;margin-right: 5px;"></a>
                  <h5>Adidas smith</h5>
                </div>
                <div class="col-1">3</div>
                <div class="col-3">1.000.000 VNĐ</div>
                <div class="col-1">20%</div>
                <div class="col-3">3.000.000 VNĐ</div>
              </div>
            </div>
            <div class="body-two">
              <div class="row" style="text-align:center; margin-top:10px">
                <div class="col-4" style="display: flex;">
                  <a href=""><img src="./assets/img/product/addidas1.jpg" alt="" style="width: 50px;height: 50px;margin-right: 5px;"></a>
                  <h5>Adidas smith</h5>
                </div>
                <div class="col-1">3</div>
                <div class="col-3">1.000.000 VNĐ</div>
                <div class="col-1">20%</div>
                <div class="col-3">3.000.000 VNĐ</div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default red" data-dismiss="modal" style="color: white;">Close</button>
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
@endsection