@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
@endsection
@section('content')
<div class="content" style="margin-top: 160px">
    <!-- slide show -->
    <div class="slideshow">
      <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          {{-- @foreach($slides as $slide) --}}
          @for($slide = 0; $slide < count($slides); $slide++)
          @if($slide == 0)
          <div class="carousel-item active">
            <img src="{{asset('img/slideshow/'. $slides[$slide]['link'])}}" alt="Los Angeles" width="1100" height="500">
            <div class="carousel-caption">
              <a href="" class="click-slideshow">Xem ngay <i class="fi-rs-arrow-right"></i></a>
            </div>   
          </div>
          @else
          <div class="carousel-item">
            <img src="{{asset('img/slideshow/'. $slides[$slide]['link'])}}" alt="Los Angeles" width="1100" height="500">
            <div class="carousel-caption">
              <a href="" class="click-slideshow">Xem ngay <i class="fi-rs-arrow-right"></i></a>
            </div>   
          </div>
          @endif
          @endfor
          {{-- @endforeach --}}
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
    <!-- end slide show -->
    <div class="product">
      <div class="container">
        <div class="product_popular">
          <h3 class="product__popular title-product">Sản phẩm phổ biến</h3>
          <div class="row">
            @foreach($sanphamphobiens as $sanphamphobien)
            <div class="col-6">
              <div class="card" style="width: 100%;">
                @foreach($sanphamphobien->anh as $anh)
                <img class="card-img-top" src="{{asset(getLink('product',$anh->link))}}" alt="Card image" style="width:100%">
                @endforeach
                <div class="card-body">
                  <h4 class="card-title">{{$sanphamphobien['ten_san_pham']}}</h4>
                  <p class="card-text custom__name-product" style="font-weight: 400;">{{$sanphamphobien['mo_ta']}}</p>
                  <a href="{{route('product_detail',['id'=>$sanphamphobien->id])}}" class="btn btn-buynow">Xem ngay <i class="fi-rs-arrow-right white-color"></i></a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="product__new">
          <h3 class="product__ne title-product">Sản phẩm mới</h3>
            <div class="row">
              @foreach($sanphammoinhats as $sanphammoinhat)
              <div class="col-3">
                <a href="{{route('product_detail',['id'=>$sanphammoinhat->id])}}" class="product__new-item">
                <div class="card" style="width: 100%">
                  @foreach($sanphammoinhat->anh as $anh)
                    <img class="card-img-top" src="{{asset(getLink('product',$anh->link))}}" alt="Card image cap">
                  @endforeach
                  <div class="card-body">
                    <h5 class="card-title">{{$sanphammoinhat['ten_san_pham']}}</h5>
                    <p class="card-text price-color">{{number_format($sanphammoinhat['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
                  </div>
                </div>
                </a>
              </div>
              @endforeach
            </div>
        </div>
        <div class="product__sale">
          <h3 class="product__sale title-product">Top sản phẩm hot</h3>
          <div class="row">
            @foreach($sanphamhots as $sanphamhot)
            <div class="col-3">
              <a href="{{route('product_detail',['id'=>$sanphamhot->id])}}" class="product__new-item">
                <div class="card" style="width: 100%">
                  @foreach($sanphamhot->anh as $anh)
                  <img class="card-img-top" src="{{asset(getlink('product',$anh->link))}}" alt="Card image cap">
                  @endforeach
                  <div class="card-body">
                    <h5 class="card-title custom__name-product">
                      {{$sanphamhot['ten_san_pham']}}
                    </h5>
                    {{-- <div class="product__price">
                      <p class="card-text price-color product__price-old">1,000,000 đ</p>
                      <p class="card-text price-color product__price-new">1,000,000 đ</p>
                    </div> --}}
                    <p class="card-text price-color">{{number_format($sanphamhot['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
                    <div class="sale-off">
                      <span class="sale-off-percent">{{$sanphamhot['giam_gia']}}%</span>
                      <span class="sale-off-label">GIẢM</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
        <div class="product__yml">
          <h3 class="product__yml title-product">Có thể bạn sẽ thích</h3>
          <div class="row">
            @foreach($sanphams as $sanpham)
            <div class="col-2">
              <a href="{{route('product_detail',['id'=>$sanpham->id])}}" class="product__new-item">
                <div class="card" style="width: 100%">
                  @foreach($sanpham->anh as $anh)
                    <img class="card-img-top" src="{{asset(getlink('product',$anh->link))}}" alt="Card image cap">
                  @endforeach
                  <div class="card-body">
                    <h5 class="card-title">{{$sanpham['ten_san_pham']}}</h5>
                    <p class="card-text price-color">{{number_format($sanpham['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="shoesnews">
    <div class="container">
      <h3 class="shoesnews__title">Tin tức</h3>
      <div class="row">
        <div class="col-4">
          <div class="card" style="width: 100%">
            <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                aaaa</h5>
              <p class="card-text custom__name-product" style="font-weight: 400;">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card" style="width: 100%">
            <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                aaaa</h5>
              <p class="card-text custom__name-product" style="font-weight: 400;">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card" style="width: 100%">
            <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                aaaa</h5>
              <p class="card-text custom__name-product" style="font-weight: 400;">Some example text some example text. John Doe is an architect and engineer</p>
            </div>
          </div>
        </div>  
      </div>
      <div class="shoesnews__all">
        <a class="shoesnews__all-tittle">Xem tất cả</a> <i class="fi-rs-angle-right"></i>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="js/main.js"></script>
@endsection