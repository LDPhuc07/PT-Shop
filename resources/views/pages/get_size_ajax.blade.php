<div class="product__size">
  <div class="product__size-title">
    <span>Kích thước:</span>
  </div>
  <div class="select-swap">
    @foreach($size_by_first_color as $i)
    
      <div class="swatch-element">
        <input type="radio" class="variant-1" id="swatch-{{$i['kich_thuoc']}}" name="kich_thuoc" value="{{$i['kich_thuoc']}}" checked>
        <label for="swatch-{{$i['kich_thuoc']}}" class="sd"><span>{{$i->kich_thuoc}}</span></label>
      </div> 
    @endforeach
  </div>
</div>
<div id="product__amount" >
  <div class="product__wrap">
    <div class="product__amount">
      <label for="">Số lượng: </label>
      <input type="button" value="-" class="control" onclick="truSoLuong()">
      <input type="text" name="so_luong"  value="1" class="text-input" onkeypress='validate(event)' name="quantity" id="textsoluong"> 
      <input type="button" value="+" class="control" onclick="congSoLuong({{ $qty->so_luong }})">
    </div>
  </div>
  <div class="product__shopnow">
    @if($qty->so_luong > 0)
      <input value="Mua ngay" onclick="congSoLuong2()" type="button" id="buynow" class="shopnow">
      @if(Auth::check() and Auth::user()->admin != 1)
        <input value="Thêm vào giỏ" onclick="congSoLuong1()" type="button" id="addcart" class="add-cart">
      @else
        <input value="Thêm vào giỏ" type="button" id="addcart" class="add-cart" data-toggle="modal" data-target="#myModal" >
      @endif
    @else 
      <input value="Hết hàng" type="button" class="shopnow">
    @endif
  </div>
</div>