<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function hot_deal(){
        $hot_deal = DB::table('products')->where('product_hot_deal',1)->orderBy('id','DESC')->get();
        return response()->json([
            'data'=>$hot_deal,
        ]);
    }

    public function GetOne(){
        $get_one = DB::table('products')->where('product_buy_one_get_one',1)->orderBy('id','DESC')->get();
        return response()->json([
            'data'=>$get_one,
        ]);
    }
}
