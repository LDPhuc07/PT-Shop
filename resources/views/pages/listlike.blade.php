@extends('master.master')
@section('css')
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/productdetail.css">
@endsection
@section('content')
    <!-- content -->
    <div class="listlike" style="margin-top: 240px;">
        <div class="btn-edit" style="margin-bottom: 20px;display:flex;justify-content:flex-end">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="card" style="width: 100%">
                      <img class="card-img-top" src="./assets/img/product/addidas1.jpg" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title custom__name-product">
                          Card title Cardd title
                        </h5>
                        <div style="display:flex;justify-content: space-between;align-items: center;">
                        <p class="card-text price-color ">1,000,000 đ</p>
                        <a href="" class="icon-like" style="color: #000;
                        font-size: 20px;"><i class="far fa-heart"></i><i class="fas fa-heart"></i></a>
                         </div>
                        <div class="sale-off">
                          <span class="sale-off-percent">20%</span>
                          <span class="sale-off-label">GIẢM</span>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <!-- end content -->
@endsection
@section('js')
<script src="js/main.js"></script>
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
@endsection