@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/product.css">
@endsection
@section('content')

<div class="product" style="margin-top: 195px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
              <div class="sort-wrap">
                <div class="sort-left">
                  <h4 class="coll-name" style="font-size: 20px">Kết quả tìm kiếm cho: "{{Request::get('search')}}"</h4>
                </div>
              </div>
              <div class="row" id="tatcasanpham">
                @foreach($dsSanPhamSearch as $i)
                <div class="col-3" style="margin-top:20px">
                  <a href="{{route('product_detail',['id'=>$i->id])}}" class="product__new-item">
                  <div class="card" style="width: 100%">
                    @foreach($i->anh as $anh)
                      <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image cap">
                    @endforeach
                    <div class="card-body">
                      <h5 class="card-title">{{$i['ten_san_pham']}}</h5>
                      <div class="product__price" id="price">
                        <p class="card-text price-color product__price-new">{{number_format($i['gia_ban']*(100-$i['giam_gia'])/100,0,',','.').' '.'VNĐ'}}</p>
                        <p  data-id="{{$i['giam_gia']}}"  class="card-text price-color product__price-old">{{number_format($i['gia_ban'],0,',','.').' '.'VNĐ'}}</p>
                      </div>
                      <div style="display:flex;justify-content: flex-end;
                      align-items: center;">
                      <span id="luot-like-{{ $i->id }}" class="luot-like-{{ $i->id }}" style="margin-right: 12px;font-size:25px">
                      @foreach($yeu_thich as $like)
                        @if($i->id == $like->san_phams_id)
                          {{ $like->yeu_thich }}
                        @endif
                      @endforeach
                    </span>
                      @if(Auth::check() and Auth::user()->admin != 1)
                      <?php
                        $is_liked = false;
                      ?>
                        @foreach($is_like as $like)
                          @if($like->san_phams_id == $i->id)
                            <?php
                            $is_liked = true;
                            ?>
                            @break
                          @endif
                        @endforeach
                        @if($is_liked == true)
                          <a onclick="doimau({{ Auth::user()->id }},{{ $i->id }})" class="den icon-like like-{{ $i->id }}" style="color: #ccc;
                      font-size: 25px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                        @else
                          <a onclick="doimau({{ Auth::user()->id }},{{ $i->id }})" class="icon-like like-{{ $i->id }}" style="color: #ccc;
                      font-size: 25px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                        @endif
                      @else
                        <a class="icon-like" style="color: #ccc;
                      font-size: 25px;" href="{{ route('accounts.logout') }}" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
                      @endif 
                      </div>
                      <div class="sale-off" data-id="{{$i['giam_gia']}}">
                        <span class="sale-off-percent">{{$i['giam_gia']}}%</span>
                        <span class="sale-off-label">GIẢM</span>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
                @endforeach
              </div>
                {{-- <div class="loadmore">
                  <a style="cursor: pointer;" class="loadmore-btn">Tải thêm</a>
                </div> --}}
                <nav aria-label="Page navigation example" style="display:flex;justify-content: center;font-size: 20px;">
                  <ul class="pagination">
                    {!! $dsSanPhamSearch->appends(request()->query())->links() !!}
                  </ul>
                </nav>
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
      if(!Number($(v).attr('data-id')) || ($(v).attr('data-id') === 'null'))
      {
        $(v).css('display','none');
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
      var pGiamGia = $('.product__price').children('.product__price-old');
      $.each(pGiamGia, function(i,v){
        if(!Number($(v).attr('data-id')))
        {
          $(v).css('display','none');
        }
      });
    });
  </script>
@endsection