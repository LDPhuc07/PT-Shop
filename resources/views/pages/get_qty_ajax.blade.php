<label for="">Số lượng: </label>
<input type="button" value="-" class="control" onclick="truSoLuong()">
<input type="text" name="so_luong"  value="1" class="text-input" onkeypress='validate(event)' name="quantity" id="textsoluong"> 
<input type="button" value="+" class="control" onclick="congSoLuong({{ $qty->so_luong }})">