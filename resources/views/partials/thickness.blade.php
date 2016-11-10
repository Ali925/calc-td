<div class="calc-col50">
    <div class="calc-title">Выберите толщину</div>
    <div class="calc-param-blc">
        @foreach($thicknesses as $thickness)
            <div class="calc-radio">
                <input name="thick" type="radio" value="{{$thickness->id}}"
                       id="thick{{$thickness->id}}"
                       data-id="{{$thickness->id}}"
                       data-name="{{$thickness->value}}"
                >
                <label class="calc-radio-label" for="thick{{$thickness->id}}">{{$thickness->name}}</label>
            </div>
        @endforeach
    </div> <!-- /calc-param-blc -->
</div> <!-- /calc-col50 -->