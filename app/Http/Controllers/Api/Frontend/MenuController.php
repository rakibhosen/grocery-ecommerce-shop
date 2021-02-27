<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Menu;

class MenuController extends Controller
{


    public function AllMenu(){


    $menus = Menu::with('submenu.subcat')->get();
    return response()->json([
        'data'=>$menus,
         
       
    ]);
    }

}
