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
  .add-img-div {
    text-align: right;
    margin-bottom: 8px;
  }
  .list-img {
    max-height: 440px;
    overflow-y: auto;
  }
  .icon-del{
    position: relative;
    background-color: red;
    right: 27px;
    top: -85px;
   }
   .abc {
     position: relative;
     width: 15%;
     display: inline-block;
     margin-right: 25px;
     margin-top: 20px;
   }
   .file-hide {
     display: none;
   }
   .abc a {
     position: absolute;
     top: -10px;
     right: -12px;
   }
   .img-thumbnail {
     width: 100%;
   }
   .add-img-btn {
     background-color: #007bff;color:#fff;
     float: right
   }
  .img-div {
    text-align: center;
  }
  .img-div img {
    margin-top: 8px;
  }
  .discount-div, .price-div, .cost-div {
    position: relative;
  }
  .discount-div .textbox, .price-div .textbox, .cost-div .textbox {
    padding-right: 40px;
  }
  .dram {
    position: absolute;
    top: 5px;
    right: 8px;
    font-weight: 600;
  }
  @media(min-width: 768px) and (max-width: 1024px) {
    .add-product-form {
      margin: 0;
    }
    .head-add-pro {
      padding: 18px;
      margin-bottom: 0;
    }
    .abc {
      width: 46%;
    }
    .list-img {
      max-height: 485px;
      overflow-y: auto;
    }
  }
  @media(max-width: 767px) {
    .head-add-pro {
      padding: 12px;
    }
    .add-product-form {
      margin: unset;
    }
    {{--  .info-pdt {
      padding: unset;
      min-width: 100%;
    }
    .img-pdt {
      min-width: 100%;
      padding: unset;
    }
    .img-item {
      padding: unset;
    }  --}}
    .abc {
      width: 92%;
    }
    .list-img {
      max-height: 515px;
      overflow-y: auto;
    }
    .product-footer {
      padding: 20px
    }
    .head-title {
      margin-bottom: unset;
    }
  }
</style>
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('sanpham.indexAdmin') }}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách sản phẩm</span>
        </a>
        <h3>Sửa sản phẩm</h3>
      </div>
      <form id="form" >
        @method('PUT')
        @csrf
        <input type="hidden" value="{{$dsSanPham['id']}}" name="id" id="id">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="row add-product-form">
            <div class="col-12 pl-0 pr-0">
              <div class="product-info">
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Tên sản phẩm<span class="repuired"> *</span></label>
                  <i class="fas fa-info note-info">
                    <p>Tên sản phẩm không quá 50 ký tự</p>
                  </i>
                  <input class="textbox" type="text" placeholder="Nhập tên sản phẩm" value="{{$dsSanPham['ten_san_pham']}}" name="tensanpham">
                  <div class="error error-name" 	@if($errors->has('tensanpham')) style="display:block;color:red" @endif>{{$errors->first('tensanpham')}}</div>
                </div>
                <div class="product-info-item">
                  <div class="row">
                    <div class="col-6">
                      <label class="product-info-item-label" for="nhasanxuat">Nhà sản xuất<span class="repuired"> *</span></label>
                      <select class="textbox" name="nhasanxuat" id="nhasanxuat">
                        <?php $nhasanxuat = App\NhaSanXuat::all()  ?>
                        @foreach($nhasanxuat as $i)
                          <option value="{{$i['id']}}" {{($i->id== $dsSanPham->nha_san_xuats_id ? 'selected' : '')}}>{{$i['ten_nha_san_xuat']}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="col-6">
                      <label class="product-info-item-label" for="">Giảm giá</label>
                      <i class="fas fa-info note-info">
                        <p>Nhập ký tự số từ 1 đến 100</p>
                      </i>
                      <div class="discount-div">
                        <input class="textbox" type="text" placeholder="Nhập giảm giá"  value="{{$dsSanPham['giam_gia']}}" name="giamgia">
                        <p class="dram">%</p>
                      </div>
                      <div class="error error-name" 	@if($errors->has('giamgia')) style="display:block;color:red" @endif>{{$errors->first('giamgia')}}</div>
                    </div>
                  </div>
                </div>
                <div class="product-info-item">
                  <div class="row">
                    <div class="col-6">
                      <label class="product-info-item-label" for="loaisanpham">Loại sản phẩm<span class="repuired"> *</span></label>
                      <select class="textbox" name="loaisanpham" id="loaisanpham">
                        <?php $loaisanpham = App\LoaiSanPham::all()  ?>
                        @foreach($loaisanpham as $i)
                          <option value="{{$i['id']}}"  {{($i->id== $dsSanPham->loai_san_phams_id ? 'selected' : '')}}>{{$i['ten_loai_san_pham']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-6">
                      <label class="product-info-item-label" for="monthethao">Bộ môn thể thao<span class="repuired"> *</span></label>
                      <select class="textbox" name="monthethao" id="monthethao">
                        <?php $monthethao = App\MonTheThao::all()  ?>
                        @foreach($monthethao as $i)
                          <option value="{{$i['id']}}" {{($i->id== $dsSanPham->mon_the_thaos_id ? 'selected' : '')}}>{{$i['ten_the_thao']}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Giá gốc<span class="repuired"> *</span></label>
                      <i class="fas fa-info note-info">
                        <p>Nhập ký tự số</p>
                      </i>
                      <div class="cost-div"> 
                        <input class="textbox" type="text" placeholder="Nhập giá gốc" value="{{$dsSanPham['gia_goc']}}" name="giagoc">
                        <p class="dram">VNĐ</p>
                      </div>
                      <div class="error error-name" 	@if($errors->has('giagoc')) style="display:block;color:red" @endif>{{$errors->first('giagoc')}}</div>
                </div>
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Giá bán<span class="repuired"> *</span></label>
                      <i class="fas fa-info note-info">
                        <p>Nhập ký tự số</p>
                      </i>
                      <div class="price-div">
                        <input class="textbox" type="text" placeholder="Nhập giá bán" value="{{$dsSanPham['gia_ban']}}" name="giaban">
                        <p class="dram">VNĐ</p>
                      </div>
                      <div class="error error-name" 	@if($errors->has('giaban')) style="display:block;color:red" @endif>{{$errors->first('giaban')}}</div>
                </div>
                <div>
                  <div class="add-img-div">
                    <button id="add-img-btn" type="button" class="btn save-btn">Thêm hình ảnh</button>
                  </div>
                  <div class="list-img">
                    @foreach($dsSanPham->anh as $i => $anh)
                      <div class="form-group abc" id="{{$i}}">
                        <img src="{{asset($anh->link)}}" alt="no img" id="{{$i}}" data-id="{{$anh->id}}" idHinh="imgsp_{{$i}}" class="img-thumbnail" width="60%">
                        <a href="javascript:void(0)" id="del_img_demo" class="btn btn-danger btn-cricle icon-del"><i class="fa fa-times"></i></a>      
                        {{-- <input type="file" class="form-control" style="display: none" data-id="{{$i}}" name="link[]" id="{{$i}}" onchange="loadfile(this)"> --}}
                      </div>
                     @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 pl-0 mt-20 pr-0">
              <div class="product-info">
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Mô tả</label>
                  <textarea class="ckeditor" id="textarea1" cols="30" type="text" rows="10" name="mota"><?php echo $dsSanPham['mo_ta']?></textarea>
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
      CKEDITOR.replace( 'textarea1');
    </script>
@endsection
@section('script')
  <script>
    var count3 = 0;
    $(document).ready(function(){
    $('#addImages').click(function(){
      $('#insert').append('<input type="file" style="margin:10px" class="form-control" data-id="batcanhchua_'+count3+'" name="link[]" id="link_{{$i}}" onchange="loadfile(this)"><img src="{{asset(getLink('product','no-image.png'))}}" alt="no img" id="imgsp_batcanhchua_'+count3+'" class="img-thumbnail" width="150px">')
      count3++;
    })
    });
    $(document).ready(function(){
        $('a#del_img_demo').on('click',function(){
        var url = location.origin + "/admin/sanpham/delimg/";
        var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
        var idHinh = $(this).parent().find("img").data("id");
        var img = $(this).parent().find("img").attr("src");
        var rid = $(this).parent().find("img").attr("id");
        $.ajax({
          url: url + idHinh,
          type: 'GET',
          cache: false,
          data: {"_token":_token,"idHinh":idHinh,"urlHinh":img},
          success: function(data){
            console.log(data);
            if(!data.error){
              $("#"+rid).remove();
            }else{
              // alert("erro");
            }
          }
        });
      })
      
    });
  </script>
  <script type="text/javascript">
    var loadfile = function(trung) {
      var id = trung.getAttribute('id');
      var img = document.getElementById(`imgsp_${id}`);
      var img_div = document.getElementById(`file_items_${id}`);
      if(img_div.classList.contains('file-hide')) {
        img_div.classList.remove('file-hide');
      }
      img.src = URL.createObjectURL(trung.files[0]);
    };
    $('#add-img-btn').click(function() {
      jQuery('.abc').last().find('input[type="file"]').val();
      var d = new Date();
      var _time = d.getTime();
      var _html = '<div class="abc file-hide" id="file_items_' + _time + '">';
      _html += '<img id="imgsp_' + _time + '" class="img-thumbnail" width="60%">';
      _html += '<input type="file" name="link[]" style="display: none"  onchange="loadfile(this)" id="' + _time + '"   />';
      _html += '<a onclick="DelImg(this)" id="del_img_demo" class="btn btn-danger btn-cricle icon-del"><i class="fa fa-times"></i></a> ';
      _html += ' </div>';
      jQuery('.list-img').append(_html);
      jQuery('.abc').last().find('input[type="file"]').click();
    });  

    function DelImg(el) {
      jQuery(el).closest('.abc').remove();
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
              url:"admin/sanpham/" + idInput,
              data:formData,
              processData:false,
              contentType:false,
              type:"POST",
              success:function(data){
                  if(!$.isEmptyObject(data.success)) {
                    location.replace("http://127.0.0.1:8000/admin/sanpham");
                    alert(data.success);
                  } 
                  if(!$.isEmptyObject(data.error)) {
                      if(!$.isEmptyObject(data.error.giaban)) {
                          printErrorMsg (data.error.giaban, 'giaban');
                          $("input[name=giaban]").focus();
                      }
                      if(!$.isEmptyObject(data.error.giagoc)) {
                          printErrorMsg (data.error.giagoc, 'giagoc');
                          $("input[name=giagoc]").focus();
                      }
                      if(!$.isEmptyObject(data.error.giamgia)) {
                          printErrorMsg (data.error.giamgia, 'giamgia');
                          $("input[name=giamgia]").focus();
                      }
                      if(!$.isEmptyObject(data.error.tensanpham)) {
                          printErrorMsg (data.error.tensanpham, 'tensanpham');
                          $("input[name=tensanpham]").focus();
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