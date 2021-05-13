<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="justify-content: space-between;">
    <ul class="navbar-nav">
    <li class="nav-item">
        <button id="sidebar-link" class="nav-link"><i class="fas fa-bars"></i></button>
    </li>
    <li class="nav-item">
        <a href="admin/dashboards" class="nav-link">Home</a>
    </li>
    
    </ul>  
    <ul class="navbar-nav" style="margin-right: 100px">
        @if(Auth::check()) 
        <li class="nav-item">
            <a class="nav-link">{{ Auth::user()->ho_ten }}</a>
        </li> 
        <li class="nav-item">
            <a href="admin/logout" class="nav-link">Đăng xuất</a>
        </li>
     @else
        <li class="nav-item">
            <a href="admin/login" class="nav-link">Đăng nhập</a>
        </li>
    @endif
    </ul> 
</nav>