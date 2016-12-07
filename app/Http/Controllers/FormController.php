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
            'edge_1' => $response->option_edge_1,
            'edge_2' => $response->option_edge_2,
            'edge_3' => $response->option_edge_3,
            'edge_4' => $response->option_edge_4,
            'side_1' => $response->option_side_1,
            'side_2' => $response->option_side_2,
            'side_3' => $response->option_side_3,
            'side_4' => $response->option_side_4,
        ]);
    }
}
