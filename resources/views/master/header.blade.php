<style>
  form.example input[type=text] {
    padding: 10px;
    font-size: 20px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }
  
  form.example button {
    float: left;
    width: 20%;
    padding: 12px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }
  
  form.example button:hover {
    background: #0b7dda;
  }
  
  form.example::after {
    content: "";
    clear: both;
    display: table;
  }
</style>
{{-- <header class="header">
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
              <img src="{{asset(getLink('anh-dai-dien',Auth::user()->anh_dai_dien))}}" alt="" class="nav-item__first-img">
              <span class="nav-item__first-name">{{ Auth::user()->ho_ten }}</span>
              <ul class="nav-item__first-menu">
                <li class="nav-item__first-item">
                  <a href="{{ route('accounts',Auth::user()->id) }}">Tài khoản của tôi</a>
                </li>
                <li class="nav-item__first-item">
                  <a href="{{ route('accounts.getChangePassword',Auth::user()->id) }}">Đổi mật khẩu</a>
                </li>
                <li class="nav-item__first-item">
                  <a href="{{ route('bill') }}">Đơn mua</a>
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
        <form action="{{route('search')}}" class="header__second__search" method="get">
          <div class="header__second__search" style="margin-left:0px">
            <div class="header__second__search--input-wrap">
              <input id="searchInput" type="text" placeholder="Tìm kiếm..." class="header__second__search--input" name="search" value="{{Request::get('search')}}" autocomplete="off">
              
            </div>
            <button class="header__second__search--btn" id="addHistorySearch" >
              <i class="fi-rs-search header__second__search--btn-icon"></i>
            </button>
          </div>
        </form>
        <div class="header__second__like">
          @if(Auth::check() and Auth::user()->admin != 1)
            <a href="{{ route('listlike') }}" class="header__second__like--icon"><i class="fi-rs-heart"></i><span id="header__second__like--notice" class="header__second__like--notice"></span></a>
          @else
          <a href="{{ route('accounts.login') }}" class="header__second__like--icon"><i class="fi-rs-heart"></i></a>
          @endif
        </div>
        <div class="header__second__cart">
          <a href="{{ route('cart.index') }}" class="header__second__cart--icon">
            <i class="fi-rs-shopping-bag"></i>
            <span id="header__second__cart--notice" class="header__second__cart--notice">
            </span>
          </a>
        </div>
      </div>
      <div class="header__third">
        <ul class="nav nav__third">
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Trang chủ</a>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="{{route('products',['idlsp' =>'0','idmtt' => '0'])}}">Tất cả sản phẩm</a>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="{{route('categlory',['idlsp' =>'1','idmtt' => '0'])}}">Giày<i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'1','idmtt' => '1'])}}" class="sub-menu-1--link">Bóng đá</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'1','idmtt' => '9'])}}" class="sub-menu-1--link">Chạy</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'1','idmtt' => '5'])}}" class="sub-menu-1--link">Cầu lông</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'1','idmtt' => '2'])}}" class="sub-menu-1--link">Bóng rỗ</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'1','idmtt' => '3'])}}" class="sub-menu-1--link">Quần vợt</a></i>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="{{route('categlory',['idlsp' =>'2','idmtt' => '0'])}}">Quần áo <i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <li class="hover-me">  <a href="{{route('categlory',['idlsp' =>'2','idmtt' => '1'])}}" class="sub-menu-1--link">Bóng đá</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'2','idmtt' => '9'])}}" class="sub-menu-1--link">Chạy</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'2','idmtt' => '5'])}}" class="sub-menu-1--link">Cầu lông</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'2','idmtt' => '2'])}}" class="sub-menu-1--link">Bóng rỗ</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'2','idmtt' => '3'])}}" class="sub-menu-1--link">Quần vợt</a></i>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="{{route('categlory',['idlsp' =>'3','idmtt' => '0'])}}">Phụ kiện<i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'3','idmtt' => '1'])}}" class="sub-menu-1--link">Bóng đá</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'3','idmtt' => '9'])}}" class="sub-menu-1--link">Chạy</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'3','idmtt' => '5'])}}" class="sub-menu-1--link">Cầu lông</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'3','idmtt' => '2'])}}" class="sub-menu-1--link">Bóng rỗ</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'3','idmtt' => '3'])}}" class="sub-menu-1--link">Quần vợt</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'3','idmtt' => '7'])}}" class="sub-menu-1--link">Bơi lội</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'3','idmtt' => '6'])}}" class="sub-menu-1--link">Golf</a></i>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
</header> --}}


  {{-- header mới --}}
  <div class="overlay1 hidden"></div>
  <!-- mobile menu -->
  <div class="mobile-main-menu">
    @if(Auth::check() and Auth::user()->admin != 1)
    <div class="drawer-header">
      <a href="">
        <div class="drawer-header--auth">
          <div class="_object">
            <img src="{{asset(getLink('anh-dai-dien',Auth::user()->anh_dai_dien))}}" alt="" >
          </div>
          <div class="_body">
            {{ Auth::user()->ho_ten }}
          </div>
        </div>
      </a>
    </div>
    <ul class="ul-first-menu">
      <li>
        <a href="{{ route('accounts',Auth::user()->id) }}">Tài khoản của tôi</a>
      </li>
      <li>
        <a href="{{ route('accounts.getChangePassword',Auth::user()->id) }}">Đổi mật khẩu</a>
      </li>
      <li>
        <a href="{{ route('bill') }}">Đơn mua</a>
      </li>
      <li>
        <a href="{{ route('accounts.logout') }}">Đăng xuất</a>
      </li>
    </ul>
    @else
    <div class="drawer-header">
      <a href="">
        <div class="drawer-header--auth">
          <div class="_object">
            <img src="img/anh-dai-dien/no-avatar.jpg" alt="" >
          </div>
          <div class="_body">Đăng nhập
            <br>Nhận nhiều ưu đãi hơn
          </div>
        </div>
      </a>
    </div>
    <ul class="ul-first-menu">
      <li>
        <a href="{{ route('accounts.login') }}">Đăng nhập</a>
      </li>
      <li>
        <a href="{{ route('accounts.sign-up') }}" class="abc">Đăng kí</a>
      </li>
    </ul>
    @endif
    <div class="la-scroll-fix-infor-user">
      <div class="la-nav-menu-items">
        <div class="la-title-nav-items">
          <strong>Danh mục</strong>
        </div>
        <ul class="la-nav-list-items">
          <li class="ng-scope">
            <a href="">Trang chủ</a>
          </li>
          <li class="ng-scope">
            <a href="">Giới thiệu</a>
          </li>
          <li class="ng-scope ng-has-child1">
            <a href="{{route('products',['idlsp' =>'0','idmtt' => '0'])}}">Sản phẩm <i class="fas fa-plus cong"></i> <i class="fas fa-minus tru hidden"></i></a>
            <ul class="ul-has-child1">
              <li class="ng-scope ng-has-child2">
                <a href="{{route('products',['idlsp' =>'1','idmtt' => '0'])}}">Giày, dép <i class="fas fa-plus cong1" onclick="hienthi(1,`abc`)"></i> <i class="fas fa-minus tru1 hidden" onclick="hienthi(1,`abc`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc">
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'1','idmtt' => '1'])}}">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'1','idmtt' => '9'])}}">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'1','idmtt' => '5'])}}">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'1','idmtt' => '2'])}}">Bóng rỗ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'1','idmtt' => '3'])}}">Quần vợt</a>
                  </li>
                </ul>
              </li>
              <li class="ng-scope ng-has-child2" >
                <a href="{{route('products',['idlsp' =>'2','idmtt' => '0'])}}">Quần áo<i class="fas fa-plus cong2" onclick="hienthi(2,`abc2`)"></i> <i class="fas fa-minus tru2 hidden" onclick="hienthi(2,`abc2`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc2">
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'2','idmtt' => '1'])}}">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'2','idmtt' => '9'])}}">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'2','idmtt' => '5'])}}">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'2','idmtt' => '2'])}}">Bóng rỗ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'2','idmtt' => '3'])}}">Quần vợt</a>
                  </li>
                </ul>
              </li>
              <li class="ng-scope ng-has-child2">
                <a href="{{route('products',['idlsp' =>'3','idmtt' => '0'])}}">Phụ kiện <i class="fas fa-plus cong3" onclick="hienthi(3,`abc3`)"></i> <i class="fas fa-minus tru3 hidden" onclick="hienthi(3,`abc3`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc3">
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'3','idmtt' => '1'])}}">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'3','idmtt' => '9'])}}">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'3','idmtt' => '5'])}}">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'3','idmtt' => '2'])}}">Bóng rỗ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'3','idmtt' => '3'])}}">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'3','idmtt' => '7'])}}">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="{{route('products',['idlsp' =>'3','idmtt' => '6'])}}">Golf</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="ng-scope">
            <a href="">Tin tức</a>
          </li>
          <li class="ng-scope">
            <a href="{{ route('pages.contact') }}">Liên hệ</a>
          </li>
        </ul>
      </div>
    </div>
    <ul class="mobile-support">
      <li>
        <div class="drawer-text-support">Hỗ trợ</div>
      </li>
      <li>
        <i class="fas fa-phone-square-alt footer__item-icon">HOTLINE: </i>
        <a href="tel:19006750">19006750</a>
      </li>
      <li>
        <i class="fas fa-envelope-square footer__item-icon">Email: </i>
        <a href="mailto:support@sapo.vn">support@sapo.vn</a>
      </li>
    </ul>
  </div>
  <!-- end mobile menu -->
<header class="header">
    <div class="container">
      <div class="top-link clearfix hidden-sm hidden-xs">
        <div class="row">
          <div class="col-6 social_link">
            <div class="social-title">Theo dõi: </div>
            <a href=""><i class="fab fa-facebook" style="font-size: 24px; margin-right: 10px"></i></a>
            <a href=""><i class="fab fa-instagram" style="font-size: 24px; margin-right: 10px;color: pink;"></i></a>
            <a href=""><i class="fab fa-youtube" style="font-size: 24px; margin-right: 10px;color: red;"></i></a>
            <a href=""><i class="fab fa-twitter" style="font-size: 24px; margin-right: 10px"></i></a>
          </div>
          <div class="col-6 login_link">
            @if(Auth::check() and Auth::user()->admin != 1)
           <ul class="nav nav__first right m-auto">
              <li class="nav-item nav-item__first nav-item__first-user">
                @if(Auth::user()->anh_dai_dien != null)
                  <img src="{{asset(getLink('anh-dai-dien',Auth::user()->anh_dai_dien))}}" alt="" class="nav-item__first-img">
                @else
                <img src="https://i.pinimg.com/originals/fc/04/73/fc047347b17f7df7ff288d78c8c281cf.png" alt="" class="nav-item__first-img">
                @endif
                <span class="nav-item__first-name">{{ Auth::user()->ho_ten }}</span>
                <ul class="nav-item__first-menu">
                  <li class="nav-item__first-item">
                    <a href="{{ route('accounts',Auth::user()->id) }}">Tài khoản của tôi</a>
                  </li>
                  <li class="nav-item__first-item">
                    <a href="{{ route('accounts.getChangePassword',Auth::user()->id) }}">Đổi mật khẩu</a>
                  </li>
                  <li class="nav-item__first-item">
                    <a href="{{ route('bill') }}">Đơn mua</a>
                  </li>
                  <li class="nav-item__first-item">
                    <a href="{{ route('accounts.logout') }}">Đăng xuất</a>
                  </li>
                </ul>
              </li>
            </ul>
            @else
            <ul class="header_link right m-auto">
              <li>
                <a href="{{ route('accounts.login') }}"><i class="fas fa-sign-in-alt mr-3" ></i>Đăng nhập</a>
              </li>
              <li>
                <a href="{{ route('accounts.sign-up') }}"><i class="fas fa-user-plus mr-3" style="margin-left: 10px;"></i>Đăng kí</a>
              </li>
            </ul>
            @endif
          </div>
        </div>
      </div>
      <div class="header-main clearfix">
        <div class="row">
          <div class="col-lg-3 col-100-h">
              <div id="trigger-mobile" class="visible-sm visible-xs"><i class="fas fa-bars"></i></div>
              <div class="logo">
                <a href="">
                  <img src="img/logo/logomain.png" alt="" >
                </a>
              </div>
              <div class="mobile_cart visible-sm visible-xs">
                <a href="{{ route('cart.index') }}" class="header__second__cart--icon">
                  <i class="fas fa-shopping-cart"></i>
                  <span id="header__second__cart--notice" class="header__second__cart--notice">3</span>
                </a>
                @if(Auth::check() and Auth::user()->admin != 1)
                <a href="{{ route('listlike') }}" class="header__second__like--icon">
                  <i class="far fa-heart"></i>
                  <span id="header__second__like--notice" class="header__second__like--notice">3</span>
                </a>
                @else
                <a href="{{ route('accounts.login') }}" class="header__second__like--icon">
                  <i class="far fa-heart"></i>
                </a>
                @endif
              </div>
          </div>
          <div class="col-lg-6 m-auto pdt15">
            <form action="{{route('search')}}" method="get" class="example">
              <input id="searchInput" type="text" placeholder="Tìm kiếm..." class="input-search" name="search" value="{{Request::get('search')}}" autocomplete="off">
              <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="col-3 m-auto hidden-sm hidden-xs">
            <div class="item-car clearfix">
              <a href="{{ route('cart.index') }}" class="header__second__cart--icon">
                <i class="fas fa-shopping-cart"></i>
                <span id="header__second__cart--notice1" class="header__second__cart--notice"></span>
              </a>
            </div>
            <div class="item-like clearfix">
              @if(Auth::check() and Auth::user()->admin != 1)
              <a href="{{ route('listlike') }}" class="header__second__like--icon">
                <i class="far fa-heart"></i>
                <span id="header__second__like--notice1" class="header__second__like--notice"></span>
              </a>
              @else
              <a href="{{ route('accounts.login') }}" class="header__second__like--icon">
                <i class="far fa-heart"></i>
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="header_nav hidden-sm hidden-xs">
      <div class="container">
        <ul class="header_nav-list nav">
          <li class="header_nav-list-item "><a href="#">Trang chủ</a></li>
          <li class="header_nav-list-item"><a  href="">Giới thiệu</a></li>
          <li class="header_nav-list-item has-mega">
            <a href="{{route('products',['idlsp' =>'0','idmtt' => '0'])}}">Sản phẩm<i class="fas fa-angle-right" style="margin-left: 5px;"></i></a>
            <div class="mega-content" style="overflow-x: hidden;">
              <div class="row" >
                <ul class="col-8 no-padding level0">
                  <li class="level1">
                    <a class="hmega" href="{{route('products',['idlsp' =>'0','idmtt' => '0'])}}">Tất cả sản phẩm</a>
                    <!-- <ul class="level1">
                      <li class="level2"><a href="">Bóng đá</a></li>
                      <li class="level2"><a href="">Bóng đá</a></li>
                      <li class="level2"><a href="">Bóng đá</a></li>
                      <li class="level2"><a href="">Bóng đá</a></li>
                    </ul> -->
                  </li>
                  <li class="level1">
                    <a class="hmega" href="{{route('products',['idlsp' =>'1','idmtt' => '0'])}}">Giày, dép</a>
                    <ul class="level1">
                      <li class="level2"><a href="{{route('products',['idlsp' =>'1','idmtt' => '1'])}}">Bóng đá</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'1','idmtt' => '9'])}}">Chạy</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'1','idmtt' => '5'])}}">Cầu lông</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'1','idmtt' => '2'])}}">Bóng rổ</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'1','idmtt' => '3'])}}">Quần vợt</a></li>
                    </ul>
                  </li>
                  <li class="level1">
                    <a class="hmega" href="{{route('products',['idlsp' =>'2','idmtt' => '0'])}}">Quần, áo</a>
                    <ul class="level1">
                      <li class="level2"><a href="{{route('products',['idlsp' =>'2','idmtt' => '1'])}}">Bóng đá</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'2','idmtt' => '9'])}}">Chạy</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'2','idmtt' => '5'])}}">Cầu lông</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'2','idmtt' => '2'])}}">Bóng rổ</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'2','idmtt' => '3'])}}">Quần vợt</a></li>
                    </ul>
                  </li>
                  <li class="level1">
                    <a class="hmega" href="{{route('products',['idlsp' =>'3','idmtt' => '0'])}}">Phụ kiện</a>
                    <ul class="level1">
                      <li class="level2"><a href="{{route('products',['idlsp' =>'3','idmtt' => '1'])}}">Bóng đá</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'3','idmtt' => '9'])}}">Chạy</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'3','idmtt' => '5'])}}">Cầu lông</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'3','idmtt' => '2'])}}">Bóng rổ</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'3','idmtt' => '3'])}}">Quần vợt</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'3','idmtt' => '7'])}}">Bơi lội</a></li>
                      <li class="level2"><a href="{{route('products',['idlsp' =>'3','idmtt' => '6'])}}">Golf</a></li>
                    </ul>
                  </li>
                </ul>
                <div class="col-4">
                  <a href="">
                    <picture>
                      <img src="https://media.giphy.com/media/mj7HcKFq23oobJMcOG/giphy.gif" alt="" width="80%">
                    </picture>
                  </a>
                </div>
              </div>
            </div>
          </li>
          <li class="header_nav-list-item"><a href="#">Tin tức</a></li>
          <li class="header_nav-list-item"><a href="{{ route('pages.contact') }}">Liên hệ</a></li>
        </ul>
      </div>
    </nav>
  </header>