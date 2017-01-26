<div class="calc-mobal-blc calc-js-modal-parent" id="calc-js-step2_3_modal">  <!-- модальное окно для выбора кромок -->
    <div class="calc-modal-close">
        <i class="fa fa-times" aria-hidden="true"></i>
        ПОДТВЕРДИТЬ
    </div>
    <div class="calc-modal-inside">
        @foreach($edges as $edge)
            <div class="calc-modal-content">
                <div class="calc-modal-item" data-id="{{$edge->id}}" data-code="{{$edge->code}}"
                     data-series-id="{{$edge->edgeCategory->id}}">  <!-- выбранный элемент -->
                    <img src="{{url('/').'/css/img/galochka.png'}}" alt="" class="calc-modal-check">
                    <img src="{{url('/').'/'.$edge->thumb}}" alt="" class="calc-js-data_img">
                    <span class="calc-modal-name">{{$edge->name}} {{$edge->code}} ({{$edge->edgeCategory->name}})</span>
                    <div class="calc-modal_hidden calc-modal_hidden_choice"><span class="calc-modal_choice-icon"></span> ВЫБРАТЬ</div>
                </div>
                <a class="calc-modal_hidden calc-modal_hidden_colorbox calc-js-colorbox" rel="colorbox-group" href="{{url('/').'/'.$edge->image}}">
                    <span class="calc-modal_search-icon"></span>
                    ПОСМОТРЕТЬ
                </a>
            </div>
        @endforeach
    </div>
</div> <!-- /calc-mobal-blc -->     <!-- конец модального окна для выбора кромок -->