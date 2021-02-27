<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'detail'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id');
     }
     public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory','subcat_id');
     }

     public function color(){
         return $this->belongsTo('App\Models\Color');
     }

     public function Size(){
        return $this->belongsTo('App\Models\Size');
    }
}
