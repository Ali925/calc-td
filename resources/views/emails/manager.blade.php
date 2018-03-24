<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<body>

Добрый день! <br>
{{$order->created_at}} – оформлен новый заказ на мебельные детали № {{$order->order_num}} через модуль калькулятора.
<br>

Данные клиента: <br>
ФИО: {{$customer->first_name}} {{$customer->last_name}} <br>
Телефон: {{$customer->phone}} <br>
Эл. почта: {{$customer->email}} <br>
Город:  {{$customer->city}} <br>
Сумма заказа: {{$order->order_amount}} <br>
Статус заказа: {{$order->status}} <br>


</body>
</html>

