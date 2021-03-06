<div id="mySidebar" class="main-sidebar">
    <div style="position: relative">
        <a class="brand-link" href="{{ route('admin.dashboards') }}">
            <img class ="logo" src="{{asset('img/logo/logomain.png')}}" alt="">
            <span class="brand-text">P&T Sport</span>
        </a>
        <button id="close-sidebar">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="sidebar">
    <nav>
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboards') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p class="nav-text">Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin/products">
            <i class="nav-icon fas fa-tshirt"></i>
            <p class="nav-text">Sản phẩm</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('nhasanxuat.index') }}">
            <i class="nav-icon fas fa-home"></i>
            <p class="nav-text">Nhà sản xuất</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('loaisanpham.index') }}">
            <i class="nav-icon fas fa-tshirt"></i>
            <p class="nav-text">Loại sản phẩm</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('monthethao.index')}}">
            <i class="nav-icon far fa-futbol"></i>
            <p class="nav-text">Môn thể thao</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.accounts') }}">
            <i class="nav-icon fas fa-user"></i>
            <p class="nav-text">Tài khoản</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.bill.index') }}">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p class="nav-text">Hóa Đơn</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.statistics') }}">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p class="nav-text">Thống kê</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('slideshow.index') }}">
            <i class="nav-icon fas fa-photo-video"></i>
            <p class="nav-text">Slideshow</p>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.blacklist.index') }}">
          <i class="nav-icon fas fa-radiation"></i>
          <p class="nav-text">Danh sách đen</p>
          </a>
      </li>
        </ul>
    </nav>
    </div>
</div>