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

    public function getByParameter(Request $request)
    {
        $width = ($request->width <= 600) ? 600 : 1200;

        $query = Product::where('blank_type_id', $request->blankType)
            ->where('decor_category_id', $request->decorCategory)
            ->where('nip_id', $request->nip)
            ->where('thickness_id', $request->thickness)
            ->where('width', $width)
            ->get();

        return $query;
    }



}
