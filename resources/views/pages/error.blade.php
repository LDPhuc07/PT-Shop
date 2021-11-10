@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/news.css">
@endsection
@section('content')
 <!-- content -->
 <div class="container">
    <div class="content" style="height: 210px;box-shadow: 0 1px 6px 0 rgb(32 33 36 / 28%);text-align:center;margin-top: 50px;">
      <h1 style="margin-left: 20px;">Hình thức thanh toán online hiện đang lỗi,xin quý khách vui lòng chọn hình thức thanh toán trực tiếp!</h1>
      <div>
        <i class="fas fa-exclamation-circle" style="font-size:100px;text-align:center;color:rgb(151, 24, 24);margin-bottom: unset"></i>
      </div>
      <div>
        <a style="margin-left: 20px;font-size: 16px;" href="{{route('index')}}" class="btn btn-buynow">Tiếp tục mua hàng</a>
      </div>
    </div>
  </div>
<!-- end content -->
@endsection
@section('js')
@endsection