<header class="header">
    <div class="container-fluid">
      <div class="header__first">
        <ul class="nav nav__first">
          <li class="nav-item nav-item__first">
            <i class="fi-rs-bell"></i>
            <a class="nav-link nav-link__first nav-link__first--separate" href="#">Thông báo</a>
          </li>
          <li class="nav-item nav-item__first">
            <a class="nav-link nav-link__first nav-link__first--separate" href="#">Liên hệ</a>
          </li>
          <li class="nav-item nav-item__first nav-item__first-user">
            @if(Auth::check() and Auth::user()->admin != 1)
              <img src="{{asset('img/product/noavatar.png')}}" alt="" class="nav-item__first-img">
              <span class="nav-item__first-name">{{ Auth::user()->ho_ten }}</span>
              <ul class="nav-item__first-menu">
                <li class="nav-item__first-item">
                  <a href="{{ route('accounts',Auth::user()->id) }}">Tài khoản của tôi</a>
                </li>
                <li class="nav-item__first-item">
                  <a href="{{ route('accounts',Auth::user()->id) }}">Đổi mật khẩu</a>
                </li>
                <li class="nav-item__first-item">
                  <a href="">Đơn mua</a>
                </li>
                <li class="nav-item__first-item">
                  <a href="{{ route('accounts.logout') }}">Đăng xuất</a>
                </li>
              </ul>
            @else
              <a class="nav-link nav-link__first" href="{{ route('accounts.login') }}">Đăng nhập</a>
            @endif
          </li>
        </ul>
      </div>
      <div class="header__second">
        <div class="header__second__logo">
          <a href="#"><img src="img/logo/logomain.png" alt="" class="header__second__logo--img"></a>
        </div>
        <div class="header__second__search">
          <div class="header__second__search--input-wrap">
            <input type="text" placeholder="Tìm kiếm..." class="header__second__search--input">
            <!-- search history -->
            <div class="header__second__search-history">
              <h3 class="header__second__search-history-heading">Lịch sử tìm kiếm</h3>
              <ul class="header__second__search-history-list">
                <li class="header__second__search-history-item">
                  <a href="">Adidas Original</a>
                </li>
                <li class="header__second__search-history-item">
                  <a href="">Adidas Original</a>
                </li>
              </ul>
            </div>
          </div>
          <button class="header__second__search--btn">
            <i class="fi-rs-search header__second__search--btn-icon"></i>
          </button>
        </div>
        <div class="header__second__like">
          <a href="" class="header__second__like--icon"><i class="fi-rs-heart"></i></a>
        </div>
        <div class="header__second__cart">
          <a href="{{ route('cart.index') }}" class="header__second__cart--icon">
            <i class="fi-rs-shopping-bag"></i>
            <span class="header__second__cart--notice">3</span>
          </a>
        </div>
      </div>
      <div class="header__third">
        <ul class="nav nav__third">
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Trang chủ</a>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="{{route('product.products')}}">Tất cả sản phẩm</a>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Giày<i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Bóng đá</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Chạy</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Cầu lông</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Bóng rỗ</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Quần vợt</a></i>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Quần áo <i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <li class="hover-me">  <a href="" class="sub-menu-1--link">Bóng đá</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Chạy</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Cầu lông</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Bóng rỗ</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Quần vợt</a></i>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Phụ kiện<i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <li class="hover-me">  <a href="" class="sub-menu-1--link">Bóng đá</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Chạy</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Cầu lông</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Bóng rỗ</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Quần vợt</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Bơi lội</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Golf</a></i>
                </li>
              </ul>
            </div>
          </li>
          {{-- <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Thể thao <i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <li class="hover-me"> <a href="" class="sub-menu-1--link">Tất cả</a>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Bóng đá</a><i class="fi-rr-caret-right"></i>
                    <div class="sub-menu-2">
                      <ul>
                        <li><a href="" class="sub-menu-1--link">Giày ống</a></li>
                        <li><a href="" class="sub-menu-1--link">Quần áo</a></li>
                        <li><a href="" class="sub-menu-1--link">Phụ kiện</a></li>
                        <li><a href="" class="sub-menu-1--link">Giày predator</a></li>
                        <li><a href="" class="sub-menu-1--link">Giày X</a></li>

                      </ul>
                    </div>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Chạy</a><i class="fi-rr-caret-right"></i>
                  <div class="sub-menu-2">
                    <ul>
                      <li><a href="" class="sub-menu-1--link">Giày</a></li>
                      <li><a href="" class="sub-menu-1--link">Quần áo</a></li>
                      <li><a href="" class="sub-menu-1--link">Phụ kiện</a></li>
                      <li><a href="" class="sub-menu-1--link">Ultraboots 21</a></li>
                      <li><a href="" class="sub-menu-1--link">Adizero</a></li>
                      <li><a href="" class="sub-menu-1--link">X9000</a></li>
                    </ul>
                  </div>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Tập luyện</a><i class="fi-rr-caret-right"></i>
                  <div class="sub-menu-2">
                    <ul>
                      <li><a href="" class="sub-menu-1--link">Giày</a></li>
                      <li><a href="" class="sub-menu-1--link">Quần áo</a></li>
                      <li><a href="" class="sub-menu-1--link">Phụ kiện</a></li>
                      <li><a href="" class="sub-menu-1--link">Climacool</a></li>
                      <li><a href="" class="sub-menu-1--link">Dòng sản phẩm Essentials</a></li>
                    </ul>
                  </div>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Khác</a><i class="fi-rr-caret-right"></i>
                  <div class="sub-menu-2">
                    <ul>
                      <li><a href="" class="sub-menu-1--link">Bơi lội</a></li>
                      <li><a href="" class="sub-menu-1--link">Golf</a></li>
                      <li><a href="" class="sub-menu-1--link">Quần vợt</a></li>
                      <li><a href="" class="sub-menu-1--link">Cầu lông</a></li>
                      <li><a href="" class="sub-menu-1--link">Bóng rỗ</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li> --}}
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Các nhãn hiệu <i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <!-- <li class="hover-me"> <a href="" class="sub-menu-1--link">Tất cả</a>
                </li> -->
                <li class="hover-me"><a href="" class="sub-menu-1--link">Adidas</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Nike</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">Puma</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">GRAND SPORT</a></i>
                </li>
                <li class="hover-me"><a href="" class="sub-menu-1--link">X-MUNICH</a></i>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Tin tức</a>
          </li>
        </ul>
      </div>
    </div>
  </header>