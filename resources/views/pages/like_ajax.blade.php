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
              <div class="header__second__like">
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
                    <a onclick="dislike({{ Auth::user()->id }},{{ $sanphammoinhat->id }})" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                  @else
                    <a onclick="like({{ Auth::user()->id }},{{ $sanphammoinhat->id }})" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                  @endif
                @else
                  <a href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                @endif
              </div>
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
              <div class="header__second__like">
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
                    <a onclick="dislike({{ Auth::user()->id }},{{ $sanphamhot->id }})" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                  @else
                    <a onclick="like({{ Auth::user()->id }},{{ $sanphamhot->id }})" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                  @endif
                @else
                  <a href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                @endif
              </div>
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
              <div class="header__second__like">
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
                    <a onclick="dislike({{ Auth::user()->id }},{{ $sanpham->id }})" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                  @else
                    <a onclick="like({{ Auth::user()->id }},{{ $sanpham->id }})" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                  @endif
                @else
                  <a href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="far fa-heart"></i></a>
                @endif
              </div>
              <p class="card-text price-color">{{number_format($sanpham['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>