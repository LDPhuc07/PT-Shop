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
              @foreach($sanpham->anh as $anh)
                <li class="img-item">
                  <img src="{{asset(getLink('product',$anh->link))}}" class="small-img" alt="anh 1" onclick="changeImg('{{$anh->id}}')" id="{{$anh->id}}">
                </li>
              @endforeach
          </ul>
        </div>
        <div id="main-img" style="cursor: pointer;">
          @foreach($anhchinh->anh as $anh)
            <img src="{{asset(getLink('product',$anh->link))}}" class="big-img" alt="ảnh chính" id="img-main" xoriginal="{{asset(getLink('product',$anh->link))}}">
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
      $.ajax({
        type: 'GET',
        url: "product-details/get-size/"+id+"/"+$(`#option-${mau}`).val(),
      }).done(function(response) {
        $("#product__size").empty();
        $("#product__size").html(response);
      }); 
    }

    function myKichThuoc(mau, id, kichthuoc) {
      $.ajax({
        type: 'GET',
        url: "product-details/get-qty/"+id+"/"+mau+"/"+kichthuoc,
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
  </script>
@endsection