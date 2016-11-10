<?php

namespace App\Http\Controllers;

use App\BlankType;
use App\Decor;
use App\EdgeDecor;
use App\Form;
use App\PatternOption;
use App\PatternPosition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function main()
    {
        $response['blankTypes'] = BlankType::all();
        $response['forms'] = Form::all();
        $response['patternPosition'] = PatternPosition::with('options')->get();
        $response['decors'] = Decor::with('decorCategory')->get();
        $response['edges'] = EdgeDecor::with('edgeCategory')->get();



        return view('main', $response);
    }
}
