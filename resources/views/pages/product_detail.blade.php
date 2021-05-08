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
            <li class="img-item">
              <img src="img/product/stansmith.jpg" class="small-img" alt="anh 1" onclick="changeImg('one')" id="one">
            </li>
            <li class="img-item">
              <img src="img/product/addidas1.jpg" class="small-img" alt="anh 2" onclick="changeImg('two')" id="two">
            </li>
            <li class="img-item">
              <img src="img/product/giayxanh.jpg" class="small-img" alt="anh 3" onclick="changeImg('three')" id="three">
            </li>
            <li class="img-item">
              <img src="img/product/giayxah2.jpg" class="small-img" alt="anh 4" onclick="changeImg('four')" id="four">
            </li>
          </ul>
        </div>
        <div id="main-img" style="cursor: pointer;">
          <img src="img/product/stansmith.jpg" class="big-img" alt="ảnh chính" id="img-main" xoriginal="img/product/stansmith.jpg">
        </div>
      </div>
      <div class="col-6">
        <div class="product__name">
          <h2>NIKE MERCURIAL SUPERFLY 8 ACADEMY TF – CV0953-107 - TRẮNG/BẠC SAFARI</h2>
        </div>
        <div class="product__price">
          <h2>2,150,000đ</h2>
        </div>
        <div class="product__size">
          <div class="select-swap">
            <button class="option-swap">38</button>
            <button class="option-swap">38</button>
            <button class="option-swap">38</button>
            <button class="option-swap">38</button>
            <button class="option-swap">38</button>
            <button class="option-swap">38</button>
            <button class="option-swap">38</button>
          </div>
        </div>
        <div class="product__wrap">
          <div class="product__amount">
            <label for="">Số lượng: </label>
            <input type="button" value="-" class="control">
            <input type="text" value="1" class="text-input"> 
            <input type="button" value="+" class="control">
          </div>
          <button class="add-cart">Thêm vào giỏ</button>
        </div>
        <div class="product__shopnow">
          <button class="shopnow">Mua ngay</button>
          <button class="likenow">Thêm vào danh sách thích</button>
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
        <h3 class="name__product">NIKE MERCURIAL SUPERFLY 8 ACADEMY TF</h3>
        <h3>Thông số kĩ thuật: </h3>
        <p>Phân khúc: Academy (tầm trung).</p>
        <p>Upper: Synthetic - Da tổng hợp cao cấp.</p>
        <p>Thiết kế đinh giày: Các đinh cao su hình chữ nhật, xếp chồng chéo với nhau. Theo đánh giá của nhiều người chơi thì những đinh TF hình chữ nhật lần này giúp đôi giày có thể trụ vững hơn trên sân.</p>
        <p>Độ ôm chân: Cao</p>
        <p>Bộ sưu tập: SAFARI PACK - Ra mắt tháng 4/2021</p>
        <p>PTrên chân các cầu thủ nổi tiếng như: Cristiano Ronaldo, Kylian Mbappé, Erling Haaland, Jadon Sancho, Leroy Sané, Romelu Lukaku...</p>  
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
      <div class="col-3">
        <div class="card" style="width: 100%">
          <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text price-color">1,000,000 đ</p>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card" style="width: 100%">
          <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text price-color">1,000,000 đ</p>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card" style="width: 100%">
          <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text price-color">1,000,000 đ</p>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card" style="width: 100%">
          <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text price-color">1,000,000 đ</p>
          </div>
        </div>
      </div>
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