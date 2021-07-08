@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/product.css">
<style>
  .den {
    color: #000 !important;
  }
</style>
@endsection
@section('content')

<div class="product" style="margin-top: 195px;">
 
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="product__filter">
                    <div class="product__filter-price">
                        <h4 class="product__filter-heading">Khoảng giá <i class="fi-rs-minus" onclick="khonghienthidanhsach(1,`khoanggia`)" id="minus-1"></i> <i class="fi-rs-plus undisplay" id="plus-1" onclick="khonghienthidanhsach(1,`khoanggia`)"></i></h4>
                        <ul id = "khoanggia" class="product__filter-ckeckbox">
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input checkGia" id="radio2" name="optradio" value="0-1000000"><span>Dưới 1,000,000đ</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input checkGia" id="radio2" name="optradio" value="1000000-2000000"><span>1,000,000đ->2,000,000đ</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input checkGia" id="radio2" name="optradio" value="2000000-3000000"><span>2,000,000đ->3,000,000đ</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input checkGia" id="radio2" name="optradio" value="3000000-4000000"><span>3,000,000đ->4,000,000đ</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input checkGia" id="radio2" name="optradio" value="4000000-100000000"><span>Trên 4,000,000đ</span>
                                  </label>
                            </li>
                        </ul>
                    </div>
                    <div class="product__filter-trademark">
                      <h4 class="product__filter-heading">Thương hiệu <i class="fi-rs-minus" onclick="khonghienthidanhsach(2,`thuonghieu`)" id="minus-2"></i> <i class="fi-rs-plus undisplay" onclick="khonghienthidanhsach(2,`thuonghieu`)" id="plus-2"></i></h4>
                      <ul id="thuonghieu" class="product__filter-ckeckbox">
                        <li class="product__filter-item">
                          <label class="form-check-label" for="2">
                            <input type="checkbox" class="form-check-input checkThuongHieu" onclick="chon(2)" id="cc2" name="option" value="adidas"><span>Adidas</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="1">
                            <input type="checkbox" class="form-check-input checkThuongHieu" onclick="chon(1)" id="cc1" name="option" value="nike"><span>Nike</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="3">
                            <input type="checkbox" class="form-check-input checkThuongHieu" onclick="chon(3)" id="cc3" name="option" value="puma"><span>Puma</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="5">
                            <input type="checkbox" class="form-check-input checkThuongHieu" onclick="chon(5)" id="cc5" name="option" value="kappa"><span>KAPPA</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="9">
                            <input type="checkbox" class="form-check-input checkThuongHieu" onclick="chon(9)" id="cc9" name="option" value="x-storm"><span>X-storm</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="6">
                            <input type="checkbox" class="form-check-input checkThuongHieu" onclick="chon(6)" id="cc6" name="option" value="fila"><span>FILA</span>
                          </label>
                        </li>
                      </ul>
                    </div>
                    {{-- <div class="product__filter-size">
                      <h4 class="product__filter-heading">Size <i class="fi-rs-minus" onclick="khonghienthidanhsach(3,`size`)" id="minus-3"></i> <i class="fi-rs-plus undisplay" onclick="khonghienthidanhsach(3,`size`)" id="plus-3"></i></h4>
                      <ul id= "size" class="product__filter-ckeckbox">
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>37.5</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>38</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>38.5</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>x</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>xl</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>l</span>
                          </label>
                        </li>
                      </ul>
                    </div> --}}
                </div>
            </div>
            <div class="col-9">
              <div class="sort-wrap">
                <div class="sort-left">
                  <h1 class="coll-name">Sản phẩm</h1>
                </div>
                <div class="sort-right">
                  <div class="sortby">
                    <label for="">Sắp xếp theo:</label>
                    <div class="dropdown">
                      <button type="button" class="btn btn-dark dropdown-toggle bbc" data-toggle="dropdown">
                        Cũ nhất
                      </button>
                      <div class="dropdown-menu" style="cursor: pointer">
                        <a class="dropdown-item" onclick="FilterInit('priceAscending')">Giá: Tăng dần</a>
                        <a class="dropdown-item" onclick="FilterInit('priceDecrease')" >Giá: giảm dần</a>
                        <a class="dropdown-item" onclick="FilterInit('nameBegin')">Tên A->Z</a>
                        <a class="dropdown-item" onclick="FilterInit('nameEnd')">Tên Z->A</a>
                        <a class="dropdown-item" onclick="FilterInit('oldest')">Cũ nhất</a>
                        <a class="dropdown-item" onclick="FilterInit('latest')">Mới nhất</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row" id="tatcasanpham">
                  
                </div>
                <div class="loadmore">
                  <a style="cursor: pointer;" class="loadmore-btn">Tải thêm</a>
                </div>
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
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        Bạn cần phải đăng nhập để đưa sản phẩm vào danh sách thích!
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary " data-dismiss="modal">Đóng</a>
        <a href="{{ route('accounts.logout') }}" type="button" class="btn btn-info">Đăng nhập</a>
      </div>
      
    </div>
  </div>
</div>

@endsection
@section('js')
<script src="js/main.js"></script>
<script src="js/product.js"></script>

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
  var idlsp = {{$idlsp}};
  var idmtt = {{$idmtt}};
  var trang= 0;
  $('.checkGia').click(function(){
    var price = $(this).attr('value');
    var priceFrom = price.split("-")[0];
    var priceTo = price.split("-")[1];
    $.ajax({
      type:'get',
      url: '/api/priceRange',
      data: {
        'page' : trang,
        'idlsp' : idlsp,
        'idmtt' : idmtt,
        'priceFrom' : priceFrom,
        'priceTo' : priceTo
      },
      success: function(products){
        render(products);
      }
    });
  });
  var arrayThuongHieu = [];
  function chon(id){
    var tradeMark = $(this).attr('value');
    var idTradeMark = document.getElementById('cc'+id);
        if(idTradeMark.checked)
        {
          arrayThuongHieu.push(id);
        }
        else
        {
          arrayThuongHieu = arrayThuongHieu.filter(function(item){
            return item !== id
          })
          
        }
    console.log(arrayThuongHieu);
    $.ajax({
      type:'get',
      url: '/api/trademark',
      data: {
        'page' : trang,
        'idlsp' : idlsp,
        'idmtt' : idmtt,
        'tradeMark': tradeMark,
        'arrayThuongHieu': arrayThuongHieu
      },
      success: function(products){
        render(products);
      }
    });
  }
 
  var role = 'all'; 
  var loardmore = 0;
  var productFetching =false;
      $(function(){
        getSanPham();
      });
  $('.loadmore-btn').click(function(){
    // if(productFetching) return;
    if(role=='all'){
      loardmore++;
      getSanPham(loardmore);
    }
    else{
      loardmore++;
      Filter();
    }
  });
  
 
  function getSanPham(page){
    if(!page) {
      page = 0;
    }
    var loardMoreBtn = $('.loadmore-btn');
    var prevText = loardMoreBtn.text();
    loardMoreBtn.text('Đang tải...');
    productFetching = true;

    $.ajax({
      type:'get',
      url:'/api/product?page='+page+'&idlsp='+idlsp+'&idmtt='+idmtt,
      success: function(products){
      
        if(products.length == 0){
          loardMoreBtn.fadeOut();
        }
        appendSanPham(products);
        loardMoreBtn.text(prevText);
        productFetching = false;
    }
    });
    
  }
  function appendSanPham(products){
    let html ='';
    
    $.each(products,function(index, product){
      html+='<div class="col-3" style="margin-bottom: 20px">';
      html+='<a href="/product-details/'+product.id+'" class="product__new-item">';
          html+='<div class="card" style="width: 100%">';
            html+='<img class="card-img-top" src="'+product.anh[0].link+'" alt="Card image cap">';
            html+='<div class="card-body">';
              html+='<h5 class="card-title custom__name-product title-news">'+product.ten_san_pham+'</h5>';
              html+='<div class="product__price" id="price">';
                html+='<p style="font-size:11px" class="card-text price-color product__price-new">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban*(100-product.giam_gia)/100))+' VNĐ</p>';
                html+='<p style="font-size:11px" data-id="'+product.giam_gia+'" class="card-text price-color product__price-old">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
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
        if(!Number($(v).attr('data-id')))
        {
          $(v).css('display','none');
        }
    });

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
  });
  }

  // moi new


  function FilterInit(name){
    role = name;
    loardmore = 0;

    $.ajax({
    type:'get',
    url:'/api/' + name +'?page='+loardmore+'&idlsp='+idlsp+'&idmtt='+idmtt,
    success: function(products){
      if(products.length == 0){
        loardMoreBtn.fadeOut();
      }
        render(products);
       
    }
    });
    }

    function Filter(){
    var loardMoreBtn = $('.loadmore-btn');
    var prevText = loardMoreBtn.text();
    loardMoreBtn.text('Đang tải...');
    productFetching = true;
    $.ajax({
    type:'get',
    url:'/api/' + role +'?page='+loardmore+'&idlsp='+idlsp+'&idmtt='+idmtt,
    success: function(products){
      if(products.length == 0){
        loardMoreBtn.fadeOut();
      }
      appendSanPham(products);
      loardMoreBtn.text(prevText);
      productFetching = false;

    }
    });
    }
    
    function render(products){
    
    let html ='';
    
    $.each(products,function(index, product){
      html+='<div class="col-3" style="margin-bottom: 20px">';
      html+='<a href="/product-details/'+product.id+'" class="product__new-item">';
          html+='<div class="card" style="width: 100%">';
            html+='<img class="card-img-top" src="'+product.anh[0].link+'" alt="Card image cap">';
            html+='<div class="card-body">';
              html+='<h5 class="card-title custom__name-product title-news">'+product.ten_san_pham+'</h5>';
              html+='<div class="product__price" id="price">';
                html+='<p style="font-size:11px" class="card-text price-color product__price-new">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban*(100-product.giam_gia)/100))+' VNĐ</p>';
                html+='<p style="font-size:11px" data-id="'+product.giam_gia+'" class="card-text price-color product__price-old">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
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
    $('#tatcasanpham').html(html);
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
  $('.dropdown-item').on("click",function(x){
    console.log($( x['currentTarget']).text());
    $('.bbc').html($(x['currentTarget']).text());
});
  
</script>
<script>
  $(document).ready(function() {
    var divGiamGia = $('.card-body').children('.sale-off');
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
    $.each(pGiamGia, function(i,v){
      if(!Number($(v).attr('data-id')))
      {
        $(v).css('display','none');
      }
    });
  });
</script>
<script>
  function doimau(tk_id, sp_id) {
    if($(`.like-${sp_id}`).hasClass('den')) {
      $.ajax({
        url: 'dislike/'+sp_id+"/"+tk_id,
        method: "GET"
      });
      $(`.like-${sp_id}`).removeClass('den');
      var like = parseInt($(`#luot-like-${sp_id}`).text());
      like--;
      $(`.luot-like-${sp_id}`).html(like.toString());
      var like_header = parseInt($(`#header__second__like--notice`).text());
      like_header--;
      $(`#header__second__like--notice`).html(like_header.toString());
      console.log(like);
    }
    else {
      $.ajax({
        url: 'like/'+sp_id+"/"+tk_id,
        method: "GET"
      });
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
      $(`.luot-like-${sp_id}`).html(like.toString());
      console.log(like);
    }
  }
</script>
@endsection