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
  .product-container {
    margin-top: unset;
  }
  .add-product-form {
    margin: 25px 220px 0;
    border-bottom: unset;
  }
  @media(max-width: 767px) {
    .head-add-pro {
      padding: 20px;
    }
    .add-product-form {
      margin: 20px;
    }
  }
</style>
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('monthethao.index')}}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách môn thể thao</span>
        </a>
        <h3>Chỉnh sửa môn thể thao</h3>
      </div>
      <form id="form">
        @method('PUT')
        @csrf
        <input type="hidden" value="{{$dsMonTheThao['id']}}" name="id" id="id">
        <div class="add-product-form">
          <div style="border-bottom: 1px solid #dfe4e8; padding-bottom: 24px" class="pl-0 pr-0">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên môn thể thao<span class="repuired"> *</span></label>
                <i class="fas fa-info note-info">
                  <p>Tên môn thể thao không quá 50 ký tự</p>
                </i>
                <input class="textbox" type="text" placeholder="Nhập tên sản phẩm" value="{{$dsMonTheThao['ten_the_thao']}}" name="tenthethao">
                <div class="error error-name" 	@if($errors->has('tenthethao')) style="display:block;color:red" @endif>{{$errors->first('tenthethao')}}</div>
              </div>
            </div>
          </div>
          <div style="padding: unset; padding-top: 24px" class="product-footer">
            <div class="product-footer-btn">
              {{-- <button class="destroy-btn btn">Hủy</button> --}}
              <button class="save-btn btn">Lưu</button>
            </div>
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
                  url:"admin/monthethao/" + idInput,
                  data:formData,
                  processData:false,
                  contentType:false,
                  type:"POST",
                  success:function(data){
                      if(!$.isEmptyObject(data.success)) {
                        location.replace("http://127.0.0.1:8000/admin/monthethao");
                        alert(data.success);
                      } 
                      if(!$.isEmptyObject(data.error)) {
                          
                          if(!$.isEmptyObject(data.error.tenthethao)) {
                              printErrorMsg (data.error.tenthethao, 'tenthethao');
                              $("input[name=tenthethao]").focus();
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