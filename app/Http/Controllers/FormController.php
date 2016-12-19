<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getAll()
    {
        $response = Form::with('blankTypes')->get();
        return response()->json($response);
    }

    public function getById($id)
    {
        $response = Form::where('id',$id)
            ->with('option_edge_1')
            ->with('option_edge_2')
            ->with('option_edge_3')
            ->with('option_edge_4')
            ->with('option_side_1')
            ->with('option_side_2')
            ->with('option_side_3')
            ->with('option_side_4')
            ->first();

        return response()->json([
            'option_edge_1' => $response->option_edge_1->id,
            'option_edge_2' => $response->option_edge_2->id,
            'option_edge_3' => $response->option_edge_3->id,
            'option_edge_4' => $response->option_edge_4->id,
            'option_side_1' => $response->option_side_1->id,
            'option_side_2' => $response->option_side_2->id,
            'option_side_3' => $response->option_side_3->id,
            'option_side_4' => $response->option_side_4->id,
        ]);
    }
}
