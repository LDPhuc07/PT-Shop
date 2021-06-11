<div class="container">
  <div class="product_popular">
    <h3 class="product__popular title-product">Sản phẩm phổ biến</h3>
    <div class="row">
      @foreach($sanphamphobiens as $sanphamphobien)
      <div class="col-6">
        <div class="card" style="width: 100%;">
          @foreach($sanphamphobien->anh as $anh)
          <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image" style="width:100%">
          @endforeach
          <div class="card-body">
            <h4 class="card-title">{{$sanphamphobien['ten_san_pham']}}</h4>
            <p class="card-text custom__name-product" style="font-weight: 400;">{{$sanphamphobien['mo_ta']}}</p>
            <div style="display:flex;justify-content: space-between;
              align-items: center;">
                <a href="{{route('product_detail',['id'=>$sanphamphobien->id])}}" class="btn btn-buynow">Xem ngay <i class="fi-rs-arrow-right white-color"></i></a>
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
                    <a class="icon-like" style="color: #000;
                font-size: 30px;" onclick="dislike({{ Auth::user()->id }},{{ $sanphamphobien->id }})" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                  @else
                    <a class="icon-like" style="color: #000;
                font-size: 30px;" onclick="like({{ Auth::user()->id }},{{ $sanphamphobien->id }})" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                  @endif
                @else
                  <a class="icon-like" style="color: #000;
                font-size: 30px;" href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                @endif
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
        <div class="col-3">
          <a href="{{route('product_detail',['id'=>$sanphammoinhat->id])}}" class="product__new-item">
          <div class="card" style="width: 100%">
            @foreach($sanphammoinhat->anh as $anh)
              <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image cap">
            @endforeach
            <div class="card-body">
              <h5 class="card-title">{{$sanphammoinhat['ten_san_pham']}}</h5>
              <div class="product__price" id="price">
                <p class="card-text price-color product__price-new">{{number_format($sanphammoinhat['gia_ban']*(100-$sanphammoinhat['giam_gia'])/100,0,',','.').' '.'VNĐ'}}</p>
                <p  data-id="{{$sanphammoinhat['giam_gia']}}"  class="card-text price-color product__price-old">{{number_format($sanphammoinhat['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
              </div>
              <div style="display:flex;justify-content: space-between;
              align-items: center;">
                
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
                    <a class="icon-like" style="color: #000;
                font-size: 30px;" onclick="dislike({{ Auth::user()->id }},{{ $sanphammoinhat->id }})" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                  @else
                    <a class="icon-like" style="color: #000;
                font-size: 30px;" onclick="like({{ Auth::user()->id }},{{ $sanphammoinhat->id }})" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                  @endif
                @else
                  <a class="icon-like" style="color: #000;
                font-size: 30px;" href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="far fa-heart"></i></a>
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
      <div class="col-3">
        <a href="{{route('product_detail',['id'=>$sanphamhot->id])}}" class="product__new-item">
          <div class="card" style="width: 100%">
            @foreach($sanphamhot->anh as $anh)
            <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image cap">
            @endforeach
            <div class="card-body">
              <h5 class="card-title custom__name-product">
                {{$sanphamhot['ten_san_pham']}}
              </h5>
              <div class="product__price" id="price">
                <p class="card-text price-color product__price-new">{{number_format($sanphamhot['gia_ban']*(100-$sanphamhot['giam_gia'])/100,0,',','.').' '.'VNĐ'}}</p>
                <p  data-id="{{$sanphamhot['giam_gia']}}"  class="card-text price-color product__price-old">{{number_format($sanphamhot['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
              </div>
              <div style="display:flex;justify-content: space-between;
              align-items: center;">
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
                    <a class="icon-like" style="color: #000;
                font-size: 30px;" onclick="dislike({{ Auth::user()->id }},{{ $sanphamhot->id }})" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                  @else
                    <a class="icon-like" style="color: #000;
                font-size: 30px;" onclick="like({{ Auth::user()->id }},{{ $sanphamhot->id }})" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                  @endif
                @else
                  <a class="icon-like" style="color: #000;
                font-size: 30px;" href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="far fa-heart"></i></a>
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
      <div class="col-2">
        <a href="{{route('product_detail',['id'=>$sanpham->id])}}" class="product__new-item">
          <div class="card" style="width: 100%">
            @foreach($sanpham->anh as $anh)
              <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image cap">
            @endforeach
            <div class="card-body">
              <h5 class="card-title">{{$sanpham['ten_san_pham']}}</h5>
              <div class="product__price" id="price">
                <p style="font-size: 9px" class="card-text price-color product__price-new">{{number_format($sanpham['gia_ban']*(100-$sanpham['giam_gia'])/100,0,',','.').' '.'VNĐ'}}</p>
                <p  style="font-size: 9px" data-id="{{$sanpham['giam_gia']}}"  class="card-text price-color product__price-old">{{number_format($sanpham['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
              </div>
              <div style="display:flex;justify-content: space-between;
              align-items: center;">
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
                    <a class="icon-like" style="color: #000;
                font-size: 30px;" onclick="dislike({{ Auth::user()->id }},{{ $sanpham->id }})" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                  @else
                    <a class="icon-like" style="color: #000;
                font-size: 30px;" onclick="like({{ Auth::user()->id }},{{ $sanpham->id }})" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                  @endif
                @else
                  <a class="icon-like" style="color: #000;
                font-size: 30px;" href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="far fa-heart"></i></a>
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