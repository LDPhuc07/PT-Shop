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
                    <div class="product__filter-size">
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
                    </div>
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
  var trang= 0;
  $('.checkGia').click(function(){
    var price = $(this).attr('value');
    var priceFrom = price.split("-")[0];
    var priceTo = price.split("-")[1];
    $.ajax({
      type:'get',
      url: '/api/priceRange?page='+trang+'&priceFrom='+priceFrom+'&priceTo='+priceTo,
      success: function(products){
        render(products);
      }
    });
  });
  var arrayThuongHieu = [];
  function chon(id){
    var tradeMark = $(this).attr('value');
    var idTradeMark = document.getElementById('cc'+id);
    if(idTradeMark.checked){
      arrayThuongHieu.push(id);
    }else{
      
    }
    console.log(arrayThuongHieu);
  }
  // $('.checkThuongHieu').click(function(){
    
  //   var idTradeMark = $(this).attr('id');
  //   $.ajax({
  //     type:'get',
  //     url: '/api/trademark?page='+trang+'&tradeMark='+tradeMark,
  //     success: function(products){
  //       render(products);
  //     }
  //   });
  // });



  var idlsp = {{$idlsp}};
  var idmtt = {{$idmtt}};
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
                html+='<p style="font-size:11px" data-id="'+product.gia_ban+'" class="card-text price-color product__price-old">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
                html+='</div>';
              html+='<div style="display:flex;justify-content: space-between;';
              html+='align-items: center;">';
              html+='<a href="" class="icon-like" style="color: #000;';
              html+='font-size: 20px;"><i class="far fa-heart"></i><i class="fas fa-heart"></i></a>';
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
                html+='<p style="font-size:11px" data-id="'+product.gia_ban+'" class="card-text price-color product__price-old">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
                html+='</div>';
              html+='<div style="display:flex;justify-content: space-between;';
              html+='align-items: center;">';
              html+='<a href="" class="icon-like" style="color: #000;';
              html+='font-size: 20px;"><i class="far fa-heart"></i><i class="fas fa-heart"></i></a>';
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

@endsection