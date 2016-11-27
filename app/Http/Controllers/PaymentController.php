<?php

namespace App\Http\Controllers;

use App\Mail\StatusMailler;
use App\Order;
use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function setOk(Request $request)
    {
        $data = $request->all();

        $order = Order::where('order_num', $data['ordernumber'])->first();
        $order->bill = $data['billnumber'];
        $order->status = 'Оплачено';
        $order->save();

        $user = User::where('role', 2)->get(['email'])->toArray();
        dd($user);
        Mail::send($user)->send(new StatusMailler($order));

        return 'Спасибо за ваше внимание внимание к нашей продукции!';
    }

    public function setNo()
    {
        return 'Наш менеджер с вами свяжеться';
    }
}
