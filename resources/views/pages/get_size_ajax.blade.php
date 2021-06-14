<div class="product__size">
  <div class="select-swap">
    @foreach($size_by_first_color as $i)
    
      <div class="swatch-element">
        <input type="radio" class="variant-1" id="swatch-{{$i['kich_thuoc']}}" name="kich_thuoc" value="{{$i['kich_thuoc']}}" checked>
        <label for="swatch-{{$i['kich_thuoc']}}" class="sd"><span>{{$i->kich_thuoc}}</span></label>
      </div> 
    @endforeach
  </div>
</div>
<div class="product__wrap">
  <div id="product__amount" class="product__amount">
    <label for="">Số lượng: </label>
    <input type="button" value="-" class="control" onclick="truSoLuong()">
    <input type="text" name="so_luong"  value="1" class="text-input" onkeypress='validate(event)' name="quantity" id="textsoluong"> 
    <input type="button" value="+" class="control" onclick="congSoLuong({{ $qty->so_luong }})">
  </div>
  <button class="likenow">Thêm vào danh sách thích</button>
  
</div>