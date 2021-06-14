@extends('admin.master.master')
@section('content')
<style>
  .icon-del{
   position: relative;
   background-color: red;
   right: 27px;
   top: -85px;
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
      <form action="{{route('sanpham.update',$dsSanPham['id'])}}" method="POST" enctype="multipart/form-data" name="frmEditProduct">
        @method('PUT')
        @csrf
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="row add-product-form">
          <div class="col-8">
            <div class="col-12 pl-0 pr-10">
              <div class="product-info">
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Tên sản phẩm<span class="repuired"> *</span></label>
                  <i class="fas fa-info"></i>
                  <input class="textbox" type="text" placeholder="Nhập tên sản phẩm" value="{{$dsSanPham['ten_san_pham']}}" name="tensanpham">
                  <div class="error error-name" 	@if($errors->has('tensanpham')) style="display:block;color:red" @endif>{{$errors->first('tensanpham')}}</div>
                </div>
                <div class="product-info-item">
                  <div class="row">
                    <div class="col-6">
                      <label class="product-info-item-label" for="nhasanxuat">Nhà sản xuất<span class="repuired"> *</span></label>
                      <i class="fas fa-info"></i>
                      <select class="textbox" name="nhasanxuat" id="nhasanxuat">
                        <?php $nhasanxuat = App\NhaSanXuat::all()  ?>
                        @foreach($nhasanxuat as $i)
                          <option value="{{$i['id']}}" {{($i->id== $dsSanPham->nha_san_xuats_id ? 'selected' : '')}}>{{$i['ten_nha_san_xuat']}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="col-6">
                      <label class="product-info-item-label" for="">Giảm giá<span class="repuired"> *</span></label>
                      <i class="fas fa-info"></i>
                      <input class="textbox" type="text" placeholder="Nhập giảm giá"  value="{{$dsSanPham['giam_gia']}}" name="giamgia">
                      <div class="error error-name" 	@if($errors->has('giamgia')) style="display:block;color:red" @endif>{{$errors->first('giamgia')}}</div>
                    </div>
                  </div>
                </div>
                <div class="product-info-item">
                  <div class="row">
                    <div class="col-6">
                      <label class="product-info-item-label" for="loaisanpham">Loại sản phẩm<span class="repuired"> *</span></label>
                      <i class="fas fa-info"></i>
                      <select class="textbox" name="loaisanpham" id="loaisanpham">
                        <?php $loaisanpham = App\LoaiSanPham::all()  ?>
                        @foreach($loaisanpham as $i)
                          <option value="{{$i['id']}}"  {{($i->id== $dsSanPham->loai_san_phams_id ? 'selected' : '')}}>{{$i['ten_loai_san_pham']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-6">
                      <label class="product-info-item-label" for="monthethao">Bộ môn thể thao<span class="repuired"> *</span></label>
                      <i class="fas fa-info"></i>
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
                      <i class="fas fa-info"></i>
                      <input class="textbox" type="text" placeholder="Nhập giá gốc" value="{{$dsSanPham['gia_goc']}}" name="giagoc">
                      <div class="error error-name" 	@if($errors->has('giagoc')) style="display:block;color:red" @endif>{{$errors->first('giagoc')}}</div>
                </div>
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Giá bán<span class="repuired"> *</span></label>
                      <i class="fas fa-info"></i>
                      <input class="textbox" type="text" placeholder="Nhập giá bán" value="{{$dsSanPham['gia_ban']}}" name="giaban">
                      <div class="error error-name" 	@if($errors->has('giaban')) style="display:block;color:red" @endif>{{$errors->first('giaban')}}</div>
                </div>
              </div>
            </div>
            <div class="col-12 pl-0 mt-20 pr-10">
              <div class="product-info">
                <div class="product-info-item">
                  <label class="product-info-item-label" for="">Mô tả</label>
                  <i class="fas fa-info"></i>
                  <textarea class="textbox" cols="30" type="text" rows="10" name="mota"><?php echo $dsSanPham['mo_ta']?></textarea>
                  <div class="error error-name" 	@if($errors->has('mota')) style="display:block;color:red" @endif>{{$errors->first('mota')}}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="col-12">
              @foreach($dsSanPham->anh as $i => $anh)
                <div class="form-group abc" id="{{$i}}">
                  <img src="{{asset($anh->link)}}" alt="no img" id="{{$i}}" data-id="{{$anh->id}}" idHinh="imgsp_{{$i}}" class="img-thumbnail" width="60%">
                  <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-cricle icon-del"><i class="fa fa-times"></i></a>      
                    {{-- <input type="file" class="form-control" data-id="{{$i}}" name="link[]" id="link_{{$i}}" onchange="loadfile(this)"> --}}
                </div>
              @endforeach
              <button type="button" class="btn btn-primary" id=addImages style="background-color: #007bff;color:#fff;margin-top: 15px">Thêm hình ảnh</button>
            </div>
            <div id="insert"></div>
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
      var loadfile = function(trung){
        var id = trung.getAttribute('data-id');
        console.log(id);
        var img = document.getElementById(`imgsp_${id}`);
        img.src = URL.createObjectURL(trung.files[0]);
    }
    </script>
@endsection
@section('script')
  <script>
    var count3 = 0;
    $(document).ready(function(){
    $('#addImages').click(function(){
      $('#insert').append('<input type="file" style="margin:10px" class="form-control" data-id="batcanhchua_'+count3+'" name="link[]" id="link_{{$i}}" onchange="loadfile(this)"><img src="{{asset('img/no-image.png')}}" alt="no img" id="imgsp_batcanhchua_'+count3+'" class="img-thumbnail" width="150px">')
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
@endsection