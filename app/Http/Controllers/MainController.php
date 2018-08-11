<?php

namespace App\Http\Controllers;

use App\Order;
use App\TechStack;
use App\Wrapper;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\BlankType;
use App\Form;
use App\PatternPosition;
use App\Decor;
use App\EdgeDecor;
use App\ConfigPayment;
use App\Nip;
use App\Thickness;
use App\EdgeCategory;
use App\PatternOption;
use App\Notifications;


class MainController extends Controller
{
    public function getFirstData()
    {
        $response['blankTypes'] = BlankType::with('forms')->with('thicknesses')->with('decors')->get();
        $response['edgeSeries'] = EdgeCategory::with('edgeDecor')->get();
        $response['patternOptions'] = PatternOption::all();
        $response['thickness'] = Thickness::with('nips')->get();
        $response['nip'] = Nip::with('patternPositions')->get();
        $response['wrapper'] = Wrapper::all();
        $response['errors'] = Notifications::all();

        return response()->json($response);
    }

    public function allPage()
    {
        $response['blankTypes'] = BlankType::all();
        $response['forms'] = Form::all();
        $response['patternPosition'] = PatternPosition::with('options')->get();
        $response['decors'] = Decor::with('decorCategory')->get();
        $response['edges'] = EdgeDecor::with('edgeCategory')->get();
        $response['configPayments'] = ConfigPayment::all();
        $response['nips'] = Nip::all();
        $response['thicknesses'] = Thickness::all();
        $response['tech_stack'] = TechStack::all();

        return view('main',$response);
    }

    public function getBodyPage()
    {
        $response['blankTypes'] = BlankType::all()->sortBy('name');
        $response['forms'] = Form::all()->sortBy('name');
        $response['patternPosition'] = PatternPosition::with('options')->get();
        $response['decors'] = Decor::with('decorCategory')->get();
        $response['edges'] = EdgeDecor::with('edgeCategory')->get();
        $response['configPayments'] = ConfigPayment::all();
        $response['nips'] = Nip::all();
        $response['thicknesses'] = Thickness::all();
        $response['tech_stack'] = TechStack::all();

        return view('main2',$response);
    }

    public function getPrint(Request $request)
    {
        $order = Order::find($request->order_id);
        $details = $order->readyProducts;

        return view('print',['details' => $details]);
    }
}
