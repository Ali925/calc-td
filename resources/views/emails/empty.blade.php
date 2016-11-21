<html>
<head>
    <meta charset="utf-8" >
    <title>Калькулятор</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .calc-print {
            width: 100%;
            max-width: 800px;
            margin-left: 1%;
            margin-top: 1%;
            color: #000000;
        }
        .calc-info-item {
            border-bottom: 2px solid #666666;
            padding-bottom: 20px;
        }
        .calc-clearfix::after {
            clear: both;
            content: "";
            display: table;
        }
        .calc-info-top {
            padding: 20px 0;
            position: relative;
        }
        .calc-name {
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
        }
        .calc-special {
            color: #cd353d;
        }
        .calc-info-draft {
            max-width: 700px;
        }
        .calc-info-draft img {
            height: auto;
            max-width: 20%;
            vertical-align: middle;
        }
        .calc-info-table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }
        .calc-info-table td {
            border: 1px solid #666666;
            font-size: 13px;
            padding: 10px 2px;
            text-align: center;
            vertical-align: middle;
        }
        .calc-info-table .calc-info-header td {
            font-size: 10px;
            font-weight: 700;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
<div class="calc-print">
    @foreach($details as $detail)
        <?php
        $skos = 0;
        $radius = 0;
        $eurozap = 0;
        $soed = 0;

        if ($detail->patternOptionEdgeOne->kind == 'skos'){
            $skos = $skos+1;
        }elseif($detail->patternOptionEdgeOne->kind == 'radius') {
            $radius = $radius + 1;
        };
        if ($detail->patternOptionEdgeTwo->kind == 'skos'){
            $skos = $skos+1;
        }elseif($detail->patternOptionEdgeTwo->kind == 'radius') {
            $radius = $radius + 1;
        };
        if ($detail->patternOptionEdgeThree->kind == 'skos'){
            $skos = $skos+1;
        }elseif($detail->patternOptionEdgeThree->kind == 'radius') {
            $radius = $radius + 1;
        };
        if ($detail->patternOptionEdgeFour->kind == 'skos'){
            $skos = $skos+1;
        }elseif($detail->patternOptionEdgeFour->kind == 'radius') {
            $radius = $radius + 1;
        };


        if ($detail->patternOptionSideOne->kind == 'soed'){
            $soed = $soed+1;
        }elseif($detail->patternOptionSideOne->kind == 'eurozap'){
            $eurozap = $eurozap + 1;
        };
        if ($detail->patternOptionSideTwo->kind == 'soed'){
            $soed = $soed+1;
        }elseif($detail->patternOptionSideTwo->kind == 'eurozap'){
            $eurozap = $eurozap + 1;
        };
        if ($detail->patternOptionSideThree->kind == 'soed'){
            $soed = $soed+1;
        }elseif($detail->patternOptionSideThree->kind == 'eurozap'){
            $eurozap = $eurozap + 1;
        };
        if ($detail->patternOptionSideFour->kind == 'soed'){
            $soed = $soed+1;
        }elseif($detail->patternOptionSideFour->kind == 'eurozap'){
            $eurozap = $eurozap + 1; 
        };


        ?>
        <div class="calc-info-item">
            <div class="calc-info-center">
                <table class="calc-info-table">
                    <tr><td colspan="8">
                            <div class="calc-info-top">
                                <div class="calc-name calc-info-name">№ изделия в заказе <span class="calc-special">{{$detail->id}}</span></div>
                                <img src="{{$detail->patternAccordance->image}}" alt="">
                            </div>
                        </td></tr>
                    <tr class="calc-info-header">
                        <td>Конструкция заготовки</td>
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
                            <div class="calc-info-text">
                                <span class="calc-info-price">{{$detail->form->name}}</span>
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
                        <td>Еврозапил<br>Kол-во </td>
                        <td>Скос<br>Kол-во </td>
                        <td>Стандартное соединение<br>Kол-во </td>
                        <td>Радиус<br>Kол-во</td>
                        <td>Кромка по длине детали оборотная сторона 1<br>Вид</td>
                        <td>Кромка по ширине детали  правая сторона 2<br>Вид</td>
                        <td>Кромка по длине детали лицевая сторона 3<br>Вид</td>
                        <td>Кромка по ширине детали  левая сторона 4<br>Вид</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="calc-info-text">{{$eurozap}}</div>
                        </td>
                        <td>
                            <div class="calc-info-text">{{$skos}}</div>
                        </td>
                        <td>
                            <div class="calc-info-text">{{$soed}}</div>
                        </td>
                        <td>
                            <div class="calc-info-text">{{$radius}}</div>
                        </td>
                        <td>
                            <div class="calc-info-text">{{$detail->edgeOne->name}}</div>
                        </td>
                        <td>
                            <div class="calc-info-text">{{$detail->edgeTwo->name}}</div>
                        </td>
                        <td>
                            <div class="calc-info-text">{{$detail->edgeThree->name}}</div>
                        </td>
                        <td>
                            <div class="calc-info-text">{{$detail->edgeFour->name}}</div>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
</div>
<div class="page-break"></div>
@endforeach
</body>

</html>

