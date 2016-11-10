<div class="calc-choice-blc calc-blc__noactive" id="calc-js-step1_2">  <!-- второй этап, при переходе убирается класс  calc-nav__noactive -->
    <div class="calc-btn-blc">
        <button class="calc-nav calc-nav__active" id="calc-js-step1_2-prev">  <!-- неактивная кнопка навигации между этапами -->
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
            <span class="calc-nav-text">вернуться к выбору деталей</span>
        </button>
    </div> <!-- /calc-btn-blc -->
    <div class="calc-title">Выберите конструкцию заготовки</div>
    @foreach($forms as $form)
        <div class="calc-choice-item" data-id="{{$form->id}}"
             data-pattern="@if(!empty($form->pattern_image)){{url('/').'/'.$form->pattern_image}}@endif"
             data-coast="{{$form->coast}}"
        >
            <div class="calc-choice-image"><img src="{{url('/').'/'.$form->image}}" alt=""></div>
            <span class="calc-choice-name">{{$form->name}}</span>
        </div>
    @endforeach
    <div class="calc-btn-blc">
        <button class="calc-nav calc-nav__noactive" id="calc-js-step1_2-next">
            <i class="fa fa-arrow-down" aria-hidden="true"></i>
            <span class="calc-nav-text">перейти к выбору декора</span>
        </button>
    </div> <!-- /calc-btn-blc -->
</div> <!-- /calc-choice-blc -->  <!-- конец второго этапа -->