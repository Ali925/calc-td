<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            <td>{{$detail->form->name}} / {{$detail->form->coast}} .руб</td>
            <td>{{$detail->decorCategory->name}} / {{$detail->decorCategory->coast}} .руб</td>
            <td>{{$detail->decor->name}}</td>
            <td>{{$detail->nip->name}}</td>
            <td>{{$detail->patternOptionSideOne->name}} / {{$detail->patternOptionSideOne->coast}} .руб</td>
            <td>{{$detail->patternOptionSideTwo->name}} / {{$detail->patternOptionSideTwo->coast}} .руб</td>
            <td>{{$detail->patternOptionSideThree->name}} / {{$detail->patternOptionSideThree->coast}} .руб</td>
            <td>{{$detail->patternOptionSideFour->name}} / {{$detail->patternOptionSideFour->coast}} .руб</td>
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
            <td>{{$detail->patternOptionEdgeOne->name}} / {{$detail->patternOptionEdgeOne->coast}} .руб</td>
            <td>{{$detail->patternOptionEdgeTwo->name}} / {{$detail->patternOptionEdgeTwo->coast}} .руб</td>
            <td>{{$detail->patternOptionEdgeThree->name}} / {{$detail->patternOptionEdgeThree->coast}} .руб</td>
            <td>{{$detail->patternOptionEdgeFour->name}} / {{$detail->patternOptionEdgeFour->coast}} .руб</td>
            <td>{{$detail->edgeOne->name}} / {{$detail->edgeOne->coast}} .руб</td>
            <td>{{$detail->edgeTwo->name}} / {{$detail->edgeTwo->coast}} .руб</td>
            <td>{{$detail->edgeThree->name}} / {{$detail->edgeThree->coast}} .руб</td>
            <td>{{$detail->edgeFour->name}} / {{$detail->edgeFour->coast}} .руб</td>
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

