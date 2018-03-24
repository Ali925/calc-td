<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<body>

Добрый день! <br>
Ваш заказ оформлен, благодарим за интерес к нашей продукции! <br>

Детализация заказа: <br>
№ заказа:  {{$order->order_num}} <br>
Дата заказа: {{$order->created_at}}  <br>
E-Mail:  {{$customer->email}} <br>
Телефон:  {{$customer->phone}} <br>
Город:  {{$customer->city}} <br>

</body>
</html>

