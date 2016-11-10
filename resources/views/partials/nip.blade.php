<div class="calc-col50">
    <div class="calc-title">
        Выберите завал
        <span class="calc-help-blc">
                 <i class="fa fa-question-circle" aria-hidden="true"></i>
                 <span class="calc-help-text"><span class="calc-bold">Завал</span> -  закругление (загиб) пластика радиусом 8 мм с рабочей поверхности столешницы/детали 38 мм на ее торец</span>
               </span>
    </div>
    <div class="calc-param-blc">

        @foreach($nips as $nip)
            <div class="calc-radio">
                <input name="zaval" type="radio"
                       value="{{$nip->id}}"
                       id="zaval{{$nip->id}}"
                       data-id="{{$nip->id}}"
                       data-name-nip="{{$nip->value}}"
                >
                <label class="calc-radio-label" for="zaval{{$nip->id}}">
                    {{$nip->name}}
                    @if(!empty($nip->description))
                        <span class="calc-help-blc">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            <span class="calc-help-text"><span class="calc-bold">{{$nip->value}} ({{$nip->name}})
                                                </span> {{$nip->description}}</span>
                                        </span>
                    @endif
                </label>
            </div>
        @endforeach
    </div> <!-- /calc-param-blc -->
</div> <!-- /calc-col50 -->