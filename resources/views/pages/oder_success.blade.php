@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/news.css">
@endsection
@section('content')
 <!-- content -->
 <div class="container">
    <div class="content" style="height: 100px;box-shadow: 0 1px 6px 0 rgb(32 33 36 / 28%);margin-top: 200px;margin-bottom:200px;text-align:center">
      <h1 style="margin-left: 20px;">Đặt hàng thành công !</h1>
      <a style="margin-left: 20px;font-size: 16px;" href="{{route('index')}}">Tiếp tục mua hàng</a>
    </div>
  </div>
<!-- end content -->
@endsection
@section('js')
@endsection