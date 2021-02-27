<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function Categories(){
        $data = DB::table('categories')->get();
        return response()->json([
            'data'=>$data,
        ]);
        
    }

    public function SubCategories(){
        $data = DB::table('subcategories')->get();
        return response()->json([
            'data'=>$data,
        ]);
        
    }

    public function CategoriesWithSub(){
        // $data = DB::table('categories')
        //             ->join('subcategories','categories.id','subcategories.cat_id')
        //             ->select('categories.*','subcategories.subcat_name')
        //             ->get();
        $data = Category::with('subcategory')->get();
        return response()->json([
            'data'=>$data,
        ]);
        
    }

    
}

// $users = DB::table('users')
//             ->join('contacts', 'users.id', '=', 'contacts.user_id')
//             ->join('orders', 'users.id', '=', 'orders.user_id')
//             ->select('users.*', 'contacts.phone', 'orders.price')
//             ->get();