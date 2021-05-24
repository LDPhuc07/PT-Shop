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
                      <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">
                        Sản phẩm nổi bật
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Giá: Tăng dần</a>
                        <a class="dropdown-item" href="#">Giá: giảm dần</a>
                        <a class="dropdown-item" href="#">Tên A->Z</a>
                        <a class="dropdown-item" href="#">Tên Z->A</a>
                        <a class="dropdown-item" href="#">Cũ nhất</a>
                        <a class="dropdown-item" href="#">Mới nhất</a>
                        <a class="dropdown-item" href="#">Bán chạy nhất</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                    <div class="col-3">
                      <div class="card" style="width: 100%">
                        <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                            aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                          <p class="card-text price-color">1,000,000 đ</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="card" style="width: 100%">
                        <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                            aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                          <p class="card-text price-color">1,000,000 đ</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="card" style="width: 100%">
                        <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                            aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                          <p class="card-text price-color">1,000,000 đ</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="card" style="width: 100%">
                        <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                            aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                          <p class="card-text price-color">1,000,000 đ</p>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="card" style="width: 100%">
                      <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                          aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                        <p class="card-text price-color">1,000,000 đ</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="card" style="width: 100%">
                      <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                          aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                        <p class="card-text price-color">1,000,000 đ</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="card" style="width: 100%">
                      <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                          aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                        <p class="card-text price-color">1,000,000 đ</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="card" style="width: 100%">
                      <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                          aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                        <p class="card-text price-color">1,000,000 đ</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-3">
                  <div class="card" style="width: 100%">
                    <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                      <p class="card-text price-color">1,000,000 đ</p>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="card" style="width: 100%">
                    <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                      <p class="card-text price-color">1,000,000 đ</p>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="card" style="width: 100%">
                    <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                      <p class="card-text price-color">1,000,000 đ</p>
                    </div>
                  </div>
                </div>
                <div class="col-3">
                  <div class="card" style="width: 100%">
                    <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                      <p class="card-text price-color">1,000,000 đ</p>
                    </div>
                  </div>
                </div>
                </div>
                <div class="row">
              <div class="col-3">
                <div class="card" style="width: 100%">
                  <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                      aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                    <p class="card-text price-color">1,000,000 đ</p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card" style="width: 100%">
                  <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                      aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                    <p class="card-text price-color">1,000,000 đ</p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card" style="width: 100%">
                  <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                      aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                    <p class="card-text price-color">1,000,000 đ</p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card" style="width: 100%">
                  <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                      aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                    <p class="card-text price-color">1,000,000 đ</p>
                  </div>
                </div>
              </div>
                </div>
                <div class="row">
            <div class="col-3">
              <div class="card" style="width: 100%">
                <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                    aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                  <p class="card-text price-color">1,000,000 đ</p>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card" style="width: 100%">
                <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                    aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                  <p class="card-text price-color">1,000,000 đ</p>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card" style="width: 100%">
                <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                    aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                  <p class="card-text price-color">1,000,000 đ</p>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card" style="width: 100%">
                <img class="card-img-top" src="img/product/addidas1.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title custom__name-product title-news">Card title aaaaaaaaaaaa
                    aaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
                  <p class="card-text price-color">1,000,000 đ</p>
                </div>
              </div>
            </div>
                </div>
                <div class="loadmore">
                  <a href="" class="loadmore-btn">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection
@section('js')
<script src="js/main.js"></script>
<script src="js/product.js"></script>
@endsection