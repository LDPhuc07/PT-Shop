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
        <input value="Thêm vào giỏ" onclick="congSoLuong1()" type="button" id="addcart" class="add-cart">
    @else 
        <input value="Hết ngay" type="button" class="shopnow">
    @endif
</div>