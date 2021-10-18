@extends('admin.master.master')
@section('content')
<style>
  .img-div {
    text-align: center;
  }
  .img-div img {
    margin-top: 8px;
  }
  @media(min-width: 768px) and (max-width: 1023px) {
    .add-product-form {
      margin: 25px 50px 0;
    }
  }
  @media(max-width: 767px) {
    .add-product-form {
      margin: 1px;
    }
    .head-add-pro {
      padding: 18px;
    }
    .img-col {
      min-width: 100%;
    }
    .product-footer {
      padding: 18px;
    }
  }
</style>
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('sanpham.indexAdmin') }}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách sản phẩm</span>
        </a>
        <h3>Thêm mới sản phẩm</h3>
      </div>
      <form action="{{route('sanpham.storeAdmin')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row add-product-form">
          <div class="col-12 pl-0 pr-0">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên sản phẩm<span class="repuired"> *</span></label>
                <i class="fas fa-info note-info">
                  <p>Tên sản phẩm không quá 50 ký tự</p>
                </i>
                <input class="textbox" type="text" placeholder="Nhập tên sản phẩm" name="tensanpham">
                <div class="error error-name" 	@if($errors->has('tensanpham')) style="display:block;color:red" @endif>{{$errors->first('tensanpham')}}</div>
              </div>
              <div class="product-info-item">
                <div class="row">
                  <div class="col-6">
                    <label class="product-info-item-label" for="nhasanxuat">Nhà sản xuất<span class="repuired"> *</span></label>
                    <select class="textbox" name="nhasanxuat" id="nhasanxuat">
                      <?php $nhasanxuat = App\NhaSanXuat::all()  ?>
                      @foreach($nhasanxuat as $i)
                        <option value="{{$i['id']}}">{{$i['ten_nha_san_xuat']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="product-info-item-label" for="">Giảm giá<span class="repuired">(%)</span></label>
                    <i class="fas fa-info note-info">
                      <p>Nhập ký tự số từ 1 đến 100</p>
                    </i>
                    <input class="textbox" type="number" placeholder="Nhập giảm giá" name="giamgia">
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
                        <option value="{{$i['id']}}">{{$i['ten_loai_san_pham']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="product-info-item-label" for="monthethao">Bộ môn thể thao<span class="repuired"> *</span></label>
                    <select class="textbox" name="monthethao" id="monthethao">
                      <?php $monthethao = App\MonTheThao::all()  ?>
                      @foreach($monthethao as $i)
                        <option value="{{$i['id']}}">{{$i['ten_the_thao']}}</option>
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
                    <input class="textbox" type="text" placeholder="Nhập giá gốc" name="giagoc">
                    <div class="error error-name" 	@if($errors->has('giagoc')) style="display:block;color:red" @endif>{{$errors->first('giagoc')}}</div>
              </div>
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Giá bán<span class="repuired"> *</span></label>
                    <i class="fas fa-info note-info">
                      <p>Nhập ký tự số</p>
                    </i>
                    <input class="textbox" type="text" placeholder="Nhập giá bán" name="giaban">
                    <div class="error error-name" 	@if($errors->has('giaban')) style="display:block;color:red" @endif>{{$errors->first('giaban')}}</div>
              </div>
              <div class="row">
                @for($i = 1; $i <=4 ; $i++)
                <div class="col-3 img-col">
                  <div class="product-info product-picture">
                    <input type="file" class="form-control" name="link[]" id="link_{{$i}}" data-id="{{$i}}" onchange="loadfile(this)">
                    <div class="form-group abc-{{$i}} img-div">
                        <img src="{{asset(getLink('product','no-image.png'))}}" alt="no img" id="imgsp_{{$i}}" class="img-thumbnail" width="200px">
                    </div>
                  </div>
                </div>
                @endfor
              </div>
            </div>
          </div>
          
          <div class="col-12 pr-0 pl-10">

          </div>
          {{-- @for($i = 1; $i <=4 ; $i++)
          <div class="col-12 pl-0 mt-20 pr-0">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Thêm ảnh {{ $i }}</label>
                <input type="file" name=anhchitiet[]>
              </div>  
            </div>
            @endfor
          </div> --}}
          <div class="col-12 pl-0 mt-20 pr-0">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Mô tả</label>
                <textarea class="ckeditor" cols="30" rows="10" name="mota" id="textarea1">
                </textarea>
                <div class="error error-name" 	@if($errors->has('mota')) style="display:block;color:red" @endif>{{$errors->first('mota')}}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-footer">
          <div class="product-footer-btn">
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
    CKEDITOR.replace( 'textarea1');
    </script>
@endsection