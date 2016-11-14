<?php

namespace App\Http\Controllers;

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


class MainController extends Controller
{
    public function getFirstData()
    {
        $response['blankTypes'] = BlankType::with('forms')->with('thicknesses')->get();
        $response['edgeSeries'] = EdgeCategory::all();
        $response['patternOptions'] = PatternOption::all();
        $response['thickness'] = Thickness::with('nips')->get();
        $response['nip'] = Nip::with('patternPositions')->get();

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

        return view('main',$response);
    }

    public function getBodyPage()
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
