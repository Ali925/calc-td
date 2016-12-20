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

        $edge_one = [];
        $edge_two = [];
        $edge_three = [];
        $edge_four = [];
        $side_one = [];
        $side_two = [];
        $side_three = [];
        $side_four = [];

        foreach ($response->option_edge_1 as $edge_1){
            $edge_one[] = $edge_1->id;
        }

        foreach ($response->option_edge_2 as $edge_2){
            $edge_two[] = $edge_2->id;
        }

        foreach ($response->option_edge_3 as $edge_3){
            $edge_three[] = $edge_3->id;
        }

        foreach ($response->option_edge_4 as $edge_4){
            $edge_four[] = $edge_4->id;
        }

        foreach ($response->option_side_1 as $side_1){
            $side_one[] = $side_1->id;
        }

        foreach ($response->option_side_2 as $side_2){
            $side_two[] = $side_2->id;
        }

        foreach ($response->option_side_3 as $side_3){
            $side_three[] = $side_3->id;
        }

        foreach ($response->option_side_4 as $side_4){
            $side_four[] = $side_4->id;
        }



        return response()->json([
            'option_edge_1' => json_encode($edge_one),
            'option_edge_2' => json_encode($edge_two),
            'option_edge_3' => json_encode($edge_three),
            'option_edge_4' => json_encode($edge_four),
            'option_side_1' => json_encode($side_one),
            'option_side_2' => json_encode($side_two),
            'option_side_3' => json_encode($side_three),
            'option_side_4' => json_encode($side_four),
            'access_one' => $response->access_one_side,
            'access_two' => $response->access_two_side,
            'access_three' => $response->access_three_side,
            'access_four' => $response->access_four_side,
        ]);
    }
}
