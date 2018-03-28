<?php

namespace App\Http\Controllers;

use App\Mail\StatusMailler;
use App\Order;
use App\TechEmail;
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

        $user = TechEmail::all(['email'])->toArray();
        Mail::to($user)->send(new StatusMailler($order));

        return view('ok',['order' => $order]);
    }

    public function setNo()
    {
        return view('no');
    }
}
