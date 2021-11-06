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
    .head-product-picture .del-img {
      margin-left: 8px;
      color: #8f8888;
  }
  .head-product-picture .del-img:hover {
      border-bottom: 1px solid #8f8888; 
  }
  .display-none {
      display: none;
  }
  .add-product-form {
    width: 60%;
    margin-left: auto;
    margin-right: auto;
    padding-bottom: unset;
    border-bottom: unset;
  }
  .product-info {
    margin-bottom: 16px;
  }
  .product-footer {
    padding: unset;
    padding-top: 16px;
    border-top: 1px solid #dfe4e8;
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
  .alert-success {
    width: 60%;
    margin: 0 20% 0;
  }
  @media(max-width: 767px) {
    .add-product-form {
      width: 100%;
    }
    .alert-success {
      width: 100%;
      margin: 0;
    }
    .product-footer {
      padding: 16px; 
      border-radius: unset;
    }
    .head-add-pro {
      padding: 16px;
      margin-bottom: unset;
    }
    .product-container {
      margin-top: unset;
    }
  }
  @media(min-width: 768px) and (max-width: 1023px) {
    .add-product-form {
      width: 90%;
    }
    .head-add-pro {
      padding: 25px 45px 0;
    }
    .alert-success {
      width: 90%;
      margin: 0 5% 0;
    }
  }
</style>
<div class="product-container">
    <div class="head-title head-add-pro">
      <a href="{{ route('admin.dashboards') }}">
        <i class="fas fa-chevron-left"></i>
        <span>Quay lại trang chủ</span>
      </a>
      <h3>Quản lý tài khoản</h3>
    </div>
    <div class=" alert-block">
      
    </div>
    @foreach ($arrays as $array)
      <form id="form">
      @csrf
      <div class="add-product-form">
          <div class="product-info">
            <div class="row">
              <div class="col-md-6">
                <input class="textbox"  type="text" name="id" value="{{ $array->id }}" hidden>
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Họ và tên</label>
                  <input class="textbox" style="    width: 100%;" type="text" name="ho_ten" value="{{ $array->ho_ten }}" placeholder="Nhập họ và tên">
                </div>
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Email</label>
                  <input class="textbox" style="    width: 100%;" type="text" name="email" value="{{ $array->email }}" placeholder="Nhập email">
                </div>
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Số điện thoại</label>
                  <input class="textbox" style="    width: 100%;" type="text" name="so_dien_thoai" value="{{ $array->so_dien_thoai }}" placeholder="Nhập số điện thoại">
                </div>
                  <div class="product-info-item">
                  <label class="product-info-item-label" for="">Địa chỉ</label>
                  <input class="textbox" style="    width: 100%;" type="text" name="dia_chi" value="{{ $array->dia_chi }}" placeholder="Nhập địa chỉ">
                </div>
              </div>
              <div class="col-md-6 img-col">
                <div class="head-product-picture">
                  <span>Ảnh đại diện</span>
                  @if($array->anh_dai_dien == null)
                  <input type="file" name="anh_dai_dien" id="myFile" style="display: none" onchange="loadfile(event)">
                  <label for="myFile">Chọn ảnh</label>
                </div>
                <div class="product-picture-item">
                  <img id="imgsp" style="width: 230px; margin: 0; margin-top:30px; height: unset" src="https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png" alt="">
                </div>
                @else
                <input type="file" name="anh_dai_dien" value="{{$array->anh_dai_dien}}" id="myFile" style="display: none" onchange="loadfile(event)">
                  <label for="myFile">Chọn ảnh</label>
                </div>
                <div class="product-picture-item">
                  <img id="imgsp" style="width: 230px; margin: 0; margin-top:30px; height: unset" src="{{asset(getLink('anh-dai-dien',$array->anh_dai_dien))}}" alt="">
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="product-footer">
            <div class="product-footer-btn">
              <button  type="submit" class="save-btn btn">Lưu</button>
            </div>
          </div>
      </div>
    </form>
    @endforeach
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

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
              url:"admin/accounts/" + $("input[name='id']").val(),
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
      jQuery(".alert-block").empty();

  }
</script>
@endsection