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
                  <a href="{{ route('accounts.getChangePassword',Auth::user()->id) }}">Đổi mật khẩu</a>
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
        <form action="{{route('search')}}" class="header__second__search" method="get">
          <div class="header__second__search" style="margin-left:0px">
            <div class="header__second__search--input-wrap">
              <input id="searchInput" type="text" placeholder="Tìm kiếm..." class="header__second__search--input" name="search" value="{{Request::get('search')}}" autocomplete="off">
              <!-- search history -->
              <div class="header__second__search-history">
                <h3 class="header__second__search-history-heading">Lịch sử tìm kiếm</h3>
                <ul class="header__second__search-history-list" id="listHistorySearch">
                  <li class="header__second__search-history-item" style="cursor: pointer">
                    <div style="display:flex;justify-content: space-between;align-items: center;vertical-align: middle;">
                      <a href="">Adidas Original</a>
                      <i class="fas fa-trash-alt" style="font-size: 16px;"></i>
                    </div>
                  </li>
                  <li class="header__second__search-history-item">
                    <a href="">Adidas Original</a>
                  </li>
                </ul>
              </div>
            </div>
            <button class="header__second__search--btn" id="addHistorySearch" >
              <i class="fi-rs-search header__second__search--btn-icon"></i>
            </button>
          </div>
        </form>
        <div class="header__second__like">
          @if(Auth::check() and Auth::user()->admin != 1)
            <a href="{{ route('listlike') }}" class="header__second__like--icon"><i class="fi-rs-heart"></i></a>
          @else
          <a href="{{ route('accounts.login') }}" class="header__second__like--icon"><i class="fi-rs-heart"></i></a>
          @endif
        </div>
        <div class="header__second__cart">
          <a href="{{ route('cart.index') }}" class="header__second__cart--icon">
            <i class="fi-rs-shopping-bag"></i>
            <span class="header__second__cart--notice"><?php
              $contents = Cart::content();
              $i = 0;
            ?>
            @foreach($contents as $content)
              <?php $i++ ?>
            @endforeach
            {{ $i }}
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
            <a class="nav-link nav-link__third" href="{{route('categlory',['idlsp' =>'0','idmtt' => '0'])}}">Tất cả sản phẩm</a>
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
            <a class="nav-link nav-link__third" href="{{route('categlory',['idlsp' =>'4','idmtt' => '0'])}}">Quần áo <i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
                <li class="hover-me">  <a href="{{route('categlory',['idlsp' =>'4','idmtt' => '1'])}}" class="sub-menu-1--link">Bóng đá</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'4','idmtt' => '9'])}}" class="sub-menu-1--link">Chạy</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'4','idmtt' => '5'])}}" class="sub-menu-1--link">Cầu lông</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'4','idmtt' => '2'])}}" class="sub-menu-1--link">Bóng rỗ</a></i>
                </li>
                <li class="hover-me"><a href="{{route('categlory',['idlsp' =>'4','idmtt' => '3'])}}" class="sub-menu-1--link">Quần vợt</a></i>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Phụ kiện<i class="fi-rs-caret-down"></i></a>
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
          
          {{-- <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Các nhãn hiệu <i class="fi-rs-caret-down"></i></a>
            <div class="sub-menu-1">
              <ul>
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
          </li> --}}
          {{-- <li class="nav-item nav-item__third">
            <a class="nav-link nav-link__third" href="#">Tin tức</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </header>