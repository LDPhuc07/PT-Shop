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
                                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"><span>Tất cả</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"><span>Dưới 1,000,000đ</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"><span>1,000,000đ->2,000,000đ</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"><span>2,000,000đ->3,000,000đ</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"><span>3,000,000đ->4,000,000đ</span>
                                  </label>
                            </li>
                            <li class="product__filter-item">
                                <label class="form-check-label" for="radio2">
                                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"><span>Trên 4,000,000đ</span>
                                  </label>
                            </li>
                        </ul>
                    </div>
                    <div class="product__filter-trademark">
                      <h4 class="product__filter-heading">Thương hiệu <i class="fi-rs-minus" onclick="khonghienthidanhsach(2,`thuonghieu`)" id="minus-2"></i> <i class="fi-rs-plus undisplay" onclick="khonghienthidanhsach(2,`thuonghieu`)" id="plus-2"></i></h4>
                      <ul id="thuonghieu" class="product__filter-ckeckbox">
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>Adidas</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>Nike</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>Puma</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>DESPORTE</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>X-MUNICH</span>
                          </label>
                        </li>
                        <li class="product__filter-item">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something"><span>GRAND SPORT</span>
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
                  <h1 class="coll-name">Tất cả sản phẩm</h1>
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
    url:'/api/product?page=' + page,
    success: function(products){
     
      if(products.length == 0){
        loardMoreBtn.fadeOut();
      }
      appendSanPham(products);
      loardMoreBtn.text(prevText);
      productFetching = false;
      // console.log(products);
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
              html+='<p class="card-text price-color">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
              html+='</div>';
              html+='</div>';
              html+='</a>';
              html+='</div>';
              
    });
    $('#tatcasanpham').append(html);
  }

  // moi new


  function FilterInit(name){
    role = name;
    loardmore = 0;

    $.ajax({
    type:'get',
    url:'/api/' + name +'?page='+loardmore,
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
    url:'/api/' + role +'?page='+loardmore,
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
              html+='<p class="card-text price-color">'+(new Intl.NumberFormat('de-DE').format(product.gia_ban))+' VNĐ</p>';
              html+='</div>';
              html+='</div>';
              html+='</a>';
              html+='</div>';
              
    });
    $('#tatcasanpham').html(html);
  }
  $('.dropdown-item').on("click",function(x){
    console.log($( x['currentTarget']).text());
    $('.bbc').html($(x['currentTarget']).text());
});
</script>
<script>
    
</script>

@endsection