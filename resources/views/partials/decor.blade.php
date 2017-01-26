<div class="calc-mobal-blc calc-js-modal-parent" id="calc-js-step1_3_modal">  <!-- модальное окно для выбора декора -->
    <div class="calc-modal-close">
        <i class="fa fa-times" aria-hidden="true"></i>
        ПОДТВЕРДИТЬ
    </div>
    <div class="calc-modal-inside">
        @foreach($decors as $decor)
            <div class="calc-modal-content">
                <div class="calc-modal-item" data-id="{{$decor->id}}"
                     data-series-id="{{$decor->decorCategory->id}}"
                     data-series-name="{{$decor->decorCategory->name}}">

                    <img src="{{url('/').'/css/img/galochka.png'}}" alt="" class="calc-modal-check">
                    <img src="{{url('/').'/'.$decor->thumb}}" class="calc-js-data_img" alt="" width="100%" height="100%">
                    <span class="calc-modal-name">{{$decor->name}} {{$decor->code}} ({{$decor->decorCategory->name}})</span>
                    <div class="calc-modal_hidden calc-modal_hidden_choice"><span class="calc-modal_choice-icon"></span> ВЫБРАТЬ</div>
                </div>
                <a class="calc-modal_hidden calc-modal_hidden_colorbox calc-js-colorbox" rel="colorbox-group" href="{{url('/').'/'.$decor->image}}">
                    <span class="calc-modal_search-icon"></span>
                    ПОСМОТРЕТЬ
                </a>
            </div>
        @endforeach
    </div>
</div> <!-- /calc-mobal-blc -->     <!-- конец модального окна для выбора декора -->