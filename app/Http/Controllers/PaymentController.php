<?php

namespace App\Http\Controllers;

use App\Mail\StatusMailler;
use App\Order;
use App\TechEmail;
use App\OrderEmail;
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

        $orderuser = OrderEmail::all(['email'])->toArray();
        $techuser = TechEmail::all(['email'])->toArray();
        if (sizeof($techuser)){
            Mail::to($techuser)->send(new StatusMailler($order));
        }
        if (sizeof($orderuser)){
            Mail::to($orderuser)->send(new StatusMailler($order));
        }

        return view('ok',['order' => $order]);
    }

    public function setNo()
    {
        return view('no');
    }
}
