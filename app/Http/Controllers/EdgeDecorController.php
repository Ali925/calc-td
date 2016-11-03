<?php

namespace App\Http\Controllers;

use App\EdgeDecor;
use Illuminate\Http\Request;

use App\Http\Requests;

class EdgeDecorController extends Controller
{
    public function getAll()
    {
        $model = EdgeDecor::all();
        return response()->json($model);
    }
}
