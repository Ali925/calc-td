<div class="calc-mobal-blc calc-js-modal-parent" id="calc-js-step1_3_modal">  <!-- модальное окно для выбора декора -->
    <div class="calc-modal-close">
        <i class="fa fa-times" aria-hidden="true"></i>
        закрыть
    </div>
    <div class="calc-modal-inside">
        @foreach($decors as $decor)
            <div class="calc-modal-item" data-id="{{$decor->id}}"
                 data-series-id="{{$decor->decorCategory->id}}"
                 data-series-name="{{$decor->decorCategory->name}}"
            >
                <img src="{{url('/').'/css/img/galochka.png'}}" alt="" class="calc-modal-check">
                <div class="cub{{$decor->id}}"></div>
                <style>
                    .cub{{$decor->id}} { width:100px; height:100px; background: url({{url('/').'/'.$decor->image}}) center; background-size: cover; }
                </style>
                {{--<img src="@if(!empty($decor->image)){{url('/').'/'.$decor->image}}@endif" alt="">--}}
                <span class="calc-modal-name">{{$decor->name}} {{$decor->code}} ({{$decor->decorCategory->name}})</span>
            </div>
        @endforeach
    </div>
</div> <!-- /calc-mobal-blc -->     <!-- конец модального окна для выбора декора -->