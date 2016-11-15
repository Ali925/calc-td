<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    public function setOrder(Request $request)
    {

    }

    public function setCustomer(Request $request)
    {
        $query = Customer::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $order = Order::find($request->order_id);
        $query->customer_id = $query->id;
        $query->save();
    }
}
