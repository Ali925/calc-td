<?php

namespace App\Http\Controllers;

use App\BlankType;
use App\EdgeCategory;
use App\PatternOption;
use App\Product;
use App\Thickness;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlankTypesController extends Controller
{

    public function getBlankType(Request $request)
    {
        $query = Product::where('blank_type_id', $request->blank_type_id)
            ->where('blank_type_id', $request->blank_type_id)

            ->where('blank_type_id', $request->blank_type_id);
    }

}
