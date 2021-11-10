@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/news.css">
@endsection
@section('content')
 <!-- content -->
 <div class="container">
    <div class="content" style="height: 250px;box-shadow: 0 1px 6px 0 rgb(32 33 36 / 28%);text-align:center;margin-top: 50px;">
      <h1 style="margin-left: 20px;padding-top: 12px;">Đặt hàng thành công !</h1>
      
      <div>
        <i class="fas fa-check-circle" style="font-size:100px;text-align:center;color:greenyellow;margin-bottom: unset"></i>
      </div>
      <p style="margin-top: 5px;font-size: 12px;">Đơn hàng sẽ được giao trong 2 đến 7 ngày</p>
      <div>
        <a style="margin-left: 20px;font-size: 16px;" href="{{route('index')}}" class="btn btn-buynow">Tiếp tục mua hàng</a>
      </div>
    </div>
  </div>
<!-- end content -->
@endsection
@section('js')
@endsection