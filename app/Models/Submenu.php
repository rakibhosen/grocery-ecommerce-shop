<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    public function subcat(){
    	return $this->belongsTo(Subcategory::class);
    }


}
