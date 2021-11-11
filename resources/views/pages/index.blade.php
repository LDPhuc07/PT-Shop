@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<style>
  .den {
    color: #000 !important;
  }
  .custom-text-price {
    display: block;
    height: 55px;
  }
  /* Mobile & tablet  */
  @media (max-width: 1023px) {
    
  }

  /* tablet */
  @media (min-width: 740px) and (max-width: 1023px) {

  }

  /* mobile */
  @media (max-width: 739px) {
    .custom-text-price {
      display: flex;
      height: unset;
    }
  }
</style>
@endsection
@section('content')
<div class="container">
    <!-- slide show -->
    <div class="row">
      <section class="awe-section-1">
        <div class="mt-4 top-sliders col-md-12">
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
                    <a href="{{route('products',['idlsp' =>'2','idmtt' => '0'])}}" class="click-slideshow">Xem ngay </a>
                  </div>   
                </div>
                @else
                <div class="carousel-item">
                  <img src="{{asset('img/slideshow/'. $slides[$slide]['link'])}}" alt="Los Angeles" width="1100" height="500">
                  <div class="carousel-caption">
                    <a href="{{route('products',['idlsp' =>'1','idmtt' => '0'])}}" class="click-slideshow">Xem ngay </a>
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
        </div>
      </section>
    </div>
    <!-- end slide show -->
    <div id="product" class="product">
      <div class="container">
        <div class="product_popular">
          <h3 class="product__popular title-product">Sản phẩm phổ biến</h3>
          <div class="row">
            @foreach($sanphamphobiens as $sanphamphobien)
            <div class="col-lg-6 col-sm-12 mb-20">
              <div class="card" style="width: 100%;">
                @foreach($sanphamphobien->anh as $anh)
                <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image" style="width:100%">
                @endforeach
                <div class="card-body">
                  <h4 class="card-title">{{$sanphamphobien['ten_san_pham']}}</h4>
                  
                  <span class="card-text custom__name-product" style="font-weight: 400;">
                    <?php
                      echo $sanphamphobien->mo_ta;
                    ?>
                  </span>
                  
                  <div style="display:flex;justify-content: space-between;
                    align-items: center;">
                      <a href="{{route('product_detail',['id'=>$sanphamphobien->id])}}" class="btn btn-buynow">Xem ngay <i class="fas fa-arrow-right" style="font-size: 16px;margin-left: 5px;"></i></a>
                      <div>
                        <span id="luot-like-{{ $sanphamphobien->id }}" class="luot-like-{{ $sanphamphobien->id }}" style="margin-right: 12px;font-size: 22px">
                          @foreach($yeu_thich as $like)
                            @if($sanphamphobien->id == $like->san_phams_id)
                              {{ $like->yeu_thich }}
                            @endif
                          @endforeach
                        </span>
                          @if(Auth::check() and Auth::user()->admin != 1)
                        <?php
                          $is_liked = false;
                        ?>
                          @foreach($is_like as $like)
                            @if($like->san_phams_id == $sanphamphobien->id)
                              <?php
                              $is_liked = true;
                              ?>
                              @break
                            @endif
                          @endforeach
                          @if($is_liked == true)
                            <a onclick="doimau({{ Auth::user()->id }},{{ $sanphamphobien->id }})" class="den icon-like like-{{ $sanphamphobien->id }}" style="color: #ccc;
                        font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                          @else
                            <a onclick="doimau({{ Auth::user()->id }},{{ $sanphamphobien->id }})" class="icon-like like-{{ $sanphamphobien->id }}" style="color: #ccc;
                        font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                          @endif
                        @else
                          <a class="icon-like" style="color: #ccc;
                        font-size: 22px;" data-toggle="modal" data-target="#myModal" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                        @endif 
                      </div>
                    </div>
                  
                  <div class="sale-off" data-id="{{$sanphamphobien['giam_gia']}}">
                    <span class="sale-off-percent">{{$sanphamphobien['giam_gia']}}%</span>
                    <span class="sale-off-label">GIẢM</span>
                  </div>
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
              <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                <a href="{{route('product_detail',['id'=>$sanphammoinhat->id])}}" class="product__new-item">
                <div class="card" style="width: 100%">
                  {{-- @foreach($sanphammoinhat->anh as $anh) --}}
                  {{-- @php dd($sanphammoinhat->getImage() ?? ) @endphp --}}
                    <img class="card-img-top" src="{{ asset($sanphammoinhat->getImage() ?? '/img/product/no-image.png' )}}" alt="Card image cap">
                    {{-- <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image cap"> --}}
                  {{-- @endforeach --}}
                  <div class="card-body">
                    <h5 class="card-title custom__name-product">{{$sanphammoinhat['ten_san_pham']}}</h5>
                    <div class="product__price" id="price">
                      <p class="card-text price-color product__price-new">{{number_format($sanphammoinhat['gia_ban']*(100-$sanphammoinhat['giam_gia'])/100,0,',','.').' '.'VNĐ'}}</p>
                      <p  data-id="{{$sanphammoinhat['giam_gia']}}"  class="card-text price-color product__price-old">{{number_format($sanphammoinhat['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
                    </div>
                    <div style="display:flex;justify-content: flex-end;
                    align-items: center;">
                    <span id="luot-like-{{ $sanphammoinhat->id }}" class="luot-like-{{ $sanphammoinhat->id }}" style="margin-right: 12px;font-size:22px">
                    @foreach($yeu_thich as $like)
                      @if($sanphammoinhat->id == $like->san_phams_id)
                        {{ $like->yeu_thich }}
                      @endif
                    @endforeach
                  </span>
                    @if(Auth::check() and Auth::user()->admin != 1)
                    <?php
                      $is_liked = false;
                    ?>
                      @foreach($is_like as $like)
                        @if($like->san_phams_id == $sanphammoinhat->id)
                          <?php
                          $is_liked = true;
                          ?>
                          @break
                        @endif
                      @endforeach
                      @if($is_liked == true)
                        <a onclick="doimau({{ Auth::user()->id }},{{ $sanphammoinhat->id }})" class="den icon-like like-{{ $sanphammoinhat->id }}" style="color: #ccc;
                    font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                      @else
                        <a onclick="doimau({{ Auth::user()->id }},{{ $sanphammoinhat->id }})" class="icon-like like-{{ $sanphammoinhat->id }}" style="color: #ccc;
                    font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                      @endif
                    @else
                      <a class="icon-like" style="color: #ccc;
                    font-size: 22px;" data-toggle="modal" data-target="#myModal" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                    @endif 
                    </div>
                    <div class="sale-off" data-id="{{$sanphammoinhat['giam_gia']}}">
                      <span class="sale-off-percent">{{$sanphammoinhat['giam_gia']}}%</span>
                      <span class="sale-off-label">GIẢM</span>
                    </div>
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
            <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
              <a href="{{route('product_detail',['id'=>$sanphamhot->id])}}" class="product__new-item">
                <div class="card" style="width: 100%">
                  {{-- @foreach($sanphamhot->anh as $anh) --}}
                  <img class="card-img-top" src="{{ asset($sanphamhot->getImage() ?? '/img/product/no-image.png' )}}" alt="Card image cap">
                  {{-- @endforeach --}}
                  <div class="card-body">
                    <h5 class="card-title custom__name-product">
                      {{$sanphamhot['ten_san_pham']}}
                    </h5>
                    <div class="product__price" id="price">
                      <p class="card-text price-color product__price-new">{{number_format($sanphamhot['gia_ban']*(100-$sanphamhot['giam_gia'])/100,0,',','.').' '.'VNĐ'}}</p>
                      <p  data-id="{{$sanphamhot['giam_gia']}}"  class="card-text price-color product__price-old">{{number_format($sanphamhot['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
                    </div>
                    <div style="display:flex;justify-content: flex-end;
                    align-items: center;">
                    <span id="luot-like-{{ $sanphamhot->id }}" class="luot-like-{{ $sanphamhot->id }}" style="margin-right: 12px;font-size:22px">
                      @foreach($yeu_thich as $like)
                        @if($sanphamhot->id == $like->san_phams_id)
                          {{ $like->yeu_thich }}
                        @endif
                      @endforeach
                    </span>
                    @if(Auth::check() and Auth::user()->admin != 1)
                    <?php
                      $is_liked = false;
                    ?>
                      @foreach($is_like as $like)
                        @if($like->san_phams_id == $sanphamhot->id)
                          <?php
                          $is_liked = true;
                          ?>
                          @break
                        @endif
                      @endforeach
                      @if($is_liked == true)
                        <a onclick="doimau({{ Auth::user()->id }},{{ $sanphamhot->id }})" class="den icon-like like-{{ $sanphamhot->id }}" style="color: #ccc;
                    font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                      @else
                        <a onclick="doimau({{ Auth::user()->id }},{{ $sanphamhot->id }})" class="icon-like like-{{ $sanphamhot->id }}" style="color: #ccc;
                    font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                      @endif
                    @else
                    <a class="icon-like" style="color: #ccc;
                    font-size: 22px;" data-toggle="modal" data-target="#myModal" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                    @endif 
                    </div>
                    <div class="sale-off" data-id="{{$sanphamhot['giam_gia']}}">
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
            <div class="col-lg-2 col-md-4 col-sm-12 mb-20">
              <a href="{{route('product_detail',['id'=>$sanpham->id])}}" class="product__new-item">
                <div class="card" style="width: 100%">
                  {{-- @foreach($sanpham->anh as $anh) --}}
                    <img class="card-img-top" src="{{ asset($sanpham->getImage() ?? '/img/product/no-image.png' )}}" alt="Card image cap">
                  {{-- @endforeach --}}
                  <div class="card-body">
                    <h5 class="card-title custom__name-product" style="font-size:14px">{{$sanpham['ten_san_pham']}}</h5>
                    <div class="product__price custom-text-price" id="price">
                      <p class="card-text price-color product__price-new">{{number_format($sanpham['gia_ban']*(100-$sanpham['giam_gia'])/100,0,',','.').' '.'VNĐ'}}</p>
                      <p  data-id="{{$sanpham['giam_gia']}}"  class="card-text price-color product__price-old">{{number_format($sanpham['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
                    </div>
                    <div style="display:flex;justify-content: flex-end;
                    align-items: center;">
                    <span id="luot-like-{{ $sanpham->id }}" class="luot-like-{{ $sanpham->id }}" style="margin-right: 10px;font-size:18px">
                    @foreach($yeu_thich as $like)
                      @if($sanpham->id == $like->san_phams_id)
                        {{ $like->yeu_thich }}
                      @endif
                    @endforeach
                  </span>
                    @if(Auth::check() and Auth::user()->admin != 1)
                    <?php
                      $is_liked = false;
                    ?>
                      @foreach($is_like as $like)
                        @if($like->san_phams_id == $sanpham->id)
                          <?php
                          $is_liked = true;
                          ?>
                          @break
                        @endif
                      @endforeach
                      @if($is_liked == true)
                        <a onclick="doimau({{ Auth::user()->id }},{{ $sanpham->id }})" class="den icon-like like-{{ $sanpham->id }}" style="color: #ccc;
                    font-size: 18px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                      @else
                        <a onclick="doimau({{ Auth::user()->id }},{{ $sanpham->id }})" class="icon-like like-{{ $sanpham->id }}" style="color: #ccc;
                    font-size: 18px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                      @endif
                    @else
                    <a class="icon-like" style="color: #ccc;
                    font-size: 18px;" data-toggle="modal" data-target="#myModal" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                    @endif
                    </div>
                    <div class="sale-off" data-id="{{$sanpham['giam_gia']}}">
                      <span class="sale-off-percent">{{$sanpham['giam_gia']}}%</span>
                      <span class="sale-off-label">GIẢM</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="shoesnews">
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
    </div> --}}
  </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thông báo</h4>
        <button style="color:red;font-size: 23px;" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php
                    if(!(Auth::check() && Auth::user()->admin != 1))
                    {
                        Session::put('url previous',url()->current());
                    }
                  ?>
      <!-- Modal body -->
      <div class="modal-body">
        Bạn cần phải đăng nhập để đưa sản phẩm vào danh sách thích!
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary red" data-dismiss="modal">Đóng</a>
        <a href="{{ route('accounts.logout') }}" type="button" class="btn btn-info">Đăng nhập</a>
      </div>
      
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
      var divGiamGia = $('.card-body').children('.sale-off');
      $.each(divGiamGia, function(i,v){
        console.log($(v).attr('data-id'));
        if(!Number($(v).attr('data-id')))
        {
          $(v).css('display','none');
        }
      });
    });
</script>
<script>
  function like(tk_id, sp_id){
    console.log(sp_id);
    console.log(tk_id);
    $.ajax({
      url: 'like/'+sp_id+"/"+tk_id,
      type: 'GET',
    }).done(function(response) {
      $("#product").empty();
      $("#product").html(response);
    });
  }

  function dislike(tk_id, sp_id){
    console.log(sp_id);
    console.log(tk_id);
    $.ajax({
      url: 'dislike/'+id+"/"+tk_id,
      type: 'GET',
    }).done(function(response) {
      $("#product").empty();
      $("#product").html(response);
    });
  }
  function doimau(tk_id, sp_id) {
    if($(`.like-${sp_id}`).hasClass('den')) {
      $.ajax({
        url: 'dislike/'+sp_id+"/"+tk_id,
        method: "GET"
      }).done(function(response) {
        $(`.like-${sp_id}`).removeClass('den');
        var like = parseInt($(`#luot-like-${sp_id}`).text());
        like--;
        var like_header = parseInt($(`#header__second__like--notice`).text());
        like_header--;
        $(`#header__second__like--notice`).html(like_header.toString());

        var like_header1 = parseInt($(`#header__second__like--notice1`).text());
        like_header1--;
        $(`#header__second__like--notice1`).html(like_header1.toString());
        if(like == 0)
        {
          $(`.luot-like-${sp_id}`).html("");
        }
        else
        {
          $(`.luot-like-${sp_id}`).html(like.toString());
        }
        
      });
    }
    else {
      $.ajax({
        url: 'like/'+sp_id+"/"+tk_id,
        method: "GET"
      }).done(function(response) {
        $(`.like-${sp_id}`).addClass('den');
        if(isNaN(parseInt($(`#luot-like-${sp_id}`).text()))) {
          var like = 0;
        }
        else {
          var like = parseInt($(`#luot-like-${sp_id}`).text());
        }
        like++;
        var like_header = parseInt($(`#header__second__like--notice`).text());
        like_header++;
        $(`#header__second__like--notice`).html(like_header.toString());
        
        var like_header1 = parseInt($(`#header__second__like--notice1`).text());
        like_header1++;
        $(`#header__second__like--notice1`).html(like_header1.toString());
        $(`.luot-like-${sp_id}`).html(like.toString());
      });
    }
  }
</script>
<script>
  $(document).ready(function() {
    var divGiamGia = $('.card-body').children('.sale-off');
    console.log(divGiamGia);
    $.each(divGiamGia, function(i,v){
      if(!Number($(v).attr('data-id')))
      {
        $(v).css('display','none');
      }
    });
  });
</script>
<script>
$(document).ready(function() {
    var pGiamGia = $('.product__price').children('.product__price-old');
    console.log(pGiamGia);
    $.each(pGiamGia, function(i,v){
      if(!Number($(v).attr('data-id')))
      {
        $(v).css('display','none');
      }
    });
  });
</script>
@endsection