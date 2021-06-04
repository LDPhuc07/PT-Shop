<div class="select-swap">
    @foreach($size as $i)
    
      <div class="swatch-element">
        <input type="radio" class="variant-1" id="swatch-{{$i['kich_thuoc']}}" name="kich_thuoc" value="{{$i['kich_thuoc']}}" checked>
        <label onclick="myKichThuoc(`{{$mau_sp}}`,{{ $id_sp }},`{{$i['kich_thuoc']}}`)" for="swatch-{{$i['kich_thuoc']}}" class="sd"><span>{{$i->kich_thuoc}}</span></label>
      </div> 
    @endforeach
</div>