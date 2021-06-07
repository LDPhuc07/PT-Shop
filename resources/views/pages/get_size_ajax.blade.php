<div class="select-swap">
  @foreach($size_by_first_color as $i)
  
    <div class="swatch-element">
      <input type="radio" class="variant-1" id="swatch-{{$i['kich_thuoc']}}" name="kich_thuoc" value="{{$i['kich_thuoc']}}" checked>
      <label for="swatch-{{$i['kich_thuoc']}}" class="sd"><span>{{$i->kich_thuoc}}</span></label>
    </div> 
  @endforeach
</div>