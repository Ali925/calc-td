<?php

namespace App\Http\Controllers;

use App\BlankType;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlankTypesController extends Controller
{
    public function getAll()
    {
        $response['blankTypes'] = BlankType::with('forms')->get();
        $response['product'] = Product::with('blankType')
            ->with('decorCategory')->with('nip')->with('thickness')->get();
    }
}
