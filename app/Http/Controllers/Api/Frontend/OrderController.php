<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB as FacadesDB;

class OrderController extends Controller
{
    public function OrderDetails(){
            $user_id = Auth::id();
            $product= DB::table('carts')
            ->where('user_id',$user_id)
             ->where('order_id',NULL)
            ->get();
            $total = $product->sum('sub_total');
            return response([
            'data'=>$product,
            'total_price'=>$total,
        ]);

        }

       public function OrderStore(Request $request){
        // $this->validate($request,[
        //     'name' =>'required',
        //     'email' =>'required',
        //     'phone_no' =>'required',
        //     'payment_name' =>'required',
        //     'shipping_address' =>'required',
        // ]);
        if($request->payment_name !='cash_in'){
            if($request->transaction_id == NULL ||  empty($request->transaction_id)){
                Toastr::success('Order successfull :)','Success');
                return redirect()->route('cart.index');
            }
        }


        $user_id = Auth::id();
        $data = array();
        $data['shipping_address']=$request->shipping_address;
        $data['user_id']= $user_id;
        $data['payment_name']=$request->payment_name;
        $data['message']=$request->message;
        $data['phone']=$request->phone_no;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $latestOrder =DB::table('orders')->latest('id')->first();
 
 
        if($latestOrder){
            $data['order_number']='#'. str_pad($latestOrder->id+1, 8, "0", STR_PAD_LEFT);
        }else{
        $data['order_number']='#'. str_pad("0", 8, "0", STR_PAD_LEFT);
    }
        DB::table('orders')->insert($data);

       $carts=Cart::where('user_id',$user_id)
       ->where('order_id',NULL)
       ->get();
     
       $order= DB::table('orders')->latest('id')->first();;
 
        foreach($carts as $cart){

            $cart->order_id = $order->id;
            $cart->save();
        }
        Toastr::success('Order successfull :)','Success');
        return redirect()->route('ecommerce.index');

        }

public function OrderTrack(Request $request){
    $track_order = Order::where('order_number',$request->order_number)->with('carts','user')->get();
    return view('frontend.pages.orderTrack.orderDetails',compact('track_order'));
}

 }


