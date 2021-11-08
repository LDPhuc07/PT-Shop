
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error1'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info_doi_mk_ad'))
    <style>
        .cls-stay {
            font-size: 18px;
        }
        .cls-stay a {
            color: #414c56;
        }
        .cls-logout {
            font-size: 18px;
            margin-left: 8px;
        }
        .cls-stay:hover a {
            color: black;
        }
    </style>
    <div class="alert alert-info alert-block">
        <button type="button" class="close cls-logout" ><a href="{{ route('admin.accounts.logout') }}">Đăng xuất</a></button>
        <button type="button" class="close cls-stay"><a href="{{ route('admin.dashboards') }}">Ở lại</a></button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('info_doi_mk'))
    <style>
        .cls-stay {
            font-size: 18px;
        }
        .cls-stay a {
            color: #414c56;
        }
        .cls-logout {
            font-size: 18px;
            margin-left: 8px;
        }
        .cls-stay:hover a {
            color: black;
        }
    </style>
    <div class="alert alert-info alert-block">
        <button type="button" class="close cls-logout" ><a href="{{ route('admin.accounts.logout') }}">Đăng xuất</a></button>
        <button type="button" class="close cls-stay"><a href="">Ở lại</a></button>
        <strong>{{ $message }}</strong>
    </div>
@endif