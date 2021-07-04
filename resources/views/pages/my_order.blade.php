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
                  <img src="{{asset(getLink('anh-dai-dien',Auth::user()->anh_dai_dien))}}" alt="" class="heading-img">
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
                <a href="{{ route('bill') }}" class="bbc">
                  <div class="my-order">
                    <div class="my-order-title active">
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
                      @foreach($arrays as $bill)
                        <div class="row bd-bottom">
                          <div class="col-2">{{ $bill->id }}</div>
                          <div class="col-3">{{ date('Y-m-d', strtotime($bill->ngay_lap_hd)) }}</div>
                          <div class="col-3">{{number_format($bill->tong_tien,0,',','.').' '.'VNĐ'}}</div>
                          <div class="col-2">
                            @if ($bill->chot_don == true)
                              <span class="btn-stt green" >Đã chốt đơn</span>
                            @else
                              <span class="btn-stt blue" >Đang xác nhận</span>
                            @endif
                          </div>
                          <div class="col-2">
                            <a onclick="showModal({{ $bill->id }})">Xem</a>
                          </div>
                        </div>
                      @endforeach
                    </div>
                    <nav aria-label="Page navigation example" style="margin-top:20px">
                      <ul class="pagination">
                        {!! $arrays->appends(request()->query())->links() !!}
                      </ul>
                    </nav>
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> 
<script>
  function showModal(id) {
    $.ajax({
      url: 'bill/detail/'+id,
      type: 'GET',
    }).done(function(res) {
      //hiện tiêu đề
      $('#myModal .modal-body').html(res);
      //hiện modal
      $('#myModal').modal('show');
    });
  }
</script>
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