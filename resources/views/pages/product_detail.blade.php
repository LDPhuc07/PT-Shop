@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/productdetail.css">
@endsection
@section('content')
<!-- product detail -->
<div class="product__detail">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="img-product">
          <ul class="all-img">
            {{-- @foreach($sanpham as $i) --}}
              @foreach($sanpham->anh as $anh)
                <li class="img-item">
                  <img src="{{asset(getLink('product',$anh->link))}}" class="small-img" alt="anh 1" onclick="changeImg('{{$anh->id}}')" id="{{$anh->id}}">
                </li>
              @endforeach
            {{-- <li class="img-item">
              <img src="img/product/addidas1.jpg" class="small-img" alt="anh 2" onclick="changeImg('two')" id="two">
            </li>
            <li class="img-item">
              <img src="img/product/giayxanh.jpg" class="small-img" alt="anh 3" onclick="changeImg('three')" id="three">
            </li>
            <li class="img-item">
              <img src="img/product/giayxah2.jpg" class="small-img" alt="anh 4" onclick="changeImg('four')" id="four">
            </li> --}}
            {{-- @endforeach --}}
          </ul>
        </div>
        <div id="main-img" style="cursor: pointer;">
          @foreach($anhchinh->anh as $anh)
            <img src="{{asset(getLink('product',$anh->link))}}" class="big-img" alt="ảnh chính" id="img-main" xoriginal="{{asset(getLink('product',$anh->link))}}">
          @endforeach
        </div>
      </div>
      <div class="col-6">
        <div class="product__name">
          <h2>{{$sanpham->ten_san_pham}}</h2>
        </div>
        <div class="product__price">
          <h2>{{number_format($sanpham['gia_ban'],0,',','.').' '.'VNĐ'}}</h2>
        </div>
        <div class="product__color">
          <div class="select-swap">
            @foreach($color as $i)
              @if($i->mau == 'xanh la')
                <button class="product__color-item green"></button>
              @endif
              @if($i->mau == 'trang')
                <button class="product__color-item white"></button>
              @endif
              @if($i->mau == 'den')
                <button class="product__color-item black"></button>
              @endif
              @if($i->mau == 'xanh duong')
                <button class="product__color-item blue"></button>
              @endif
              @if($i->mau == 'xam')
                <button class="product__color-item gray"></button>
              @endif
              @if($i->mau == 'vang')
                <button class="product__color-item yellow"></button>
              @endif
              @if($i->mau == 'do')
                <button class="product__color-item red"></button>
              @endif
              @if($i->mau == 'cam')
                <button class="product__color-item orange"></button>
              @endif
              @if($i->mau == 'tim')
                <button class="product__color-item violet"></button>
              @endif
            @endforeach
          </div>
        </div>
        <div class="product__size">
          <div class="select-swap">
            @foreach($size as $i)
              <button class="option-swap">{{$i->kich_thuoc}}</button>
            @endforeach
          </div>
        </div>
        <div class="product__wrap">
          <div class="product__amount">
            <label for="">Số lượng: </label>
            <input type="button" value="-" class="control">
            <input type="text" value="1" class="text-input"> 
            <input type="button" value="+" class="control">
          </div>
          <button class="likenow">Thêm vào danh sách thích</button>
          
        </div>
        <div class="product__shopnow">
          <button class="shopnow">Mua ngay</button>
          <button class="add-cart">Thêm vào giỏ</button>
        </div>
        <div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="product__describe">
  <div class="container">
    <h2 class="product__describe-heading">Mô tả</h2>
    <div class="row">
      <div class="col-1"></div>
      <div class="col-11">
        <h3 class="name__product">{{$sanpham->ten_san_pham}}</h3>
        <h3>Thông số kĩ thuật: </h3>
        <p>{{$sanpham->mo_ta}}</p>
      </div>
    </div>
  </div>
</div>
<!-- end product detail -->
<!-- product relate to -->
<div class="product__relateto">
  <div class="container">
    <h3 class="product__relateto-heading">Sản phẩm liên quan</h3>
    <div class="row">
      @foreach($sanphamlienquans as $sanphamlienquan)
        <div class="col-3">
          <div class="card" style="width: 100%">
            @foreach($sanphamlienquan->anh as $anh)
              <img class="card-img-top" src="{{asset(getLink('product',$anh->link))}}" alt="Card image cap">
            @endforeach
            <div class="card-body">
              <h5 class="card-title">{{$sanphamlienquan['ten_san_pham']}}</h5>
              <p class="card-text price-color">{{$sanphamlienquan['gia_ban']}}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="seemore">
      <a href="">Xem thêm</a>
    </div>
  </div>
</div>
<!-- end  product relate to-->

@endsection
@section('js')
<script src="js/main.js"></script>
      <script src="js/zoomsl.js"></script>
      <script>
        $(document).ready(function(){
          $(".big-img").imagezoomsl({
            zoomrange: [3, 3]
          });
        });
      </script>
@endsection