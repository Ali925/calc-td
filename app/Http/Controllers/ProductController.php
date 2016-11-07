<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{

    public function getAll()
    {
        $response = Product::with(['forms'])->with('nips')->with('thicknesses')->get();
        return response()->json($response);
    }

    public function getById($id)
    {
        $response = Product::where('id',$id)->with('forms')->first();
        return response()->json($response);
    }



}
