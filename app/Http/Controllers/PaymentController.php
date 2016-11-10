<?php

namespace App\Http\Controllers;

use App\ConfigPayment;
use App\Nip;
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
    public function sendPayment()
    {

    }

    public function main()
    {
        $response['blankTypes'] = BlankType::all();
        $response['forms'] = Form::all();
        $response['patternPosition'] = PatternPosition::with('options')->get();
        $response['decors'] = Decor::with('decorCategory')->get();
        $response['edges'] = EdgeDecor::with('edgeCategory')->get();
        $response['configPayments'] = ConfigPayment::all();
        $response['nips'] = Nip::all();
        $response['thicknesses'] = Thickness::all();

        return view('main',$response);
    }
}
