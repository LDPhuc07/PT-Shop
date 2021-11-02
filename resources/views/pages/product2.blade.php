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
      <h4 class="product__filter-heading">Size <i class="fi-rs-minus" onclick="khonghienthidanhsach(6,`size3`)" id="minus-6"></i> <i class="fi-rs-plus hidden" onclick="khonghienthidanhsach(6,`size3`)" id="plus-6"></i></h4>
      <ul id= "size3" class="product__filter-ckeckbox">
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
<!-- end bộ lộc mobile -->
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
<script src="js/product.js"></script>
<script>
    function handleData() {
      // lấy dữ liệu của khoảng giá
      $('.checkGia').click(function () {
        var price = $(this).attr('value');
        var priceFrom = price.split("-")[0];
        var priceTo = price.split("-")[1];
        console.log(price);
        console.log(typeof priceFrom);
        console.log(priceTo);
      })
      // lấy dữ liệu của sort sắp xếp
      $('.dropdown-item').click(function () {
        var dataSort = $(this).attr('value');
        var dataSortFrom = dataSort.split('-')[0];
        var dataSortTo = dataSort.split('-')[1];
        console.log(dataSort);
        console.log(dataSortFrom);
        console.log(dataSortTo);
      })
      // lấy dữ liệu của thương hiệu
    }
    handleData();
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
    }
    var page = 0;
    var idlsp = {{$idlsp}};
    var idmtt = {{$idmtt}};
    function getSanPham(page) {
      if(!page)
      {
        page = 0;
      }
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
          'priceTo' : priceTo,
          'arrayThuongHieu': arrayThuongHieu,
          'tradeMark' : tradeMark
        },
        success: function(){
        
      })
    }
</script>
@endsection