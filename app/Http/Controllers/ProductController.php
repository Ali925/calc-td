<?php

namespace App\Http\Controllers;

use App\PatternAccordance;
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

            $query = PatternAccordance::query();

            foreach ($data as $item=>$value){
                $query->where($item,$value);
            };

            $query->get();

            $options = [];

            foreach ($query as $option){
                $options['part_side_one'][] = $option->part_side_one;
                $options['part_side_two'][] = $option->part_side_two;
                $options['part_side_three'][] = $option->part_side_three;
                $options['part_side_four'][] = $option->part_side_four;
                $options['part_edge_one'][] = $option->part_edge_one;
                $options['part_edge_two'][] = $option->part_edge_two;
                $options['part_edge_three'][] = $option->part_edge_three;
                $options['part_edge_four'][] = $option->part_edge_four;
            }

            foreach ($options as $key => $res){
                if (array_key_exists($key,$data)){
                    unset($options[$key]);
                }else{
                    $options[$key] = array_values(array_unique($options[$key]));
                }
            }

            return response()->json($options);
        }else{
            return response()->json(['status' => false,'message'=>'Ничего не пришло']);
        }
    }



}
