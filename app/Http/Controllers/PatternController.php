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
        $query = PatternAccordance::where('thickness_id',$request->thickness_id)
            ->where('blank_type_id',$request->blank_type_id)
            ->where('nip_id',$request->nip_id)
            ->where('part_side_one',$request->part_side_one)
            ->where('part_side_two',$request->part_side_two)
            ->where('part_side_three',$request->part_side_three)
            ->where('part_side_four',$request->part_side_four)
            ->where('part_edge_one',$request->part_edge_one)
            ->where('part_edge_two',$request->part_edge_two)
            ->where('part_edge_three',$request->part_edge_three)
            ->where('part_edge_four',$request->part_edge_four)
            ->whereHas('patternEdgeDecorsOne', function ($query) use($request){
                $query->where('id',$request->k1_id);
            })
            ->whereHas('patternEdgeDecorsTwo', function ($query) use($request){
                $query->where('id',$request->k2_id);
            })
            ->whereHas('patternEdgeDecorsThree', function ($query) use($request){
                $query->where('id',$request->k3_id);
            })
            ->whereHas('patternEdgeDecorsFour', function ($query) use($request){
                $query->where('id',$request->k4_id);
            })->get();

            return response()->json($query);
    }

    public function notEmptyPattern(Request $request)
    {
        $query = PatternAccordance::where('thickness_id',$request->thickness_id)
            ->where('blank_type_id',$request->blank_type_id)
            ->where('nip_id',$request->nip_id)
            ->where('part_side_one',$request->part_side_one)
            ->where('part_side_two',$request->part_side_two)
            ->where('part_side_three',$request->part_side_three)
            ->where('part_side_four',$request->part_side_four)
            ->where('part_edge_one',$request->part_edge_one)
            ->where('part_edge_two',$request->part_edge_two)
            ->where('part_edge_three',$request->part_edge_three)
            ->where('part_edge_four',$request->part_edge_four)
            ->get();

        if (sizeof($query) > 0){
            return response()->json(['message' => true]);
        }else{
            return response()->json(['message' => 'Такую деталь невозможно создать']);
        }
    }
}
