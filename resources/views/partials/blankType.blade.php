<div class="calc-stage" id="calc-stage1"> <!-- первый экран -->
    <div class="calc-choice-blc calc-blc__noactive" id="calc-js-step1_1">  <!-- первый этап -->
        <div class="calc-title">Выберите тип заготовки</div>

        @foreach($blankTypes as $blankType)
            <div class="calc-choice-item" data-id="{{$blankType->id}}">
                <span class="calc-choice-name">{{$blankType->name}}</span>
            </div>
        @endforeach

        <div class="calc-btn-blc">
            <button class="calc-nav calc-nav__noactive" id="calc-js-step1_1-next">  <!-- кнопка перехода на второй этап, класс calc-nav__noactive меняется на calc-nav__active -->
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                <span class="calc-nav-text">перейти к выбору конструкций</span>
            </button>
        </div> <!-- /calc-btn-blc -->
    </div> <!-- /calc-choice-blc -->    <!-- конец первого этапа -->