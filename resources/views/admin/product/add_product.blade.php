@extends('admin.master.master')
@section('content')
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('sanpham.indexAdmin') }}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách sản phẩm</span>
        </a>
        <h3>Thêm mới sản phẩm</h3>
      </div>
      <form action="{{route('sanpham.storeAdmin')}}" method="post">
        @csrf
        <div class="row add-product-form">
          <div class="col-8 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên sản phẩm<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" placeholder="Nhập tên sản phẩm" name="tensanpham">
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
                        <option value="{{$i['id']}}">{{$i['ten_nha_san_xuat']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="product-info-item-label" for="">Giá bán<span class="repuired"> *</span></label>
                    <i class="fas fa-info"></i>
                    <input class="textbox" type="text" placeholder="Nhập giá bán" name="giaban">
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
                        <option value="{{$i['id']}}">{{$i['ten_loai_san_pham']}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-6">
                    <label class="product-info-item-label" for="monthethao">Bộ môn thể thao<span class="repuired"> *</span></label>
                    <i class="fas fa-info"></i>
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
                <label class="product-info-item-label" for="">Giảm giá<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" placeholder="Nhập giảm giá" name="giamgia">
                <div class="error error-name" 	@if($errors->has('giamgia')) style="display:block;color:red" @endif>{{$errors->first('giamgia')}}</div>
              </div>
            </div>
          </div>
          <div class="col-4 pr-0 pl-10">
            <div class="product-info product-picture">
              <div class="head-product-picture">
                <span>Ảnh sản phẩm</span>
                <a href="">Thêm ảnh</a>
              </div>
              <div class="product-picture-item">
                <img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png" alt="">
              </div>
            </div>
          </div>
          <div class="col-12 pl-0 mt-20 pr-0">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Mô tả</label>
                <i class="fas fa-info"></i>
                <textarea class="textbox" cols="30" rows="10" name="mota">
                </textarea>
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
    </div>
@endsection