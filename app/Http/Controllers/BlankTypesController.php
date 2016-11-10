<?php

namespace App\Http\Controllers;

use App\BlankType;
use App\EdgeCategory;
use App\PatternOption;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlankTypesController extends Controller
{
    public function getAll()
    {
        $response['blankTypes'] = BlankType::with('forms')->with('thicknesses')->get();
        $response['edgeSeries'] = EdgeCategory::all();
        $response['patternOptions'] = PatternOption::all();

        return response()->json($response);
    }
}
