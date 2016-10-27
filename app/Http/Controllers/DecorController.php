<?php

namespace App\Http\Controllers;

use App\Decor;
use Illuminate\Http\Request;

use App\Http\Requests;

class DecorController extends Controller
{
    public function getAll()
    {
        $response = Decor::all();
        return response()->json($response);
    }

    public function getById($id)
    {
        $response = Decor::where('id',$id)->with('decorCategory')->first();
        return $response;
    }
}
