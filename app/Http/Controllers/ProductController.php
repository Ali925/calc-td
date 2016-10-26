<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{

    public function getAll()
    {
        $response = Product::all();
        return response()->json($response);
    }

    public function getById($id)
    {
        $response = Product::where('id',$id)->with('forms')->first();
        return response()->json($response);
    }



}
