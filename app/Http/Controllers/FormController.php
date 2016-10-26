<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getAll()
    {
        $response = Form::all();
        return response()->json($response);
    }

    public function getById($id)
    {
        $response = Form::where('id',$id)->with('decor')->first();
        return response()->json($response);
    }
}
