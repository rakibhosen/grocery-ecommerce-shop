<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // public function submenu(){
    // 	return $this->hasMany(Submenu::class);
    // }

    function submenu(){
    return $this->hasMany('App\Models\Submenu');
}


}
