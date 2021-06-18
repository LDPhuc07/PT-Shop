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
          <input type="hidden" data-id="{{$sanpham->id}}" id="trungid">
          <ul class="all-img">
              @foreach($sanpham->anh as $anh)
                <li class="img-item">
                  <img src="{{asset($anh->link)}}" class="small-img" alt="anh 1" onclick="changeImg('{{$anh->id}}')" id="{{$anh->id}}">
                  <div class="sale-off" style="top:14px;right:14px" data-id="{{$sanpham['giam_gia']}}">
                    <span class="sale-off-percent">{{$sanpham['giam_gia']}}%</span>
                    <span class="sale-off-label">GIẢM</span>
                  </div>
                </li>
              @endforeach
          </ul>
        </div>
        <div id="main-img" style="cursor: pointer;">
          @foreach($anhchinh->anh as $anh)
            <img src="{{asset($anh->link)}}" class="big-img" alt="ảnh chính" id="img-main" xoriginal="{{asset($anh->link)}}">
          @endforeach
        </div>
      </div>
      <div class="col-6">
        <form action="{{ route('cart.save') }}" method="POST">
        @csrf
        <div class="product__name">
          <h2>{{$sanpham->ten_san_pham}}</h2>
          <div id="header__second__like" class="header__second__like">
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
          <input type="hidden" name="id" value="{{ $sanpham->id }}">
        </div>
        <div class="product__price">
          <h2>{{number_format($sanpham['gia_ban'],0,',','.').' '.'VNĐ'}}</h2>
        </div>
        <div class="product__color">
          <div class="select-swap">
            @foreach($color as $i)
             @if($i->mau == $first_color->mau)
              @if($i->mau == 'xanh duong')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-1" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'tim')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-3" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'cam')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-2" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'vang')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-4" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'trang')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-5" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'den')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-6" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'xanh la')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-7" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'xam')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-8" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'do')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-9" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
              @if($i->mau == 'nau')
              <div class="circlecheck">
                <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-10" name="mau" value="{{$i['mau']}}" checked>
                <label for="option-{{$i['mau']}}"></label>
                
                <div class="outer-circle"></div>
              </div>
              @endif
             @else
             @if($i->mau == 'xanh duong')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-1" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'tim')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-3" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'cam')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-2" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'vang')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-4" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'trang')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-5" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'den')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-6" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'xanh la')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-7" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'xam')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-8" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'do')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-9" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @if($i->mau == 'nau')
             <div class="circlecheck">
               <input type="radio" id="option-{{$i['mau']}}" onclick="myColor(`{{$i['mau']}}`,{{ $sanpham->id }})" class="circle-10" name="mau" value="{{$i['mau']}}">
               <label for="option-{{$i['mau']}}"></label>
               
               <div class="outer-circle"></div>
             </div>
             @endif
             @endif
            @endforeach
          </div>
        </div>
        <div id="product__size" class="product__size">
          <div class="select-swap">
            @foreach($size_by_first_color as $i)
            
              <div class="swatch-element">
                <input type="radio" class="variant-1" id="swatch-{{$i['kich_thuoc']}}" name="kich_thuoc" value="{{$i['kich_thuoc']}}" checked>
                <label for="swatch-{{$i['kich_thuoc']}}" class="sd"><span>{{$i->kich_thuoc}}</span></label>
              </div> 
            @endforeach
          </div>
        </div>
        <div class="product__wrap">
          <div id="product__amount" class="product__amount">
            <label for="">Số lượng: </label>
            <input type="button" value="-" class="control" onclick="truSoLuong()">
            <input type="text" name="so_luong"  value="1" class="text-input" onkeypress='validate(event)' name="quantity" id="textsoluong"> 
            <input type="button" value="+" class="control" onclick="congSoLuong(5)">
          </div>
          <button class="likenow">Thêm vào danh sách thích</button>
          
        </div>
        <div class="product__shopnow">
          <button type="submit" class="shopnow">Mua ngay</button>
          <button type="submit" class="add-cart">Thêm vào giỏ</button>
        </div>
        <div>
        </form>
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
<div class="product__comment">
  <div class="container">
    <h2 class="product__describe-heading">Bình luận</h2>
    <div class="row">
      <div class="col-4">
        <textarea name="binhluan" id="cmt" cols="70" rows="10"></textarea>
        @if(Auth::check() and Auth::user()->admin != 1)
        <a onclick="postBinhLuan()" class="btn btn-comment">Gửi</a>
        @else
        <a href="{{ route('accounts.logout')}}" class="btn btn-comment">Gửi</a>
        @endif
      </div>
      <div class="col-8">
        <div class="body__comment" id="comment">
          
        </div>
        <p style="font-size:16px;cursor: pointer;" id="commentLoard">Xem thêm bình luận</p>
      </div>
    </div>
  </div>
</div>
<!-- end product detail -->
<!-- product relate to -->
<div class="product__relateto">
  <div class="container">
    <h3 class="product__relateto-heading">Sản phẩm liên quan</h3>
    <div id="like_splq" class="row">
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
      <script>
        function congSoLuong(sl) {
          if(document.getElementById('textsoluong').value < sl) {
            var result = document.getElementById('textsoluong').value;
            document.getElementById('textsoluong').value = parseInt(result) + 1;
          }
        }
        function truSoLuong(){
          var result = document.getElementById('textsoluong').value;
          if(parseInt(result)>1){
            document.getElementById('textsoluong').value = parseInt(result) - 1;
          }
          
        }
  </script>
  <script>
    function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
  </script>
   <script>
    function myColor(mau, id) {
      console.log(mau);
      console.log(id);
      $.ajax({
        type: 'GET',
        url: "product-details/get-size/"+id+"/"+mau,
      }).done(function(response) {
        $("#product__size").empty();
        $("#product__size").html(response);
      }); 
    }

    function myKichThuoc(mau, id, kichthuoc) {
      $.ajax({
        type: 'GET',
        url: "product-details/get-qty/"+id+"/" +mau+"/"+kichthuoc,
      }).done(function(response) {
        $("#product__amount").empty();
        $("#product__amount").html(response);
      }); 
    }

    
  </script>
  <script>
    function like(tk_id, sp_id){
      console.log(sp_id);
      console.log(tk_id);
      $.ajax({
        url: 'like-product-detail/'+sp_id+"/"+tk_id,
        type: 'GET',
      }).done(function(response) {
        $("#header__second__like").empty();
        $("#header__second__like").html(response);
      });
    }
    function dislike(tk_id, sp_id){
      console.log(sp_id);
      console.log(tk_id);
      $.ajax({
        url: 'dislike-product-detail/'+sp_id+"/"+tk_id,
        type: 'GET',
      }).done(function(response) {
        $("#header__second__like").empty();
        $("#header__second__like").html(response);
      });
    }
    function like_splq(tk_id, sp_id){
      console.log(sp_id);
      console.log(tk_id);
      $.ajax({
        url: 'like-product-detail-splq/'+sp_id+"/"+tk_id,
        type: 'GET',
      }).done(function(response) {
        $("#like_splq").empty();
        $("#like_splq").html(response);
      });
    }
    function dislike_splq(tk_id, sp_id){
      console.log(sp_id);
      console.log(tk_id);
      $.ajax({
        url: 'dislike-product-detail-splq/'+sp_id+"/"+tk_id,
        type: 'GET',
      }).done(function(response) {
        $("#like_splq").empty();
        $("#like_splq").html(response);
      });
    }
  </script>
    <script>
      $(document).ready(function() {
        var divGiamGia = $('.sale-off');
        console.log(divGiamGia);
        $.each(divGiamGia, function(i,v){
          if(!Number($(v).attr('data-id')))
          {
            $(v).css('display','none');
          }
        });
      });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/vi.min.js" integrity="sha512-LvYVj/X6QpABcaqJBqgfOkSjuXv81bLz+rpz0BQoEbamtLkUF2xhPNwtI/xrokAuaNEQAMMA1/YhbeykYzNKWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  <script>
      var loadBtn = $('#commentLoard');
      var lessonPage = 0;
      var idsp = $('#trungid').attr('data-id');
      $(function(){
        getBinhLuan();
      });
      function getBinhLuan(page){
        if(!page)
        {
          page = 0;
        }
        $.ajax({
          type: "get",
          url: '/api/getbinhluan',
          data: {
            'idsp': idsp,
            'page': page
          },
          success: function(binhluans){
            if(binhluans.length == 0){
              loadBtn.fadeOut();
            }
            console.log(binhluans);
            appendBinhLuan(binhluans);
          }
        });
      }
      function appendBinhLuan(binhluans){
        let html ='';
        $.each(binhluans,function(index, binhluan){
            html+='<div class="comment">';
              html+='<img class="comment-img" src="./assets/img/product/noavatar.png" alt="" >';
              html+='<div class="comment__content">';
                html+='<div class="comment__content-heding">';
                  html+='<h4 class="comment__content-name">'+binhluan.tai_khoan.ho_ten+'</h4>';
                  html+='<span class="comment__content-time">'+moment(binhluan.created_at).fromNow()+'</span>';
                  html+='</div>'
                  html+='<div class="comment__content-content">';
                    html+='<span>'+binhluan.noi_dung+'</span>';
                    html+='</div>';
                    html+='</div>';
                    html+='</div>';
        });
        $('#comment').append(html);
      }
      function prependBinhLuan(binhluans){
 
        // $.each(binhluans,function(index, binhluan){
           let html='<div class="comment">';
              html+='<img class="comment-img" src="./assets/img/product/noavatar.png" alt="" >';
              html+='<div class="comment__content">';
                html+='<div class="comment__content-heding">';
                  html+='<h4 class="comment__content-name">'+binhluans.tai_khoan.ho_ten+'</h4>';
                  html+='<span class="comment__content-time">'+moment(binhluans.created_at).fromNow()+'</span>';
                  html+='</div>'
                  html+='<div class="comment__content-content">';
                    html+='<span>'+binhluans.noi_dung+'</span>';
                    html+='</div>';
                    html+='</div>';
                    html+='</div>';
        // });
        $('#comment').prepend(html);
      }
      
      function postBinhLuan(page){
        if(!page)
        {
          page = 0;
        }
        var cmt = $('#cmt').val();
        var idkh = {{Auth::id()}};

        $.ajax({
          type: "post",
          url: '/api/postbinhluan',
          data: {
            'idsp': idsp,
            'idkh': idkh,
            'cmt': cmt,
            'page': page
          },
          success: function(binhluans){
            // $('#comment').html('');
            $('#cmt').val('');
            // console.log(binhluans[0]);
            prependBinhLuan(binhluans[0]);
          }
        });
      }
      $('#commentLoard').click(function(){
        lessonPage++;
        getBinhLuan(lessonPage);
      });
  </script>
@endsection