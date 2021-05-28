@extends('admin.master.master')
@section('content')
    <div class="product-container">
      <div class="head-title head-add-pro">
        <a href="{{ route('slideshow.index')}}">
          <i class="fas fa-chevron-left"></i>
          <span>Quay lại danh sách slideshow</span>
        </a>
        <h3>Chỉnh sửa môn thể thao</h3>
      </div>
      <form action="{{route('slideshow.update',$dsSlideShow['id'])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row add-product-form">
          <div class="col-8 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Tên slideshow<span class="repuired"> *</span></label>
                <i class="fas fa-info"></i>
                <input class="textbox" type="text" placeholder="Nhập tên nhà sản xuất" value="{{$dsSlideShow['slideshow']}}" name="tenslideshow">
                <div class="error error-name" 	@if($errors->has('tenslideshow')) style="display:block;color:red" @endif>{{$errors->first('tenslideshow')}}</div>
              </div>
            </div>
          </div>
          <div class="col-4 pl-0 pr-10">
            <div class="product-info">
              <div class="product-info-item">
                <label class="product-info-item-label" for="">Ảnh<span class="repuired"> *</span></label>
                <input type="file" class="form-control" placeholder="Ảnh" value="{{$dsSlideShow['link']}}"  name="link" id="link" onchange="loadfile(event)">
                <div class="error error-name" 	@if($errors->has('link')) style="display:block;color:red" @endif>{{$errors->first('link')}}</div>
                <div class="form-group">
                  <img src="{{asset(getLink('slideshow',$dsSlideShow['link']))}}" alt="no img" id="imgsp" class="img-thumbnail" width="200px">
              </div>
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
@endsection