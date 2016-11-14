<?php

namespace App\Http\Controllers;

use App\PatternAccordance;
use App\PatternPosition;
use Illuminate\Http\Request;

use App\Http\Requests;

class PatternController extends Controller
{
    public function getAll()
    {
        $model = PatternPosition::with('pattern_options')->get();
        return response()->json($model);
    }

    public function getPatternByParameter(Request $request)
    {
        $query = PatternAccordance::where('thickness_id', $request->thickness)
            ->where('blank_type_id', $request->blankType)
            ->where('nip_id', $request->nip)
            ->where('part_side_one', $request->part_side_one)
            ->where('part_side_two', $request->part_side_two)
            ->where('part_side_three', $request->part_side_three)
            ->where('part_side_four', $request->part_side_four)
            ->where('part_edge_one', $request->part_edge_one)
            ->where('part_edge_two', $request->part_edge_two)
            ->where('part_edge_three', $request->part_edge_three)
            ->where('part_edge_four', $request->part_edge_four)
            ->get();

        foreach ($query as $res){
            if (array_key_exists($request->edge_one,json_decode($res->edge_one))){
                if (array_key_exists($request->edge_two,json_decode($res->edge_two))){
                    if (array_key_exists($request->edge_three,json_decode($res->edge_three))){
                        if (array_key_exists($request->edge_four,json_decode($res->edge_four))){
                            return response()->json($res);
                        }else{
                            return response()->json(['message' => 'Такую деталь невозможно изготовить']);
                        }
                    }else{
                        return response()->json(['message' => 'Такую деталь невозможно изготовить']);
                    }
                }else{
                    return response()->json(['message' => 'Такую деталь невозможно изготовить']);
                }
            }else{
                return response()->json(['message' => 'Такую деталь невозможно изготовить']);
            }
        }
    }
}
