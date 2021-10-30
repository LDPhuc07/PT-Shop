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
  .lbl-img {
    float: right;
    color: blue;
  }
  .form-group {
    text-align: center;
  }
  @media(max-width: 767px) {
    .product-container {
      margin-top: unset;
    }
    .head-add-pro {
      padding: 20px;
    }
    .add-product-form {
      margin: 20px;
    }
    .name-slide {
      min-width: 100%;
    }
    .img-slide {
      min-width: 100%;
      margin-top: 8px;
    } 
    .product-footer {
      padding: 20px;
    }
  }
</style>
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('slideshow.index')}}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách slideshow</span>
        </a>
        <h3>Chỉnh sửa môn thể thao</h3>
      </div>
      <form id="form">
        @method('PUT')
        @csrf
        <input type="hidden" value="{{$dsSlideShow['id']}}" name="id" id="id">
        <div class="row add-product-form">
          <div class="name-slide col-8 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên slideshow<span class="repuired"> *</span></label>
                <i class="fas fa-info note-info">
                  <p>Tên slideshow không quá 100 ký tự</p>
                </i>
                <input class="textbox" type="text" placeholder="Nhập tên slideshow" value="{{$dsSlideShow['slideshow']}}" name="tenslideshow">
                <div class="error error-name" 	@if($errors->has('tenslideshow')) style="display:block;color:red" @endif>{{$errors->first('tenslideshow')}}</div>
              </div>
              {{-- <div class="product-info-item">
                <label class="product-info-item-label" for="">Link liên kết<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" placeholder="Nhập link liên kết" value="{{$dsSlideShow['slideshow']}}" name="tenslideshow">
                <div class="error error-name" 	@if($errors->has('tenslideshow')) style="display:block;color:red" @endif>{{$errors->first('tenslideshow')}}</div>
              </div> --}}
            </div>
          </div>
          <div class="img-slide col-4 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                <p style="display: inline-block" class="product-info-item-label">Ảnh<span class="repuired"> *</span></p>
                <label class="lbl-img"  for="link">Chọn ảnh</label>
                <input type="file" hidden class="form-control" placeholder="Ảnh" value="{{$dsSlideShow['link']}}"  name="link" id="link" onchange="loadfile(event)">
                <div class="form-group">
                  <img src="{{asset(getLink('slideshow',$dsSlideShow['link']))}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
                </div>
                <div class="error error-name" 	@if($errors->has('link')) style="display:block;color:red" @endif>{{$errors->first('link')}}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-footer">
          <div class="product-footer-btn">
            {{-- <button class="destroy-btn btn">Hủy</button> --}}
            <button class="save-btn btn">Lưu</button>
          </div>
        </div>
      </form>
    </div>
    <script>
      var loadfile = function(event){
          var img = document.getElementById('imgsp');
          img.src = URL.createObjectURL(event.target.files[0]);
      }
  </script>
  <script type="text/javascript">
    var idInput = $('#id').val();
    console.log(idInput);
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
                url:"admin/slideshow/" + idInput,
                data:formData,
                processData:false,
                contentType:false,
                type:"POST",
                success:function(data){
                    if(!$.isEmptyObject(data.success)) {
                      location.replace("http://127.0.0.1:8000/admin/slideshow");
                      alert(data.success);
                    } 
                    if(!$.isEmptyObject(data.error)) {
                        
                        if(!$.isEmptyObject(data.error.tenslideshow)) {
                            printErrorMsg (data.error.tenslideshow, 'tenslideshow');
                            $("input[name=tenslideshow]").focus();
                        }
                        if(!$.isEmptyObject(data.error.link)) {
                          printErrorMsg (data.error.link, 'link');
                          
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
      }
  
      function removeErrorMsg(){
          $(".error-msg").remove();
          $("input").removeClass("border-error");
      }
  </script>
@endsection