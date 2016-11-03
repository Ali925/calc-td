<?php

namespace App\Http\Controllers;

use App\EdgeCategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class EdgeCategoryController extends Controller
{
    public function getAll()
    {
        $model = EdgeCategory::with('edgeDecor')->get();
        return response()->json($model);
    }
}
