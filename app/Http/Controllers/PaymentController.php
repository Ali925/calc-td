<?php

namespace App\Http\Controllers;

use App\ConfigPayment;
use App\Nip;
use App\Order;
use App\Thickness;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\BlankType;
use App\Decor;
use App\EdgeDecor;
use App\Form;
use App\PatternPosition;

class PaymentController extends Controller
{
    public function setOk(Request $request)
    {
        $data = $request->all();

        $order = Order::where('order_num', $data['ordernumber'])->first();
        $order->bill = $data['billnumber'];
        $order->status = 'Оплачено';
        $order->save();

        return 'Спасибо за ваше внимание внимание к нашей продукции!';
    }

    public function setNo()
    {
        return 'Наш менеджер с вами свяжеться';
    }
}
