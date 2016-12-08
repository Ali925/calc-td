<?php

namespace App\Http\Controllers;

use App\PatternOption;
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
        $query = Product::where('blank_type_id', $request->blank_type_id)
            ->where('decor_category_id', $request->decor_category_id)
            ->where('nip_id', $request->nip_id)
            ->where('thickness_id', $request->thickness_id)
            ->where('width', '<=' ,$request->width)
            ->get();

        return response()->json($query);
    }

    public function getFacet(Request $request)
    {
        $data = $request->all();

        if (!empty($data)){

            $query = PatternOption::all();

            foreach ($data as $item=>$value){
                $query->where($item,$value);
            };

            return response()->json($query);
        }else{
            return response()->json(['status' => false,'message'=>'Ничего не пришло']);
        }
    }



}
