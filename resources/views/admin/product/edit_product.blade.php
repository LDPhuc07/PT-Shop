@extends('admin.master.master')
@section('content')
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('sanpham.indexAdmin') }}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách sản phẩm</span>
        </a>
        <h3>Sửa sản phẩm</h3>
      </div>
      <form action="{{route('sanpham.update',$dsSanPham['id'])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row add-product-form">
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
                    <label class="product-info-item-label" for="">Giá bán<span class="repuired"> *</span></label>
                    <i class="fas fa-info"></i>
                    <input class="textbox" type="text" placeholder="Nhập giá bán" value="{{$dsSanPham['gia_ban']}}" name="giaban">
                    <div class="error error-name" 	@if($errors->has('giaban')) style="display:block;color:red" @endif>{{$errors->first('giaban')}}</div>
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
                <label class="product-info-item-label" for="">Giảm giá<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" placeholder="Nhập giảm giá"  value="{{$dsSanPham['giam_gia']}}" name="giamgia">
                <div class="error error-name" 	@if($errors->has('giamgia')) style="display:block;color:red" @endif>{{$errors->first('giamgia')}}</div>
              </div>
              <div class="row">
                @foreach($dsSanPham->anh as $i => $anh)
               {{-- @for($i = 1; $i <=4 ; $i++) --}}
                <div class="col-3">
                  {{-- {{dd($dsSanPham->link[])}}; --}}
                  <div class="product-info product-picture">
                    <input type="file" class="form-control" data-id="{{$i}}" name="link[{{$i}}][file]" id="link_{{$i}}" onchange="loadfile(this)">           
                    <div class="form-group abc" id="link_{{$i}}">
                        <img src="{{asset($anh->link)}}" alt="no img" id="imgsp_{{$i}}" class="img-thumbnail" width="200px">
                    </div>
                    {{-- <input type="file" hidden value="{{asset($anh->link)}}"> --}}
                  </div>
                </div>
                {{-- @endfor --}}
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-12 pr-0 pl-10">
          </div>
          <div class="col-12 pl-0 mt-20 pr-0">
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
        <div class="product-footer">
          <div class="product-footer-btn">
            {{-- <button class="destroy-btn btn">Hủy</button> --}}
            <button class="save-btn btn">Lưu</button>
          </div>
        </div>
      </form>
      {{-- <div class="form-group row">
        <div class="col-sm-4">
            <label class="label-check">Ảnh sản phẩm</label>
            <div class="custom-file">
                <input type="file" name="image" @if($flag) value="{{$primary}}" @endif accept=".jpg, .jpeg, .png" class="custom-file-input img-pro" id="file">
                <label class="custom-file-label" id="label-file" for="customFile">{{!empty($primary->name) ? $primary->name : 'Chọn ảnh'}}  </label>
                @if(isset($primary)) <input type="hidden" value="{{$primary->id}}" name="id_img"/> @endif
              </div>   
            <img width="200px" height="200px" id="ImgPre" @if($flag && !empty($primary)) src="{{ asset($primary->path)}}" @else src="{{ asset('images/no-image.png')}}" @endif alt="Alternate Text" class="img-thumbnail" />                             
            <div class="error error-image" 	@if($errors->has('image')) style="display:block" @endif>{{$errors->first('image')}}</div>
          </div>
      </div> --}}
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