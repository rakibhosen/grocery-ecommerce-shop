<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function brands(){
        $brands = DB::table('brands')->get();
        return response()->json([
            'data'=>$brands,
        ]);
    }
}
