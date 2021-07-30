@extends('admin.master.master')
@section('content')
<style>
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
      <form action="{{route('monthethao.update',$dsMonTheThao['id'])}}" method="POST">
        @method('PUT')
        @csrf
        {{-- <input type="hidden" value="{{$dsMonTheThao['id']}}" name="id"> --}}
        <div class="add-product-form">
          <div style="border-bottom: 1px solid #dfe4e8; padding-bottom: 24px" class="pl-0 pr-0">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên môn thể thao<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
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
@endsection