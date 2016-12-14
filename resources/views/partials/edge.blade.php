<div class="calc-mobal-blc calc-js-modal-parent" id="calc-js-step2_3_modal">  <!-- модальное окно для выбора кромок -->
    <div class="calc-modal-close">
        <i class="fa fa-times" aria-hidden="true"></i>
        закрыть
    </div>
    <div class="calc-modal-inside">
        @foreach($edges as $edge)
            <div class="calc-modal-item" data-id="{{$edge->id}}" data-code="{{$edge->code}}"
                 data-series-id="{{$edge->edgeCategory->id}}">  <!-- выбранный элемент -->
                <img src="{{url('/').'/css/img/galochka.png'}}" alt="" class="calc-modal-check">
                <div class="edge">
                    <img src="{{url('/').'/'.$edge->image}}" alt="">
                </div>


                <span class="calc-modal-name">{{$edge->name}} {{$edge->code}} ({{$edge->edgeCategory->name}})</span>
            </div>
        @endforeach
            <style>
                .edge{ width:155px; height:155px; overflow: hidden }
            </style>
    </div>
</div> <!-- /calc-mobal-blc -->     <!-- конец модального окна для выбора кромок -->