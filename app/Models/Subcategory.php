<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id');
     }

     public function product(){
        return $this->BelongsTo(Product::class);
     }


     


 }
