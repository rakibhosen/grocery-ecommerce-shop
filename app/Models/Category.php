<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategory(){
       return $this->hasMany('App\Models\Subcategory','cat_id');
    }

    public function product(){
        return $this->hasMany(Product::class);
     }
}
