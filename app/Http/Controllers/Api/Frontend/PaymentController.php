<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PaymentController extends Controller
{
    public function AllPaymentMethod(){
    	$payments = DB::table('payments')->get();
        return response()->json([
            'data'=>$payments,
            'success'=>true,
        ]);

    }
}
