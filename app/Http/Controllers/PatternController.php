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
        $query = PatternAccordance::where('thickness_id', 1/*$request->thickness*/)
            ->where('blank_type_id', 3/*$request->blankType*/)
            ->where('nip_id', 1/*$request->nip*/)
            ->first();

        dd($query->edge_one);

        return $query;
    }
}
