<!DOCTYPE HTML>

<html>
<head>
    <meta charset="utf-8" >
    <title></title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .calc-message {
            background: #ffffff none repeat scroll 0 0;
            color: #000000;
            font-family: "PT Sans",sans-serif;
            font-size: 20px;
            left: 50%;
            min-width: 600px;
            padding: 50px 40px;
            position: fixed;
            text-align: center;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: 120;
            border: 1px solid #666666;
            box-shadow: 1px 1px 12px 0 #aaaaaa;
        }
    </style>
</head>

<body>
<div class="calc-message">
    <span>Спасибо за покупку! Менеджер свяжеться с вами!</span>
    <span>Номер вашего заказа: {{$order->order_num}}</span>
    <span>Cумма вашего заказа: {{$order->order_amount}}</span>
</div>  <!-- сообщения -->
</body>

</html>