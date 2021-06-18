<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="referrer" content="origin"> --}}
    <title>P&T Shop</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- link font chữ -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <base href="{{asset('')}}">
    {{-- <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/new.css">
    <link rel="stylesheet" href="css/pay.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/productdetail.css"> --}}
    @yield('css')
    <link rel="icon" href="img/logo/main.png" type="image/x-icon"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
</head>
<body>
    <!-- header -->
    @include('master.header')
    <!-- end header -->
    <!-- content -->
    @yield('content')
    <!-- end content -->
    @include('master.footer')
    {{-- <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "103702638603235");
      chatbox.setAttribute("attribution", "biz_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v10.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script> --}}
    <div class="zalo-chat-widget" data-oaid="813275282970584175" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>

  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
</body>

  {{-- <script src="js/main.js"></script> --}}
  @yield('js')
  
  
</html>