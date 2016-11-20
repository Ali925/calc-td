<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .page-break {
            page-break-after: always;
        }
        body{
            margin: 0 auto;
        }
    </style>
</head>
<body>

@foreach($details as $detail)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Чертеж № {{$detail->id}}, соответствует чертежу: {{$detail->patternAccordance->name}}</h2><br>
                <table border="2" rules="all" cellpadding="3">
                    <tr>
                        <td>Tип заготовки</td>
                        <td>Толщина</td>
                        <td>Тип конструкции</td>
                        <td>Категория декора</td>
                        <td>Декор</td>
                        <td>Завал</td>
                        <td>Сторона - 1</td>
                        <td>Сторона - 2</td>
                        <td>Сторона - 3</td>
                        <td>Сторона - 4</td>
                    </tr>
                    <tr>
                        <td>{{$detail->blankType->name}}</td>
                        <td>{{$detail->thickness->name}}</td>
                        <td>{{$detail->form->name}}</td>
                        <td>{{$detail->decorCategory->name}}</td>
                        <td>{{$detail->decor->name}}</td>
                        <td>{{$detail->nip->name}}</td>
                        <td>{{$detail->patternOptionSideOne->name}}</td>
                        <td>{{$detail->patternOptionSideTwo->name}}</td>
                        <td>{{$detail->patternOptionSideThree->name}}</td>
                        <td>{{$detail->patternOptionSideFour->name}}</td>
                    </tr>
                    </table>
                <br>
                    <table border="2" rules="all" cellpadding="3">
                    <tr>
                        <td>Угол - 1</td>
                        <td>Угол - 2</td>
                        <td>Угол - 3</td>
                        <td>Угол - 4</td>
                        <td>Кромка - 1</td>
                        <td>Кромка - 2</td>
                        <td>Кромка - 3</td>
                        <td>Кромка - 4</td>
                        <td>Ширина</td>
                        <td>Длинна</td>
                    </tr>
                    <tr>
                        <td>{{$detail->patternOptionEdgeOne->name}}</td>
                        <td>{{$detail->patternOptionEdgeTwo->name}}</td>
                        <td>{{$detail->patternOptionEdgeThree->name}}</td>
                        <td>{{$detail->patternOptionEdgeFour->name}}</td>
                        <td>{{$detail->edgeOne->name}}</td>
                        <td>{{$detail->edgeTwo->name}}</td>
                        <td>{{$detail->edgeThree->name}}</td>
                        <td>{{$detail->edgeFour->name}}</td>
                        <td>{{$detail->width}}</td>
                        <td>{{$detail->length}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="page-break"></div>
@endforeach

</body>
</html>

