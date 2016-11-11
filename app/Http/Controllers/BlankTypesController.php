<?php

namespace App\Http\Controllers;

use App\BlankType;
use App\EdgeCategory;
use App\PatternOption;
use App\Product;
use App\Thickness;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlankTypesController extends Controller
{
    public function getAll()
    {
        $response['blankTypes'] = BlankType::with('forms')->with('thicknesses')->get();
        $response['edgeSeries'] = EdgeCategory::all();
        $response['patternOptions'] = PatternOption::all();
        $response['thickness'] = Thickness::with('nips')->get();

        return response()->json($response);
    }
}
