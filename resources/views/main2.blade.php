<div class="calc-wrapper">
    <div class="calc-top calc-clearfix">
        <h1>Калькулятор</h1>
        <div class="calc-name" id="calc-js-current">Деталь № <span class="calc-special" id="calc-js-current-number">222</span></div>
        @include('partials.toplinks')

    </div>  <!-- /calc-top -->

    <div class="calc-step-blc">  <!-- блок с линией  -->
        <a href="#" class="calc-step calc-step1 calc-step__active" id="calc-js-view1">1 <br>шаг</a>  <!-- при переходе добавить класс calc-step__active -->
        <a href="#" class="calc-step calc-step2" id="calc-js-view2">2<br>шаг</a>
        <a href="#" class="calc-step calc-step3" id="calc-js-view3">3<br>шаг</a>
        <a href="#" class="calc-step calc-step4" id="calc-js-view4">4<br>шаг</a>
        <div class="calc-way calc-way__full"></div>
        <div class="calc-way calc-way__progress" id="calc-js-progress"></div>
        <!-- к calc-way__progress добавляются классы для показа пути первого экрана: 2 этап calc-way__progress__1-1, 3 этап - calc-way__progress__1-2 -->
    </div> <!-- /calc-step-blc -->

    @include('partials.blankType')

    @include('partials.form')

    <div class="calc-choice-blc calc-blc__noactive" id="calc-js-step1_3">  <!-- третий этап, при переходе убирается класс  calc-nav__noactive -->
        <div class="calc-btn-blc">
            <button class="calc-nav calc-nav__active" id="calc-js-step1_3-prev">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                <span class="calc-nav-text">вернуться к выбору конструкций</span>
            </button>
        </div> <!-- /calc-btn-blc -->

        <div class="calc-decor-blc" id="calc-js-decor_block"> <!-- блок для показа выбранного декора -->
            <div class="calc-choice-item calc-choice-item__active">
                <div class="calc-choice-image"><img src="image/decor1.jpg" alt="" id="calc-js-decor_img"></div> <!-- блок для картинки -->
                <span class="calc-choice-name" id="calc-js-decor_name">414 Т кашемир белый</span>   <!-- блок для названия -->
            </div>
        </div>  <!-- конец блока для показа выбранного декора -->
        <div class="calc-btn" id="calc-js-open-decor-modal">Выберите декор</div>
        <div class="calc-btn-blc">
            <input name="" type="button" value="Далее" class="calc-btn calc-btn__noactive" id="calc-js-step1_3-next">  <!-- неактивная кнопка перехода на другой экран, при удалении класса становится обычной, при добавлении класса calc-btn__active активное состояние -->
        </div> <!-- /calc-btn-blc -->
    </div> <!-- /calc-btn-blc -->
</div>  <!-- /calc-stage1 -->    <!-- конец первого экрана -->

<div class="calc-stage" id="calc-stage2">   <!-- второй экран -->
    <div class="calc-choice-blc calc-blc__noactive" id="calc-js-step2_1">  <!-- первый этап второго экрана -->
        <div class="calc-btn-blc">
            <button class="calc-nav calc-nav__active" id="calc-js-step2_1-prev">  <!-- неактивная кнопка навигации между этапами -->
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                <span class="calc-nav-text">вернуться к выбору декора</span>
            </button>
        </div> <!-- /calc-btn-blc -->
        <div class="calc-title">Выберите параметры</div>
        <div class="calc-row calc-clearfix">
            <div class="calc-col50">
                <div class="calc-title">Выберите ширину</div>
                <div class="calc-param-blc">
                    <div class="calc-param-item">min <span class="calc-special" id="calc-js-width_info_min">600 mm</span></div>
                    <div class="calc-param-item">
                        <input name="" class="calc-field calc-slider-amount" readonly type="text" id="calc-js-width_value">
                    </div>
                    <div class="calc-param-item">max <span class="calc-special" id="calc-js-width_info_max">1200 mm</span></div>
                </div><!-- /calc-param-blc -->
                <div class="calc-param-blc">
                    <div class="calc-slider-range" id="calc-js-width_slider"></div>
                </div><!-- /calc-param-blc -->
            </div><!-- /calc-col50 -->
            <div class="calc-col50">
                <div class="calc-title">Выберите длину</div>
                <div class="calc-param-blc">
                    <div class="calc-param-item">min <span class="calc-special" id="calc-js-length_info_min">600 mm</span></div>
                    <div class="calc-param-item">
                        <input type="text" class="calc-slider-amount calc-field" readonly id="calc-js-length_value">
                    </div>
                    <div class="calc-param-item">max <span class="calc-special" id="calc-js-length_info_max">1200 mm</span></div>
                </div> <!-- /calc-param-blc -->
                <div class="calc-param-blc">
                    <div class="calc-slider-range" id="calc-js-length_slider"></div>
                </div><!-- /calc-param-blc -->
            </div> <!-- /calc-col50 -->
        </div> <!-- /calc-row -->

        <div class="calc-row calc-clearfix">
            @include('partials.thickness')
            @include('partials.nip')
        </div> <!-- /calc-row -->

        <div class="calc-btn-blc">
            <button class="calc-nav calc-nav__active" id="calc-js-step2_1-next">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                <span class="calc-nav-text">перейти к чертежу</span>
            </button>
        </div> <!-- /calc-btn-blc -->
    </div>  <!-- конец первого этапа второго экрана -->

    <div class="calc-choice-blc calc-blc__noactive" id="calc-js-step2_2">   <!-- второй этап второго экрана -->
        <div class="calc-btn-blc">
            <button class="calc-nav calc-nav__active" id="calc-js-step2_2-prev">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                <span class="calc-nav-text">вернуться к выбору параметров</span>
            </button>
        </div> <!-- /calc-btn-blc -->

        <div class="calc-draft-blc">

            @include('partials.pattern.angle4')

            @include('partials.pattern.side1')

            @include('partials.pattern.angle1')

            @include('partials.pattern.side4')

            @include('partials.pattern.side2')

            @include('partials.pattern.angle3')

            @include('partials.pattern.side3')

            @include('partials.pattern.angle2')

            <div class="calc-draft">
                <canvas id="calc-js-canvas" width="778" height="538"></canvas>
                <!-- <img src="image/draft-hor.png" alt=""> -->
            </div>   <!-- вставка чертежа -->

        </div> <!-- /calc-draft-blc -->
        <div class="calc-btn-blc">
            <button class="calc-nav calc-nav__active" id="calc-js-step2_2-next">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                <span class="calc-nav-text">перейти к кромке</span>
            </button>
        </div> <!-- /calc-btn-blc -->
    </div> <!-- /calc-choice-blc -->  <!-- конец второго этапа второго экрана -->

    <div class="calc-choice-blc calc-blc__noactive" id="calc-js-step2_3">  <!-- третий этап второго экрана -->
        <div class="calc-btn-blc">
            <button class="calc-nav calc-nav__active" id="calc-js-step2_3-prev">  <!-- неактивная кнопка навигации между этапами -->
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                <span class="calc-nav-text">вернуться к чертежу</span>
            </button>
        </div> <!-- /calc-btn-blc -->
        <div class="calc-title">Выберите кромку</div>
        <div class="calc-row calc-clearfix">

            <div class="calc-col25 calc-js-border-side" data-opt="side1">
                <div class="calc-title">Сторона1</div>
                <div class="calc-edge-blc calc-js-border-info calc-hidden"> <!-- блок для показа выбранной кромки -->
                    <div class="calc-choice-item calc-choice-item__active">
                        <div class="calc-choice-image"><img src="image/decor1.jpg" alt="" class="calc-js-border-img"></div> <!-- блок для картинки -->
                        <span class="calc-choice-name calc-js-border-name">414 Т кашемир белый</span>   <!-- блок для названия -->
                    </div>
                </div>  <!-- конец блока для показа выбранного декора -->
                <div class="calc-btn calc-js-border-btn" data-opt="side1">Выберите кромку</div>
                <div class="calc-data calc-js-border-msg"></div>
            </div>

            <div class="calc-col25 calc-js-border-side" data-opt="side2">
                <div class="calc-title">Сторона2</div>
                <div class="calc-edge-blc calc-js-border-info calc-hidden"> <!-- блок для показа выбранного декора -->
                    <div class="calc-choice-item calc-choice-item__active">
                        <div class="calc-choice-image"><img src="image/decor1.jpg" alt="" class="calc-js-border-img"></div> <!-- блок для картинки -->
                        <span class="calc-choice-name calc-js-border-name">414 Т кашемир белый</span>   <!-- блок для названия -->
                    </div>
                </div>  <!-- конец блока для показа выбранного декора -->
                <div class="calc-btn calc-js-border-btn" data-opt="side2">Выберите кромку</div>
                <div class="calc-data calc-js-border-msg"></div>
            </div>
            <div class="calc-col25 calc-js-border-side" data-opt="side3">
                <div class="calc-title">Сторона3</div>
                <div class="calc-edge-blc calc-js-border-info calc-hidden"> <!-- блок для показа выбранного декора -->
                    <div class="calc-choice-item calc-choice-item__active">
                        <div class="calc-choice-image"><img src="image/decor1.jpg" alt="" class="calc-js-border-img"></div> <!-- блок для картинки -->
                        <span class="calc-choice-name calc-js-border-name">414 Т кашемир белый</span>   <!-- блок для названия -->
                    </div>
                </div>  <!-- конец блока для показа выбранного декора -->
                <div class="calc-btn calc-js-border-btn" data-opt="side3">Выберите кромку</div>
                <div class="calc-data calc-js-border-msg"></div>
            </div>
            <div class="calc-col25 calc-js-border-side" data-opt="side4">
                <div class="calc-title">Сторона4</div>
                <div class="calc-edge-blc calc-js-border-info calc-hidden"> <!-- блок для показа выбранного декора -->
                    <div class="calc-choice-item calc-choice-item__active">
                        <div class="calc-choice-image"><img src="image/decor1.jpg" alt="" class="calc-js-border-img"></div> <!-- блок для картинки -->
                        <span class="calc-choice-name calc-js-border-name">414 Т кашемир белый</span>   <!-- блок для названия -->
                    </div>
                </div>  <!-- конец блока для показа выбранного декора -->
                <div class="calc-btn calc-js-border-btn" data-opt="side4">Выберите кромку</div>
                <div class="calc-data calc-js-border-msg"></div>
            </div>
        </div>
        <div class="calc-btn-blc">
            <button class="calc-info-btn calc-info-btn__active" id="btn-edges_reset">
                <i class="fa fa-refresh" aria-hidden="true"></i>
                <span class="calc-nav-text">Сбросить кромки</span>
            </button>
        </div> <!-- calc-btn-blc -->
        <div class="calc-btn-blc">
            <input name="" type="button" value="Далее" class="calc-btn calc-btn__noactive" id="calc-js-step2_3-next">
        </div> <!-- /calc-btn-blc -->
    </div>  <!-- конец третьего этап второго экрана -->
</div>  <!-- /calc-stage2 -->   <!-- конец второго экрана -->

<div class="calc-stage" id="calc-stage3"> <!-- третий экран -->
    <div class="calc-title">Заказ № <span class="calc-special">1</span></div>

    <div class="calc-info-blc">  <!-- блок результатов  -->

        <!-- сюда вывод блока результатов по отдельной детали -->
        <div id="calc-js-result-list"></div>
        <div class="calc-btn-blc">
            <button class="calc-info-btn" id="calc-js-result-add">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span class="calc-nav-text">Добавить деталь</span>
            </button>
        </div> <!-- /calc-btn-blc -->

    </div> <!-- /calc-info-blc -->

    <div class="calc-result-blc">
        <div class="calc-result-item calc-clearfix">
            <div class="calc-col50">Итого стоимость обработки</div>
            <div class="calc-col50 calc-result-number" id="calc-js-result-elem_price">33333 руб.</div>
        </div> <!-- /calc-result-item -->
        <div class="calc-result-item calc-clearfix">
            <div class="calc-col50">Итого стоимость детали</div>
            <div class="calc-col50 calc-result-number" id="calc-js-result-raw_price">33333 руб.</div>
        </div> <!-- /calc-result-item -->
        <div class="calc-result-item calc-clearfix">
            <div class="calc-col50">Итого стоимость упаковки</div>
            <div class="calc-col50 calc-result-number" id="calc-js-result-pack_price">33333 руб.</div>
        </div> <!-- /calc-result-item -->
        <div class="calc-result-item calc-clearfix calc-special">
            <div class="calc-col50">Итого стоимость заказа</div>
            <div class="calc-col50 calc-result-number" id="calc-js-result-full_price">33333 руб.</div>
        </div> <!-- /calc-result-item -->
    </div> <!-- /calc-result-blc -->

    <div class="calc-btn-blc">
        <input name="" type="button" value="Подтвердить" class="calc-btn calc-btn__active">
        <input name="" type="button" value="Распечатать" class="calc-btn calc-btn__noactive">
    </div> <!-- /calc-btn-blc -->

    <div class="calc-btn-blc">
        <input name="" type="button" value="Перейти к оформлению заказа" class="calc-btn calc-btn__noactive" id="calc-js-step3-next">
    </div> <!-- /calc-btn-blc -->
</div>  <!-- /calc-stage3 -->     <!-- конец третьего экрана -->

<div class="calc-stage" id="calc-stage4">    <!-- четвертый экран -->
    <div class="calc-title">Введите данные</div>
    <div class="calc-form-blc">
        <form method="post" action="https://test.paysecure.ru/pay/order.cfm">
            @foreach($configPayments as $payment)
                <INPUT TYPE="HIDDEN" NAME="{{$payment->option}}" VALUE="{{$payment->value}}">
            @endforeach

            <INPUT TYPE="HIDDEN" NAME="OrderNumber" VALUE="">
            <INPUT TYPE="HIDDEN" NAME="OrderAmount" VALUE="">
            <div class="calc-form-item">
                <input name="FirstName" class="calc-field" placeholder="Введите Имя">
            </div> <!-- /calc-form-item -->
            <div class="calc-form-item">
                <input name="LastName" class="calc-field" placeholder="Введите фамилию">
            </div> <!-- /calc-form-item -->
            <div class="calc-form-item">
                <input name="Email" class="calc-field" placeholder="Введите email">
            </div>
            <div class="calc-form-item">
                <input name="MobilePhone" class="calc-field" placeholder="Введите телефон">
            </div> <!-- /calc-form-item -->
        </form>
    </div> <!-- /calc-form-blc -->
    <div class="calc-btn-blc">
        <input name="" type="button" value="Назад" class="calc-btn calc-btn__active" id="calc-js-step4-prev">
        <input name="" type="button" value="Завершить" class="calc-btn calc-btn__noactive">
    </div> <!-- /calc-btn-blc -->
</div>  <!-- /calc-stage4 -->  <!-- конец четвертого экрана -->

<!-- модальные окно -->
<div class="calc-modal-bg"></div>  <!-- блок для затемнения, общий для модальных окон -->

@include('partials.decor')

@include('partials.edge')

<div class="calc-modal-load">   <!-- загрузка -->
    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
    <span class="sr-only">Loading...</span>
</div>

<div class="calc-modal-message calc-js-modal-parent" id="calc-js-message-modal">
    <div class="calc-modal-close">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <span id="calc-js-message-text"></span>
</div>  <!-- сообщения -->
</div>  <!-- /calc-wrapper -->