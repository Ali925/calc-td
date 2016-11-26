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
        dd($request);

        $order = Order::where('order_num')->first();
        $order->bill = $request->billnumber;
        $order->status = 'Оплачено';
        $order->save();


    }

    public function setNo()
    {

    }
}
