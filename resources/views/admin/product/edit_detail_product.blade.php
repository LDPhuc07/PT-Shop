@extends('admin.master.master')
@section('content')
<style>
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
        <h3>Chỉnh sửa chi tiết sản phẩm</h3>
      </div>
      <form action="{{route('chitietsanpham.update',['id' =>$id,'idct' => $dsChiTietSanPham['id']])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="add-product-form">
          <div style="padding-bottom: 24px;
          border-bottom: 1px solid #dfe4e8;" class="col-12 pl-0 pr-0">
            <div class="product-info">
              <div class="product-info-item">
                <div class="row">
                  <div class="col-4">
                    <label class="product-info-item-label" for="">Màu<span class="repuired"> *</span></label>
                    <i class="fas fa-info note-info">
                      <p>Nhập màu không quá 20 ký tự</p>
                    </i>
                    <input class="textbox" style="width: 100%" type="text" name="mau" value="{{$dsChiTietSanPham['mau']}}">
                <div class="error error-name" 	@if($errors->has('mau')) style="display:block;color:red" @endif>{{$errors->first('mau')}}</div>
                  </div>
                  <div class="col-4">
                    <label class="product-info-item-label" for="">Kích thước<span class="repuired"> *</span></label>
                    <i class="fas fa-info note-info">
                      <p>Nhập kích thước không quá 10 ký tự</p>
                    </i>
                    <input class="textbox" style="width: 100%" type="text" name="kichthuoc" value="{{$dsChiTietSanPham['kich_thuoc']}}">
                    <div class="error error-name" 	@if($errors->has('kichthuoc')) style="display:block;color:red" @endif>{{$errors->first('kichthuoc')}}</div>
                  </div>
                  <div class="col-4">
                    <label class="product-info-item-label" for="">Số lượng<span class="repuired"> *</span></label>
                    <i class="fas fa-info note-info">
                      <p>Nhập giá trị số</p>
                    </i>
                    <input class="textbox" style="width: 100%" type="text" name="soluong" value="{{$dsChiTietSanPham['so_luong']}}">
                    <div class="error error-name" 	@if($errors->has('soluong')) style="display:block;color:red" @endif>{{$errors->first('soluong')}}</div>
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
        </div>
      </form>
    </div>
@endsection