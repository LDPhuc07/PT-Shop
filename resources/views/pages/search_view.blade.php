@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/product.css">
@endsection
@section('content')
<style>
  .den {
    color: #000 !important;
  }
</style>
<div class="product">
    <div class="container">
        <div class="row">
            <div class="col-12">
              <div class="sort-wrap">
                <div class="sort-left">
                  <input type="hidden" value="{{Request::get('search')}}" id="keysearch">
                  <h4 class="coll-name" style="font-size: 20px">Kết quả tìm kiếm cho: "{{Request::get('search')}}"</h4>
                </div>
              </div>
              <div class="row" id="tatcasanpham">
                @foreach($dsSanPhamSearch as $i)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-20">
                  <a href="{{route('product_detail',['id'=>$i->id])}}" class="product__new-item">
                  <div class="card" style="width: 100%;margin-bottom: 20px;">
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
                      font-size: 25px;" data-toggle="modal" data-target="#myModal" class="header__second__like--icon"><i class="fas fa-heart"></i></a>
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
                <div class="loadmore">
                  <a style="cursor: pointer;" class="loadmore-btn">Tải thêm</a>
                </div>
                {{-- <nav aria-label="Page navigation example" style="display:flex;justify-content: center;font-size: 20px;">
                  <ul class="pagination">
                    {!! $dsSanPhamSearch->appends(request()->query())->links() !!}
                  </ul>
                </nav> --}}
            </div>
        </div>
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
      
      <!-- Modal body -->
      <div class="modal-body">
        Bạn cần phải đăng nhập để đưa sản phẩm vào danh sách thích!
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="{{ route('accounts.sign-up') }}" type="button" class="btn btn-secondary ">Đăng ký</a>
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
  <script>
    var key_search = $('#keysearch').val();
    var page = 0;
    var loadMoreBtn = $('.loadmore-btn');
    var prevText = loadMoreBtn.text();
    $('.loadmore-btn').click(function(){
      
      page++;
      timkiemSanPham(page);
    });
    function timkiemSanPham(page)
    {
      loadMoreBtn.text('ĐANG TẢI...');
      $.ajax({
        type: 'get',
        url:'/api/timkiem',
        data:{
          'key_search': key_search,
          'page' : page
        },
        success: function(products)
        {
          
          loadMoreBtn.text(prevText);
          if(products.length == 0)
          {
            loadMoreBtn.fadeOut();
          }
          appendSanPham(products);
        }
      });
    }
    function appendSanPham(products)
    {
      let html ='';
    
      $.each(products,function(index, product){
      html+='<div class="col-lg-3 col-md-6 col-sm-12 mb-20" style="margin-bottom: 20px">';
      html+='<a href="/product-details/'+product.id+'" class="product__new-item">';
          html+='<div class="card" style="width: 100%;">';
            html+='<img class="card-img-top" src="'+product.anh[0].link+'" alt="Card image cap">';
            html+='<div class="card-body">';
              html+='<h5 class="card-title custom__name-product title-news">'+product.ten_san_pham+'</h5>';
              html+='<div class="product__price" id="price">';
                html+='<p class="card-text price-color product__price-new">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban*(100-product.giam_gia)/100))+' VNĐ</p>';
                html+='<p data-id="'+product.giam_gia+'" class="card-text price-color product__price-old">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
                html+='</div>';
              html+='<div style="display:flex;justify-content: space-between;';
              html+='align-items: center;">';
              html+='<div>'
                html+='<span id="luot-like-'+product.id+'" class="luot-like-'+product.id+'" style="margin-right: 12px;font-size: 25px">'
                  @foreach($yeu_thich as $like)
                    if(product.id == {{ $like->san_phams_id }}) {
                      html+='{{ $like->yeu_thich }}'
                    }
                  @endforeach
                html+='</span>'
              @if(Auth::check() and Auth::user()->admin != 1)
                var is_liked = 0;
                @foreach($is_like as $like)
                  if({{ $like->san_phams_id }} == product.id) {
                    is_liked = 1;
                  }
                @endforeach
                if(is_liked == 1) {
                  html+='<a onclick="doimau({{ Auth::user()->id }},'+product.id+')" class="den icon-like  like-'+product.id+'" style="color: #ccc;'
                  html+='font-size: 25px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
                } else {
                  html+='<a onclick="doimau({{ Auth::user()->id }},'+product.id+')" class="icon-like  like-'+product.id+'" style="color: #ccc;'
                  html+='font-size: 25px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
                }
              @else
                  <?php
                    if(!Auth::check())
                    {
                        Session::put('url previous',url()->current());
                    }
                  ?>
                html+='<a class="icon-like" style="color: #ccc;'
                html+='font-size: 25px;" data-toggle="modal" data-target="#myModal" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
              @endif
              html+='</div>'
              html+='  </div>';
              html+='<div class="sale-off" data-id="'+product.giam_gia+'">';
                html+='<span class="sale-off-percent" style="margin-right:7px">'+product.giam_gia+'%</span>';
                html+='<span class="sale-off-label">GIẢM</span>';
              html+='</div>';
              html+='</div>';
              html+='</div>';
              html+='</a>';
              html+='</div>';
              
              
      });
      $('#tatcasanpham').append(html);
      $(document).ready(function() {
      var divGiamGia = $('.card-body').children('.sale-off');
      $.each(divGiamGia, function(i,v){
        if(!Number($(v).attr('data-id')) )
        {
          $(v).css('display','none');
        }
      });
    });
    $(document).ready(function() {
      var pGiamGia = $('.product__price').children('.product__price-old');
      $.each(pGiamGia, function(i,v){
        if(!Number($(v).attr('data-id')))
        {
          $(v).css('display','none');
        }
      });
    });
    }
  </script>
  <script>
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
@endsection