<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<body>

Добрый день!
{{$order->created_at}} – оформлен новый заказ на мебельные детали № {{$order->order_num}} через модуль калькулятора.

Данные клиента:
ФИО: {{$customer->first_name}} {{$customer->last_name}}
Телефон: {{$customer->phone}}
Эл. почта: {{$customer->email}}
Сумма заказа: {{$order->order_amount}}
Статус заказа: {{$order->status}}


</body>
</html>

