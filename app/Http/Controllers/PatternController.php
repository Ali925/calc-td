<?php

namespace App\Http\Controllers;

use App\BlankType;
use App\PatternAccordance;
use App\PatternPosition;
use App\Product;
use App\Wrapper;
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
        $query = PatternAccordance::where('form_id', $request->form_id)
            ->where('thickness_id', $request->thickness_id)
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
            })->first();

        $width = ($request->width <= 600)? 600 : 1200;

        $blank = Product::where('blank_type_id', $request->blank_type_id)
            ->where('decor_category_id', $request->decor_category_id)
            ->where('nip_id', $request->nip_id)
            ->where('thickness_id', $request->thickness_id)
            ->where('width', '=' ,$width)
            ->get()
            ->first();

        $width_proxy = ($width == 600)? 1200 : 600;

        $blank_proxy = Product::where('blank_type_id', $request->blank_type_id)
            ->where('decor_category_id', $request->decor_category_id)
            ->where('nip_id', $request->nip_id)
            ->where('thickness_id', $request->thickness_id)
            ->where('width', '=' ,$width_proxy)
            ->first();

        $wrapper = Wrapper::all()->toArray();



        if ($query != null & $blank != null & $wrapper!=null){
            return response()->json([
                'pattern' => [
                    'id' => $query->id,
                    'image' => $query->image,
                ],
                'blank' => [
                    'id' => $blank->id,
                    'width' => $blank->width,
                    'len' => $blank->lenght,
                    'coast' => $blank->coast,
                ],
                'proxy_blank' => [
                    'id' => $blank_proxy->id,
                ],
                'wrapper' => $wrapper,
            ]);
        }else{
            if ($query == null) return response()->json(['status' => false, 'message' => 'Нет  чертежей']);
            if ($blank == null) return response()->json(['status' => false, 'message' => 'Нет загтовки']);
            if ($wrapper == null) return response()->json(['status' => false, 'message' => 'Нет обертки']);
        }

    }

    public function notEmptyPattern(Request $request)
    {
        $query =
            PatternAccordance::where('thickness_id',$request->thickness_id)
            ->where('form_id',$request->form_id)
            ->where('blank_type_id',$request->blank_type_id)
            ->where('nip_id',$request->nip_id)
            ->where('thickness_id', $request->thickness_id)
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
            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false, 'message' => 'Такую деталь создать нельзя']);
        }
    }
}
