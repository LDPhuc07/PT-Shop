@foreach($sanphamlienquans as $sanphamlienquan)
        <div class="col-3">
          <div class="card" style="width: 100%">
            @foreach($sanphamlienquan->anh as $anh)
              <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image cap">
            @endforeach
            <div class="card-body">
              <h5 class="card-title">{{$sanphamlienquan['ten_san_pham']}}</h5>
              <div class="product__price" id="price">
                <p class="card-text price-color product__price-new">{{number_format($sanphamlienquan['gia_ban']*(100-$sanphamlienquan['giam_gia'])/100,0,',','.').' '.'VNĐ'}}</p>
                <p  data-id="{{$sanphamlienquan['giam_gia']}}"  class="card-text price-color product__price-old">{{number_format($sanphamlienquan['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
              </div>
              <div style="display:flex;justify-content: space-between;align-items: center;">
                @if(Auth::check() and Auth::user()->admin != 1)
            <?php
              $is_liked = false;
            ?>
              @foreach($is_like as $like)
                @if($like->san_phams_id == $sanphamlienquan->id)
                  <?php
                  $is_liked = true;
                  ?>
                  @break
                @endif
              @endforeach
              @if($is_liked == true)
                <a onclick="dislike_splq({{ Auth::user()->id }},{{ $sanphamlienquan->id }})" class="icon-like" style="color: #000;font-size: 20px;"><i class="fas fa-heart"></i></a>
              @else
                <a onclick="like_splq({{ Auth::user()->id }},{{ $sanphamlienquan->id }})" class="icon-like" style="color: #000;font-size: 20px;"><i class="far fa-heart"></i></a>
              @endif
            @else
              <a href="{{ route('accounts.logout') }}" class="icon-like" style="color: #000;font-size: 20px;"><i class="far fa-heart"></i></a>
            @endif
              </div>
              <div class="sale-off" data-id="{{$sanphamlienquan['giam_gia']}}">
                <span class="sale-off-percent">{{$sanphamlienquan['giam_gia']}}%</span>
                <span class="sale-off-label">GIẢM</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach