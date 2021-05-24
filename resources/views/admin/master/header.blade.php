{{--  <div class="main-header">
    <ul class="header-btn">
    <li class="header-item-btn">
        <button id="sidebar-link" class="nav-link"><i class="fas fa-bars"></i></button>
    </li>
    <li class="nav-item">
        <a href="admin/dashboards" class="nav-link">Home</a>
    </li>
    @if(Auth::check()) 
        <li id="account-nav" class="nav-item">
            <a class="nav-link">{{ Auth::user()->ho_ten }}</a>
            <ul id="account-popover" class="popover account-popover">
                <li><a href="{{ route('admin.accounts.edit', Auth::user()->id) }}">Quản lý tài khoản</a></li>
                <li><a href="{{ route('admin.changPassword', Auth::user()->id) }}">Đổi mật khẩu</a></li>
                <li><a href="admin/logout">Đăng xuất</a></li>
            </ul>
        </li> 
     @else
        <li class="nav-item">
            <a href="admin/login" class="nav-link">Đăng nhập</a>
        </li>
    @endif
    </ul>  
</div>  --}}

{{--  <div>
    <ul>
        <li><button><i class="fas fa-bars"></i></button></li>
        <li>Trang chủ</li>
        @if(Auth::check()) 
        <li id="account-nav" >
            <a>{{ Auth::user()->ho_ten }}</a>
            <ul id="account-popover" class="popover account-popover">
                <li><a href="{{ route('admin.accounts.edit', Auth::user()->id) }}">Quản lý tài khoản</a></li>
                <li><a href="{{ route('admin.changPassword', Auth::user()->id) }}">Đổi mật khẩu</a></li>
                <li><a href="admin/logout">Đăng xuất</a></li>
            </ul>
        </li> 
     @else
        <li>
            <a href="admin/login" class="nav-link">Đăng nhập</a>
        </li>
    @endif
    </ul>
</div>  --}}
<div class="header">
    <div class="header-btn">
        <button class="p-15" id="sidebar-link">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="header-btn"><a class="p-15" href="">Trang chủ</a></div>
    @if(Auth::check() and Auth::user()->admin != 0) 
        <div class="header-btn account-btn">
            <button class="p-15" id="account-nav">{{ Auth::user()->ho_ten }}</button>
            <ul id="account-popover" class="popover account-popover">
                <li><a href="{{ route('admin.accounts.edit', Auth::user()->id) }}">Quản lý tài khoản</a></li>
                <li><a href="{{ route('admin.changPassword', Auth::user()->id) }}">Đổi mật khẩu</a></li>
                <li><a href="{{ route('admin.accounts.logout') }}">Đăng xuất</a></li>
            </ul>
        </div> 
     @else
        <div class="header-btn account-btn">
            <a href="{{ route('admin.accounts.login') }}" class="p-15">Đăng nhập</a>
        </div>
    @endif
</div>