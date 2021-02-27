<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cart extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function  totalCarts(){
        if(Auth::check()){
            $carts = Cart::where('user_id',Auth::id())
            ->where('order_id',NULL)
            ->get();
          
        }
        return $carts;

     }
 
 
 
     // total item
     public static function totalItems(){
         $carts = Cart::totalCarts();
         $total_item =0;
 
         foreach($carts as $cart){
             $total_item += $cart->qty;
         }
         return $total_item;
     }
}
