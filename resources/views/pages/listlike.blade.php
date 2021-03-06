@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/productdetail.css">
@endsection
@section('content')
    <!-- content -->
    <div class="listlike">
        <div class="container">
          @if($dem_yeu_thich > 0)
            <div id="have-like-div" class="row">
              @foreach($likes as $like)
                <div style="margin-top: 20px" id="pro-like-item-{{ $like->san_phams_id }}" class="col-lg-3 col-md-6 col-sm-12 mb-20">
                  <a href="{{route('product_detail',['id'=>$like->san_phams_id])}}" class="product__new-item">
                    <div class="card" style="width: 100%">
                      @foreach($like->sanPham->anh as $anh)
                        <img class="card-img-top" src="{{asset($anh->link)}}" alt="Card image cap">
                      @endforeach
                      <div class="card-body">
                        <h5 class="card-title custom__name-product">
                          {{ $like->sanPham->ten_san_pham }}
                        </h5>
                        <div class="product__price" id="price">
                          <p class="card-text price-color product__price-new">{{number_format($like->sanPham->gia_ban*(100-$like->sanPham->giam_gia)/100,0,',','.').' '.'VNĐ'}}</p>
                          <p  data-id="{{$like->sanPham->giam_gia}}"  class="card-text price-color product__price-old">{{number_format($like->sanPham->gia_ban,0,',','.').' '.'VNĐ'}}</p>
                        </div>
                        <div style="display:flex;justify-content: space-between;align-items: center;">
                          <a onclick="dislike({{ $like->san_phams_id }},{{ $like->tai_khoans_id }})" class="icon-like" style="color: #000;
                          font-size: 20px;"><i class="fas fa-heart"></i></a>
                        </div>
                        <div class="sale-off" data-id="{{$like->sanPham->giam_gia}}">
                          <span class="sale-off-percent">{{$like->sanPham->giam_gia}}%</span>
                          <span class="sale-off-label">GIẢM</span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div> 
              @endforeach
            </div>
            <div id="have-not-like-div" class="row" style="display:none; padding: 8% 0">
              <div class="col-12">
                <h1 style="text-align:center">Các sản phẩm được thêm vào danh sách yêu thích của bạn sẽ được lưu trữ ở đây</h1>
              </div>
            </div>
          @else
            {{-- layout khi chưa có sản phẩm --}}
            <div class="row" style="padding: 8% 0">
              <div class="col-12">
                <h1 style="text-align:center">Các sản phẩm được thêm vào danh sách yêu thích của bạn sẽ được lưu trữ ở đây</h1>
              </div>
            </div>
            {{-- end layout --}}
          @endif
            
            {{-- <nav aria-label="Page navigation example" style="display:flex;justify-content: center;font-size: 20px;margin-top: 50px">
                  <ul class="pagination">
                    {!! $likes->appends(request()->query())->links() !!}
                  </ul>
                </nav> --}}
        </div>
    </div>
    <!-- end content -->
@endsection
@section('js')
      <script>
        function congSoLuong(){
          var result = document.getElementById('textsoluong').value;
          document.getElementById('textsoluong').value = parseInt(result) + 1;
        }
        function truSoLuong(){
          var result = document.getElementById('textsoluong').value;
          if(parseInt(result)>1){
            document.getElementById('textsoluong').value = parseInt(result) - 1;
          }
          
        }
  </script>
  <script>
    function dislike(sp_id, tk_id) {
      $.ajax({
        url: 'dislike/'+sp_id+"/"+tk_id,
        method: "GET",

        success:function(data) {
          if(data > 0) {
            $(`#pro-like-item-${sp_id}`).hide();
          }
          else { 
            $("#have-not-like-div").css("display", "block");
            $("#have-like-div").css("display", "none");
          }
          var like_header = parseInt($(`#header__second__like--notice`).text());
          like_header--;
          $(`#header__second__like--notice`).html(like_header.toString());

          var like_header1 = parseInt($(`#header__second__like--notice1`).text());
          like_header1--;
          $(`#header__second__like--notice1`).html(like_header1.toString());
        }
      });
    }
  </script>
<script>
    function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
  </script>
  <script>
    $(document).ready(function() {
      var divGiamGia = $('.card-body').children('.sale-off');
      $.each(divGiamGia, function(i,v){
        console.log($(v).attr('data-id'));
        if(!Number($(v).attr('data-id')))
        {
          $(v).css('display','none');
        }
      });
    });
</script>
<script>
  $(document).ready(function() {
    var divGiamGia = $('.card-body').children('.sale-off');
    console.log(divGiamGia);
    $.each(divGiamGia, function(i,v){
      if(!Number($(v).attr('data-id')))
      {
        $(v).css('display','none');
      }
    });
  });
</script>
<script>
$(document).ready(function() {
    var pGiamGia = $('.product__price').children('.product__price-old');
    console.log(pGiamGia);
    $.each(pGiamGia, function(i,v){
      if(!Number($(v).attr('data-id')))
      {
        $(v).css('display','none');
      }
    });
  });
</script>
@endsection