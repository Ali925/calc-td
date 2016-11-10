<?php

namespace App\Http\Controllers;

use App\BlankType;
use App\EdgeCategory;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlankTypesController extends Controller
{
    public function getAll()
    {
        $response['blankTypes'] = BlankType::with('forms')->with('thicknesses')->get();
        $response['product'] = Product::with('blankType')
            ->with('decorCategory')->with('nip')->with('thickness')->get();
        $response['edgeSeries'] = EdgeCategory::all();

        return response()->json($response);
    }
}
