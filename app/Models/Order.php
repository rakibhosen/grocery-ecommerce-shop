<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function carts(){
        return $this->hasMany('App\Models\Cart');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
