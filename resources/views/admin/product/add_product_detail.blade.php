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
  .add-product-form {
    border-bottom: unset;
    padding-bottom: unset;
    margin: 25px 180px 0;
  } 
  @media(max-width: 767px) {
    .head-add-pro {
      padding: 25px 15px 0;
    }
    .add-product-form {
      margin: 25px 10px 0;
    }
  }
</style>
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{route('chitietsanpham.index',['id' =>$id])}}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách chi tiết sản phẩm</span>
        </a>
        <h3>Thêm mới chi tiết sản phẩm</h3>
      </div>
      <form id="form">
        @csrf
        <input type="hidden" name="id" value="{{$id}}" id="id">
        <div class="add-product-form">
          <div style="padding-bottom: 24px;border-bottom: 1px solid #dfe4e8;" class="col-12 pl-0 pr-0">
            <div class="product-info">
              <div class="product-info-item">

              <div class="product-info-item">
                <div class="row">
                  <div class="col-4">
                    <label class="product-info-item-label" for="">Màu<span class="repuired"> *</span></label>
                    <i class="fas fa-info note-info">
                      <p>Nhập màu không quá 20 ký tự</p>
                    </i>
                    <input class="textbox" style="width: 100%" type="text" name="mau">
                    <div class="error error-name" 	@if($errors->has('mau')) style="display:block;color:red" @endif>{{$errors->first('mau')}}</div>
                  </div>
                  <div class="col-4">
                    <label class="product-info-item-label" for="">Kích thước<span class="repuired"> *</span></label>
                    <i class="fas fa-info note-info">
                      <p>Nhập kích thước không quá 10 ký tự</p>
                    </i>
                    <input class="textbox" style="width: 100%" type="text" name="kichthuoc">
                    <div class="error error-name" 	@if($errors->has('kichthuoc')) style="display:block;color:red" @endif>{{$errors->first('kichthuoc')}}</div>
                  </div>
                  <div class="col-4">
                    <label class="product-info-item-label" for="">Số lượng<span class="repuired"> *</span></label>
                    <i class="fas fa-info note-info">
                      <p>Nhập giá trị số</p>
                    </i>
                    <input class="textbox" style="width: 100%" type="text" name="soluong">
                    <div class="error error-name" 	@if($errors->has('soluong')) style="display:block;color:red" @endif>{{$errors->first('soluong')}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="padding: unset; padding-top: 24px" class="product-footer">
          <div class="product-footer-btn">
            <button class="save-btn btn">Lưu</button>
          </div>
        </div>
      </form>
    </div>
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
                  url:`admin/sanpham/${idInput}/chitietsanpham/store` ,
                  data:formData,
                  processData:false,
                  contentType:false,
                  type:"POST",
                  success:function(data){
                      if(!$.isEmptyObject(data.success)) {
                        location.replace(`http://127.0.0.1:8000/admin/sanpham/${idInput}/chitietsanpham/`);
                        alert(data.success);
                      } 
                      if(!$.isEmptyObject(data.error)) {
                          
                          
                          if(!$.isEmptyObject(data.error.kichthuoc)) {
                              printErrorMsg (data.error.kichthuoc, 'kichthuoc');
                              $("input[name=kichthuoc]").focus();
                          }
                          if(!$.isEmptyObject(data.error.soluong)) {
                              printErrorMsg (data.error.soluong, 'soluong');
                              $("input[name=soluong]").focus();
                          }
                          if(!$.isEmptyObject(data.error.mau)) {
                              printErrorMsg (data.error.mau, 'mau');
                              $("input[name=mau]").focus();
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