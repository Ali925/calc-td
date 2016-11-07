<?php

namespace App\Http\Controllers;

use App\DecorCategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class DecorCategoryController extends Controller
{
    public function getAll()
    {
        $response = DecorCategory::with('decor')->get();
        return response()->json($response);
    }

    public function getById($id)
    {
        $response = DecorCategory::where('id',$id)->with('decor')->first();
        return response()->json($response);
    }
}
