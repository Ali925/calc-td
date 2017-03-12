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
            color: #666666;
            margin-top: 1%;
            margin-left: 1%;
        }
        .calc-clearfix::after {
            clear: both;
            content: "";
            display: table;
        }
        .calc-col50 {
          float: left;
          width: 50%;
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
            margin: 20px auto 0;
            max-width: 700px;
        }
        .calc-info-draft img {
            height: auto;
            max-width: 100%;
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
            font-size: 11px;
            font-weight: 700;
            color: #000000;
        }
        .calc-result-blc {
          margin: 0 auto 20px;
        }
        .calc-result-blc {
          width: 100%;
        }
        .calc-result-item {
          padding: 10px 0;
        }
        .calc-result-number {
          text-align: right;
        }
        .calc-date{
          text-transform: initial;
        }
    </style>
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

                if(strpos($detail->edgeOne->name, 'Без')!==false){
                    $detail->edgeOne->name = 'Без кромки';
                    $detail->edgeOne->edgeCategory->name = '';
                }

                if(strpos($detail->edgeTwo->name, 'Без')!==false){
                    $detail->edgeTwo->name = 'Без кромки';
                    $detail->edgeTwo->edgeCategory->name = '';
                }

                if(strpos($detail->edgeThree->name, 'Без')!==false){
                    $detail->edgeThree->name = 'Без кромки';
                    $detail->edgeThree->edgeCategory->name = '';
                }

                if(strpos($detail->edgeFour->name, 'Без')!==false){
                    $detail->edgeFour->name = 'Без кромки';
                    $detail->edgeFour->edgeCategory->name = '';
                }

                $width = ($detail->width <= 600)?600:1200;

                $product = App\Product::where('blank_type_id',$detail->blankType->id)
                            ->where('decor_category_id',$detail->decorCategory->id)
                            ->where('nip_id',$detail->nip->id)
                            ->where('thickness_id',$detail->thickness->id)
                            ->where('width',$width)->first();

                $length = '';
                if ($detail->length <= 1000) $length = 1000;
                if ($detail->length <= 1500  && $detail->length > 1000) $length = 1500;
                if ($detail->length > 1500 && $detail->length <= 3050) $length = 3050;

                $wrapper = App\Wrapper::where('length', $length)->first();

                $dateNow = date('j.n.Y'); 

            ?>
        <div class="calc-info-item">
            <div class="calc-info-center">
                <table class="calc-info-table">
                    <tr><td colspan="8">
                            <div class="calc-info-top">
                                <div class="calc-name calc-info-name"> изделие № <span class="calc-special">{{$detail->id}}</span>
                                    в заказе<span class="calc-special">{{$order->order_num}}</span> <span class="calc-date"> от {{$dateNow}}</span></div>
                                <img src="{{$detail->patternAccordance->image}}" alt="">
                            </div>
                        </td></tr>
                    <tr class="calc-info-header">
                        <td>Тип заготовки (основа и покрытие) <span class="calc-info-price">/ Цена, руб</span></td>
                        <td>Тип конструкции <span class="calc-info-price">/ Цена, руб</span></td>  
                        <td>Серия декора</td>
                        <td>Декор заготовки</td>
                        <td>Завал</td>
                        <td>Толщина, мм</td>
                        <td>L Длина, мм</td>
                        <td>H Ширина, мм</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="calc-info-text">
                                <span class="calc-info-price">{{$detail->blankType->name}} / {{$product->coast}} руб</span>
                            </div>
                        </td>
                        <td>
                            <div class="calc-info-text">
                                <span class="calc-info-price">{{$detail->form->name}} / {{$detail->form->coast}} руб</span>
                            </div>
                        </td>
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
                        <td>Еврозапил<br>Kол-во <span class="calc-info-price">/ Цена, руб</span></td>
                        <td>Стандартное соединение<br>Kол-во <span class="calc-info-price">/ Цена, руб</span></td>
                        <td>Радиус<br>Kол-во / Стоимость, руб</td>
                        <td>Скос<br>Kол-во <span class="calc-info-price">/ Цена, руб</span></td>
                        <td>Кромка сторона 1 оборотная<br>Вид <span class="calc-info-price">/ Цена, руб</span></td>
                        <td>Кромка сторона 2 правая<br>Вид <span class="calc-info-price">/ Цена, руб</span></td>
                        <td>Кромка сторона 3 лицевая<br>Вид <span class="calc-info-price">/ Цена, руб</span></td>
                        <td>Кромка сторона 4 левая<br>Вид <span class="calc-info-price">/ Цена, руб</span></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="calc-info-text">{{$eurozap}}
                                <span class="calc-info-price">/ {{$eurozap_coast}} руб</span>
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
                            <div class="calc-info-text">{{$skos}}
                                <span class="calc-info-price">/ {{$skos_coast}} руб</span>
                            </div>
                        </td>
                        <td>
                            @if($detail->edgeOne->edgeCategory->code == '3D' or $detail->edgeOne->edgeCategory->code == 'none' or $detail->edgeOne->edgeCategory->name == '')
                                <div class="calc-info-text">{{$detail->edgeOne->name}}</div>
                                <span class="calc-info-price"> / {{$detail->edgeOne->edgeCategory->coast}} руб</span>
                            @else
                                <div class="calc-info-text">{{$detail->edgeOne->name}} ({{$detail->edgeOne->edgeCategory->name}})</div>
                                <span class="calc-info-price"> / {{$detail->edgeOne->edgeCategory->coast}} руб</span>
                            @endif

                        </td>
                        <td>
                            @if($detail->edgeTwo->edgeCategory->code == '3D' or $detail->edgeTwo->edgeCategory->code == 'none' or $detail->edgeTwo->edgeCategory->name == '')
                                <div class="calc-info-text">{{$detail->edgeTwo->name}}</div>
                                <span class="calc-info-price"> / {{$detail->edgeTwo->edgeCategory->coast}} руб</span>
                            @else
                                <div class="calc-info-text">{{$detail->edgeTwo->name}} ({{$detail->edgeTwo->edgeCategory->name}})</div>
                                <span class="calc-info-price">/ {{$detail->edgeTwo->edgeCategory->coast}} руб</span>
                            @endif
                        </td>
                        <td>
                            @if($detail->edgeThree->edgeCategory->code == '3D' or $detail->edgeThree->edgeCategory->code == 'none' or $detail->edgeThree->edgeCategory->name == '')
                                <div class="calc-info-text">{{$detail->edgeThree->name}}</div>
                                <span class="calc-info-price"> / {{$detail->edgeThree->edgeCategory->coast}} руб</span>
                            @else
                                <div class="calc-info-text">{{$detail->edgeThree->name}} ({{$detail->edgeThree->edgeCategory->name}})</div>
                                <span class="calc-info-price">/ {{$detail->edgeThree->edgeCategory->coast}} руб</span>
                            @endif
                        </td>
                        <td>
                            @if($detail->edgeFour->edgeCategory->code == '3D' or $detail->edgeFour->edgeCategory->code == 'none' or $detail->edgeFour->edgeCategory->name == '')
                                <div class="calc-info-text">{{$detail->edgeFour->name}}</div>
                                <span class="calc-info-price"> / {{$detail->edgeFour->edgeCategory->coast}} руб</span>
                            @else
                                <div class="calc-info-text">{{$detail->edgeFour->name}} ({{$detail->edgeFour->edgeCategory->name}})</div>
                                <span class="calc-info-price">/ {{$detail->edgeFour->edgeCategory->coast}} руб</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="calc-result-blc">
                <div class="calc-result-item calc-clearfix">
                    <div class="calc-col50">Стоимость заготовки (основа и облиц. покрытие)</div>
                    <div class="calc-col50 calc-result-number" id="calc-js-result-raw_price">{{$product->coast}}</div>
                </div> <!-- /calc-result-item -->
                <div class="calc-result-item calc-clearfix">
                    <div class="calc-col50">Стоимость изготовления и обработки детали (еврозапил, скос, стандартное соединение, радиус, кромка)</div>
                    <div class="calc-col50 calc-result-number" id="calc-js-result-elem_price">{{$detail->form->coast}}</div>
                </div> <!-- /calc-result-item -->
                <div class="calc-result-item calc-clearfix">
                    <div class="calc-col50">Стоимость упаковки</div>
                    <div class="calc-col50 calc-result-number" id="calc-js-result-pack_price">{{$wrapper->coast}}</div>
                </div> <!-- /calc-result-item -->
                <div class="calc-result-item calc-clearfix calc-special">
                    <div class="calc-col50">Итого стоимость заказа</div>
                    <div class="calc-col50 calc-result-number" id="calc-js-result-full_price">{{$detail->coast}}</div>
                </div> <!-- /calc-result-item -->
            </div> <!-- /calc-result-blc -->
@endforeach
    </div>
</body>

</html>
