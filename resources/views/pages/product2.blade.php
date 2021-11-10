@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/product.css">
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
    .sortby {
      float: left;
    }
    .sortby label {
      display: none;
    }
    .sort-left {
      margin-bottom: 20px;
    }
    .sortby2 {
      display: block;
    }
    .sortby {
      float: left;
    }
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

<div class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 hidden-xs hidden-sm">
                <div class="product__filter">
                    <div class="product__filter-price">
                        <h4 class="product__filter-heading">Khoảng giá <i class="fi-rs-minus" onclick="khonghienthidanhsach(1,`khoanggia`)" id="minus-1"></i> <i class="fi-rs-plus hidden" id="plus-1" onclick="khonghienthidanhsach(1,`khoanggia`)"></i></h4>
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
                      <h4 class="product__filter-heading">Thương hiệu <i class="fi-rs-minus" onclick="khonghienthidanhsach(2,`thuonghieu`)" id="minus-2"></i> <i class="fi-rs-plus hidden" onclick="khonghienthidanhsach(2,`thuonghieu`)" id="plus-2"></i></h4>
                      <ul id="thuonghieu" class="product__filter-ckeckbox">
                        @foreach($nxx as $i)
                        <li class="product__filter-item">
                          <label class="form-check-label" for="{{$i['id']}}">
                            <input type="checkbox" class="form-check-input checkThuongHieu" onclick="chon({{$i['id']}})" id="cc{{$i['id']}}" name="option" value="{{$i['ten_nha_san_xuat']}}"><span>{{$i['ten_nha_san_xuat']}}</span>
                          </label>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                    {{-- <div class="product__filter-size">
                      <h4 class="product__filter-heading">Size <i class="fi-rs-minus" onclick="khonghienthidanhsach(3,`size`)" id="minus-3"></i> <i class="fi-rs-plus hidden" onclick="khonghienthidanhsach(3,`size`)" id="plus-3"></i></h4>
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
            <div class="col-lg-9 col-12">
              <div class="sort-wrap row">
                <div class="sort-left col-12 col-lg-6">
                  <h1 class="coll-name">Sản phẩm</h1>
                </div> 
                <div class="sort-right col-12 col-lg-6">
                  <div class="sortby">
                    <label for="">Sắp xếp theo:</label>
                    <div class="dropdown">
                      <button type="button" class="btn btn-dark dropdown-toggle bbc" data-toggle="dropdown">
                        Cũ nhất
                      </button>
                      <div class="dropdown-menu" style="cursor: pointer">
                        <div class="dropdown-item" value="gia_ban-asc" >Giá: Tăng dần</div>
                        <div class="dropdown-item" value="gia_ban-desc">Giá: giảm dần</div>
                        <div class="dropdown-item" value="ten_san_pham-asc">Tên A->Z</div>
                        <div class="dropdown-item" value="ten_san_pham-desc">Tên Z->A</div>
                        <div class="dropdown-item" value="id-asc">Cũ nhất</div>
                        <div class="dropdown-item" value="id-desc">Mới nhất</div>
                      </div>
                    </div>
                  </div>
                  <div class="sortby2 hidden" style="float: right;">
                    <div class="dropdown">
                      <button class="btn btn-dark dropdown-toggle" id="filter">
                        Lọc sản phẩm
                      </button>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row row-product" id="tatcasanpham">
                  
                </div>
                <div class="loadmore">
                  <a style="cursor: pointer;" class="loadmore-btn">Tải thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bộ lọc mobile -->
<div class="overlay2 hidden"></div>
<div class="filter-mobile">
  <div class="product__filter">
    <div class="product__filter-price">
        <h4 class="product__filter-heading">Khoảng giá <i class="fi-rs-minus" onclick="khonghienthidanhsach(4,`khoanggia1`)" id="minus-4"></i> <i class="fi-rs-plus hidden" id="plus-4" onclick="khonghienthidanhsach(4,`khoanggia1`)"></i></h4>
        <ul id = "khoanggia1" class="product__filter-ckeckbox">
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
      <h4 class="product__filter-heading">Thương hiệu <i class="fi-rs-minus" onclick="khonghienthidanhsach(5,`thuonghieu1`)" id="minus-5"></i> <i class="fi-rs-plus hidden" onclick="khonghienthidanhsach(5,`thuonghieu2`)" id="plus-5"></i></h4>
      <ul id="thuonghieu2" class="product__filter-ckeckbox">
        @foreach($nxx as $i)
        <li class="product__filter-item">
          <label class="form-check-label" for="{{$i['id']}}">
            <input type="checkbox" class="form-check-input checkThuongHieu" onclick="chon({{$i['id']}})" id="cc{{$i['id']}}" name="option" value="{{$i['ten_nha_san_xuat']}}"><span>{{$i['ten_nha_san_xuat']}}</span>
          </label>
        </li>
        @endforeach

      </ul>
    </div>
</div>
</div>
<!-- end bộ lộc mobile -->
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
<script src="js/product.js"></script>
<script>
    var prevTextButton = $('.loadmore-btn').text();
    $('.loadmore-btn').text('ĐANG TẢI...');
    var productFetching = false;
    var page = 0;
    var idlsp = {{$idlsp}};
    var idmtt = {{$idmtt}};
    // lấy dữ liệu của thương hiệu
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
        if(arrayThuongHieu.length > 0){
          page = 0 ;
          getSanPham(page);
        }
        else
        {
          page = 0 ;
          productFetching =true;
          $.ajax({
          type: 'GET',
          url: '/api/listproduct',
          data: {
            'page' : page,
            'idlsp': idlsp,
            'idmmt': idmtt,
            'priceFrom' : priceFrom,
            'priceTo' : priceTo,
            'dataSortFrom': dataSortFrom,
            'dataSortTo' : dataSortTo
          },
        
          success: function (products) {
            $('.loadmore-btn').text(prevTextButton);
            console.log(products.length);
            if(products.length == 0) {
              // if($('.loadmore-btn').hasClass('hidden'))
              // {
              //   $('.loadmore-btn').removeClass('hidden');
              // }
              console.log('có');
            }
            // else
            // {
            //   $('.loadmore-btn').addClass('hidden');
            // }
            renderSanPham(products);
            productFetching =false;
          }
        });
        }
    }
    
     // lấy dữ liệu của khoảng giá
    var priceFrom;
    var priceTo;
    $('.checkGia').click(function () {
        page = 0 ;
        var price = $(this).attr('value');
        priceFrom = price.split("-")[0] ? price.split("-")[0] : "0" ;
        priceTo = price.split("-")[1] ? price.split("-")[1] : "10000000000000";
        console.log(price);
        console.log(priceFrom);
        console.log(priceTo);
        getSanPham(page);
    })
     // lấy dữ liệu của sort sắp xếp
    var dataSortFrom;
    var dataSortTo;
    $('.dropdown-item').click(function () {
      page = 0 ;
      var dataSort = $(this).attr('value');
      dataSortFrom = dataSort.split('-')[0] ? dataSort.split('-')[0] : "gia_ban";
      dataSortTo = dataSort.split('-')[1] ? dataSort.split('-')[1] : "asc";
      console.log(dataSort);
      console.log(dataSortFrom);
      console.log(dataSortTo);
      getSanPham(page);
    })
    // load more

    $('.loadmore-btn').click(function() {
      if(productFetching) return;
      page++;
      $.ajax({
        type: 'GET',
        url: '/api/listproduct',
        data: {
          'page' : page,
          'idlsp': idlsp,
          'idmtt': idmtt,
          'priceFrom' : priceFrom,
          'priceTo' : priceTo,
          'dataSortFrom': dataSortFrom,
          'dataSortTo' : dataSortTo,
          'arrayThuongHieu': arrayThuongHieu
        },
        
        success: function (products) {
          $('.loadmore-btn').text(prevTextButton);
          if(products.length == 0) {
            $('.loadmore-btn').addClass('hidden');
          }
          renderSanPham2(products);
        }
      });
    })
    function getSanPham() {
      
      if(!page)
      {
        page = 0;
      }
      productFetching = true;
      $.ajax({
        type: 'GET',
        url: '/api/listproduct',
        data: {
          'page' : page,
          'idlsp': idlsp,
          'idmtt': idmtt,
          'priceFrom' : priceFrom,
          'priceTo' : priceTo,
          'dataSortFrom': dataSortFrom,
          'dataSortTo' : dataSortTo,
          'arrayThuongHieu': arrayThuongHieu
        },
        
        success: function (products) {
          $('.loadmore-btn').text(prevTextButton);
          console.log(products.length);
            if(products.length != 0) {
              if($('.loadmore-btn').hasClass('hidden'))
              {
                $('.loadmore-btn').removeClass('hidden');
              }
              console.log('có');
            }
            else
            {
              $('.loadmore-btn').addClass('hidden');
            }
          renderSanPham(products);
          productFetching =false;
        }
      });
    }
    getSanPham();
    function renderSanPham(products){
    
    let html ='';
    $.each(products,function(index, product){
      html+='<div class="col-lg-3 col-md-6 col-12 mb-20" style="margin-bottom: 20px">';
      html+='<a href="/product-details/'+product.id+'" class="product__new-item">';
          html+='<div class="card" style="width: 100%">';
            if($.isEmptyObject(product.anh[0]))
            {
              html+='<img class="card-img-top" src="/img/product/no-image.png" alt="Card image cap">';
             
            }
            else
            {
              html+='<img class="card-img-top" src="'+product.anh[0].link+'" alt="Card image cap">';
         
            }
            html+='<div class="card-body">';
              html+='<h5 class="card-title custom__name-product title-news">'+product.ten_san_pham+'</h5>';
              html+='<div class="product__price custom-text-price" id="price">';
                html+='<p class="card-text price-color product__price-new">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban*(100-product.giam_gia)/100))+' VNĐ</p>';
                html+='<p data-id="'+product.giam_gia+'" class="card-text price-color product__price-old">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
                html+='</div>';
              html+='<div style="display:flex;justify-content: space-between;';
              html+='align-items: center;">';
              html+='<div>'
                html+='<span id="luot-like-'+product.id+'" class="luot-like-'+product.id+'" style="margin-right: 12px;font-size: 22px">'
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
                  html+='font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
                } else {
                  html+='<a onclick="doimau({{ Auth::user()->id }},'+product.id+')" class="icon-like  like-'+product.id+'" style="color: #ccc;'
                  html+='font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
                }
              @else
                  <?php
                    if(!(Auth::check() && Auth::user()->admin != 1))
                    {
                        Session::put('url previous',url()->current());
                    }
                  ?>
                html+='<a class="icon-like" style="color: #ccc;'
                html+='font-size: 22px;" data-toggle="modal" data-target="#myModal" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
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


  // abc
  function renderSanPham2(products){
    
    let html ='';
    $.each(products,function(index, product){
      html+='<div class="col-lg-3 col-md-6 col-12 mb-20" style="margin-bottom: 20px">';
      html+='<a href="/product-details/'+product.id+'" class="product__new-item">';
          html+='<div class="card" style="width: 100%">';
            if($.isEmptyObject(product.anh[0]))
            {
              html+='<img class="card-img-top" src="/img/product/no-image.png" alt="Card image cap">';
             
            }
            else
            {
              html+='<img class="card-img-top" src="'+product.anh[0].link+'" alt="Card image cap">';
         
            }
            html+='<div class="card-body">';
              html+='<h5 class="card-title custom__name-product title-news">'+product.ten_san_pham+'</h5>';
              html+='<div class="product__price custom-text-price" id="price">';
                html+='<p class="card-text price-color product__price-new">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban*(100-product.giam_gia)/100))+' VNĐ</p>';
                html+='<p data-id="'+product.giam_gia+'" class="card-text price-color product__price-old">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
                html+='</div>';
              html+='<div style="display:flex;justify-content: space-between;';
              html+='align-items: center;">';
              html+='<div>'
                html+='<span id="luot-like-'+product.id+'" class="luot-like-'+product.id+'" style="margin-right: 12px;font-size: 22px">'
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
                  html+='font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
                } else {
                  html+='<a onclick="doimau({{ Auth::user()->id }},'+product.id+')" class="icon-like  like-'+product.id+'" style="color: #ccc;'
                  html+='font-size: 22px;" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
                }
              @else
                  <?php
                    if(!Auth::check())
                    {
                        Session::put('url previous',url()->current());
                    }
                  ?>
                html+='<a class="icon-like" style="color: #ccc;'
                html+='font-size: 22px;" data-toggle="modal" data-target="#myModal" class="header__second__like--icon"><i class="fas fa-heart"></i></a>'
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
  // end abc



  $('.dropdown-item').on("click",function(x){
    console.log($( x['currentTarget']).text());
    $('.bbc').html($(x['currentTarget']).text());
  });
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
      $(`.luot-like-${sp_id}`).html(like.toString());
      var like_header = parseInt($(`#header__second__like--notice`).text());
      like_header--;
      
      $(`#header__second__like--notice`).html(like_header.toString());

      var like_header1 = parseInt($(`#header__second__like--notice1`).text());
        like_header1--;
        $(`#header__second__like--notice1`).html(like_header1.toString());
        $(`.luot-like-${sp_id}`).html(like.toString());
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
      $(`.luot-like-${sp_id}`).html(like.toString());

      var like_header1 = parseInt($(`#header__second__like--notice1`).text());
        like_header1++;
        $(`#header__second__like--notice1`).html(like_header1.toString());
        $(`.luot-like-${sp_id}`).html(like.toString());
      });
    }
  }
</script>
@endsection