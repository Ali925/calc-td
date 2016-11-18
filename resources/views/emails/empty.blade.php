<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<body>

@foreach($details as $detail)

    Деталь № {{$detail->id}}
    <table>
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
            <td>{{$detail->decorCotegory->name}}</td>
            <td>{{$detail->decor->name}}</td>
            <td>{{$detail->nip->name}}</td>
            <td>{{$detail->patternOptionSideOne->name}}</td>
            <td>{{$detail->patternOptionSideTwo->name}}</td>
            <td>{{$detail->patternOptionSideThree->name}}</td>
            <td>{{$detail->patternOptionSideFour->name}}</td>
        </tr>
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

@endforeach

</body>
</html>

