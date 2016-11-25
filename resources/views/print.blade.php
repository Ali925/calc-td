<html>
<head>
    <meta charset="utf-8" >
    <title>Калькулятор</title>
</head>
<body>
<div class="calc-print">
    @foreach($details as $detail)
        <?php
        $skos = 0;
        $skos_coast = 0;
        $radius = 0;
        $radius_coast = 0;
        $eurozap = 0;
        $eurozap_coast = 0;
        $soed = 0;
        $soed_coast = 0;

        if ($detail->patternOptionEdgeOne->kind == 'skos'){
            $skos = $skos+1; $skos_coast = $skos_coast+$detail->patternOptionEdgeOne->coast;
        }elseif($detail->patternOptionEdgeOne->kind == 'radius') {
            $radius = $radius + 1; $radius_coast = $radius_coast+$detail->patternOptionEdgeOne->coast;};
        if ($detail->patternOptionEdgeTwo->kind == 'skos'){
            $skos = $skos+1; $skos_coast = $skos_coast+$detail->patternOptionEdgeTwo->coast;
        }elseif($detail->patternOptionEdgeTwo->kind == 'radius') {
            $radius = $radius + 1; $radius_coast = $radius_coast+$detail->patternOptionEdgeTwo->coast;};
        if ($detail->patternOptionEdgeThree->kind == 'skos'){
            $skos = $skos+1; $skos_coast = $skos_coast+$detail->patternOptionEdgeThree->coast;
        }elseif($detail->patternOptionEdgeThree->kind == 'radius') {
            $radius = $radius + 1; $radius_coast = $radius_coast+$detail->patternOptionEdgeThree->coast;};
        if ($detail->patternOptionEdgeFour->kind == 'skos'){
            $skos = $skos+1; $skos_coast = $skos_coast+$detail->patternOptionEdgeFour->coast;
        }elseif($detail->patternOptionEdgeFour->kind == 'radius') {
            $radius = $radius + 1; $radius_coast = $radius_coast+$detail->patternOptionEdgeFour->coast;};


        if ($detail->patternOptionSideOne->kind == 'soed'){
            $soed = $soed+1; $soed_coast = $soed_coast + $detail->patternOptionSideOne->coast;
        }elseif($detail->patternOptionSideOne->kind == 'eurozap'){
            $eurozap = $eurozap + 1; $eurozap_coast=$eurozap_coast+$detail->patternOptionSideOne->coast;
        };
        if ($detail->patternOptionSideTwo->kind == 'soed'){
            $soed = $soed+1; $soed_coast = $soed_coast + $detail->patternOptionSideTwo->coast;
        }elseif($detail->patternOptionSideTwo->kind == 'eurozap'){
            $eurozap = $eurozap + 1; $eurozap_coast=$eurozap_coast+$detail->patternOptionSideTwo->coast;
        };
        if ($detail->patternOptionSideThree->kind == 'soed'){
            $soed = $soed+1; $soed_coast = $soed_coast + $detail->patternOptionSideThree->coast;
        }elseif($detail->patternOptionSideThree->kind == 'eurozap'){
            $eurozap = $eurozap + 1; $eurozap_coast=$eurozap_coast+$detail->patternOptionSideThree->coast;
        };
        if ($detail->patternOptionSideFour->kind == 'soed'){
            $soed = $soed+1; $soed_coast = $soed_coast + $detail->patternOptionSideFour->coast;
        }elseif($detail->patternOptionSideFour->kind == 'eurozap'){
            $eurozap = $eurozap + 1; $eurozap_coast=$eurozap_coast+$detail->patternOptionSideFour->coast;
        };


        ?>
    <div class="calc-info-item">
        <div class="calc-info-top">
            <div class="calc-name calc-info-name">№ изделия в заказе <span class="calc-special">{{$detail->id}}</span></div>
            <div class="calc-info-draft"><img src="{{$detail->patternAccordance->image}}" alt="{{$detail->patternAccordance->name}}"></div>
        </div>
        <div class="calc-info-center">
            <table class="calc-info-table">
                <tr class="calc-info-header">
                    <td>Конструкция заготовки <span class="calc-info-price">/ Стоимость, руб</span></td>
                    <td>Тип заготовки</td>
                    <td>Серия декора</td>
                    <td>Декор заготовки</td>
                    <td>Завал</td>
                    <td>Толщина, мм</td>
                    <td>Длина, мм</td>
                    <td>Ширина, мм</td>
                </tr>
                <tr>
                    <td>
                        <div class="calc-info-text">{{$detail->form->name}}
                            <span class="calc-info-price">/ {{$detail->form->coast}} руб</span>
                        </div>
                    </td>
                    <td><div class="calc-info-text">{{$detail->blankType->name}}</div></td>
                    <td><div class="calc-info-text">{{$detail->decorCategory->name}}</div></td>
                    <td>
                        <div class="calc-info-text">{{$detail->decor->name}}</div>
                    </td>
                    <td><div class="calc-info-text">{{$detail->nip->value}}</div></td>
                    <td><div class="calc-info-text">{{$detail->thickness->name}}</div></td>
                    <td><div class="calc-info-text">{{$detail->width}}</div></td>
                    <td><div class="calc-info-text">{{$detail->length}}</div></td>
                </tr>
                <tr class="calc-info-header">
                    <td>Еврозапил<br>Kол-во <span class="calc-info-price">/ Стоимость, руб</span></td>
                    <td>Скос<br>Kол-во <span class="calc-info-price">/ Стоимость, руб</span></td>
                    <td>Стандартное соединение<br>Kол-во <span class="calc-info-price">/ Стоимость, руб</span></td>
                    <td>Радиус<br>Kол-во / Стоимость, руб</td>
                    <td>Кромка по длине детали оборотная сторона 1<br>Вид <span class="calc-info-price">/ Стоимость, руб</span></td>
                    <td>Кромка по ширине детали  правая сторона 2<br>Вид <span class="calc-info-price">/ Стоимость, руб</span></td>
                    <td>Кромка по длине детали лицевая сторона 3<br>Вид <span class="calc-info-price">/ Стоимость, руб</span></td>
                    <td>Кромка по ширине детали  левая сторона 4<br>Вид <span class="calc-info-price">/ Стоимость, руб</span></td>
                </tr>
                <tr>
                    <td>
                        <div class="calc-info-text">{{$eurozap}}
                            <span class="calc-info-price">/ {{$eurozap_coast}} руб</span>
                        </div>
                    </td>
                    <td>
                        <div class="calc-info-text">{{$skos}}
                            <span class="calc-info-price">/ {{$skos_coast}} руб</span>
                        </div>
                    </td>
                    <td>
                        <div class="calc-info-text">{{$soed}}
                            <span class="calc-info-price">/ {{$soed_coast}} руб</span>
                        </div>
                    </td>
                    <td>
                        <div class="calc-info-text">{{$radius}}
                            <span class="calc-info-price">/ {{$radius_coast}} руб</span>
                        </div>
                    </td>
                    <td>
                        <div class="calc-info-text">{{$detail->edgeOne->name}}</div>
                        <span class="calc-info-price"> / {{$detail->edgeOne->coast}} руб</span>
                    </td>
                    <td>
                        <div class="calc-info-text">{{$detail->edgeTwo->name}}</div>
                        <span class="calc-info-price">/ {{$detail->edgeTwo->coast}} руб</span>
                    </td>
                    <td>
                        <div class="calc-info-text">{{$detail->edgeThree->name}}</div>
                        <span class="calc-info-price">/ {{$detail->edgeThree->coast}} руб</span>
                    </td>
                    <td>
                        <div class="calc-info-text">{{$detail->edgeFour->name}}</div>
                        <span class="calc-info-price">/ {{$detail->edgeFour->coast}} руб</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @endforeach
</div>
</body>

</html>