<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <title>Document</title>
    <style>
        body {
            font-family:"Open Sans", Helvetica, Arial, sans-serif;
            color:#555;
            max-width:680px;
            margin:0 auto;
            padding:0 20px;
          }
          
          * {
            -webkit-box-sizing:border-box;
            -moz-box-sizing:border-box;
            box-sizing:border-box;
          }
          
          *:before, *:after {
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
          }
          
          .clearfix {
            clear:both;
          }
          
          .text-center {text-align:center;}
          
          a {
            color: tomato;
            text-decoration: none;
          }
          
          a:hover {
            color: #2196f3;
          }
          
          pre {
          display: block;
          padding: 9.5px;
          margin: 0 0 10px;
          font-size: 13px;
          line-height: 1.42857143;
          color: #333;
          word-break: break-all;
          word-wrap: break-word;
          background-color: #F5F5F5;
          border: 1px solid #CCC;
          border-radius: 4px;
          }
          
          .header {
            padding:20px 0;
            position:relative;
            margin-bottom:10px;
            
          }
          
          .header:after {
            content:"";
            display:block;
            height:1px;
            background:#eee;
            position:absolute; 
            left:30%; right:30%;
          }
          
          .header h2 {
            font-size:3em;
            font-weight:300;
            margin-bottom:0.2em;
          }
          
          .header p {
            font-size:14px;
          }
          
          
          
          #a-footer {
            margin: 20px 0;
          }
          
          .new-react-version {
            padding: 20px 20px;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);
            
            text-align: center;
            font-size: 14px;
            line-height: 1.7;
          }
          
          .new-react-version .react-svg-logo {
            text-align: center;
            max-width: 60px;
            margin: 20px auto;
            margin-top: 0;
          }
          
          
          
          
          
          .success-box {
            margin:50px 0;
            padding:10px 10px;
            border:1px solid #eee;
            background:#f9f9f9;
          }
          
          .success-box img {
            margin-right:10px;
            display:inline-block;
            vertical-align:top;
          }
          
          .success-box > div {
            vertical-align:top;
            display:inline-block;
            color:#888;
          }
          
          
          
          /* Rating Star Widgets Style */
          .rating-stars ul {
            list-style-type:none;
            padding:0;
            
            -moz-user-select:none;
            -webkit-user-select:none;
          }
          .rating-stars ul > li.star {
            display:inline-block;
            
          }
          
          /* Idle State of the stars */
          .rating-stars ul > li.star > i.fa {
            font-size:2.5em; /* Change the size of the stars */
            color:#ccc; /* Color on idle state */
          }
          
          /* Hover state of the stars */
          .rating-stars ul > li.star.hover > i.fa {
            color:#FFCC36;
          }
          
          /* Selected state of the stars */
          .rating-stars ul > li.star.selected > i.fa {
            color:#FF912C;
          }
    </style>
</head>
<body>
    
    <section class='rating-widget'>
      
      <!-- Rating Stars Box -->
      <div class='rating-stars text-center'>
        <ul id='stars'>
          <li class='star' title='Poor' data-value='1'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Fair' data-value='2'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Good' data-value='3'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Excellent' data-value='4'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='WOW!!!' data-value='5'>
            <i class='fa fa-star fa-fw'></i>
          </li>
        </ul>
      </div
      {{ $check_bills->id }}
      @if(empty($check_bills))
      1
      @endif
      <div class='success-box'>
        <div class='clearfix'></div>
        <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
        <div class='text-message'></div>
        <div class='clearfix'></div>
      </div>
      
      
      
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
          @if(Auth::check() and Auth::user()->admin != 1)
            checkRating({{ $check_rate->diem }});
          @endif

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function(){
              var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
             
              // Now highlight all the stars that's not after the current hovered star
              $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                  $(this).addClass('hover');
                }
                else {
                  $(this).removeClass('hover');
                }
              });
              
            }).on('mouseout', function(){
              $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
              });
            });
            
            
            /* 2. Action to perform on click */
            @if(Auth::check() and Auth::user()->admin != 1)
            $('#stars li').on('click', function(){
              var onStar = parseInt($(this).data('value'), 10); // The star currently selected
              var stars = $(this).parent().children('li.star');
              
              for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
              }
              
              for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
              }
              
              // JUST RESPONSE (Not needed)
              var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
              var msg = "";
              if (ratingValue > 1) {
                  msg = "Thanks! You rated this " + ratingValue + " stars.";
              }
              else {
                  msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
              }
                $.ajax({
                  url:"rating/create/" + ratingValue + "/" + 3 + "/" + 1,
                  method: "GET",
  
                  success:function(data) {
                      if(data == 'done') {
                          responseMessage(msg);
                      }
                      else {
                          msg = "L???i ????nh gi??";
                          responseMessage(msg);
                      }
                  }
                });
            });
            @else
                var msg = "Vui l??ng ????ng nh???p ????? ????nh gi??";
                responseMessage(msg);
              @endif
          });
          
          function checkRating(onStar) {
            var stars = $('#stars li').parent().children('li.star');
            console.log(onStar);

            for (i = 0; i < onStar; i++) {
              $(stars[i]).addClass('selected');
            }
          }
          
          function responseMessage(msg) {
            $('.success-box').fadeIn(200);  
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
          }
    </script>
</body>
</html>