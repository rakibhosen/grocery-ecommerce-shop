<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function index(){
        $products = DB::table('products')
        ->join('categories','products.cat_id','categories.id')
        ->join('subcategories','products.subcat_id','subcategories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','subcategories.subcat_name','brands.brand_name')
        ->paginate(9);
        $categories =Category::With('subcategory')->orderBy('category_name','asc')->get();
       
        return view('frontend.index',compact('products','categories'));

    }

    public function filterPrice(Request $request)
{
    // You should also add input validation here.

    $products = DB::table('products')
                ->whereBetween('product_price', 
                 [$request->input('min'), $request->input('max')])
                 ->join('categories','products.cat_id','categories.id')
                 ->join('subcategories','products.subcat_id','subcategories.id')
                 ->join('brands','products.brand_id','brands.id')
                 ->select('products.*','categories.category_name','subcategories.subcat_name','brands.brand_name')
                 ->paginate(15);
         
 response()->json($products);
                $get_one = DB::table('products')->where('product_buy_one_get_one',1)->orderBy('id','DESC')->paginate(3);


     return view('frontend.partials.products',compact('products'));
}

public function searchProduct(Request $request){
            $search = $request->search;
            $products = DB::table('products')
            ->orWhere('product_name', 'like','%'.$search.'%')
            ->orWhere('product_description', 'like','%'.$search.'%')
            ->orWhere('product_quantity', 'like','%'.$search.'%')
            ->orWhere('product_price', 'like','%'.$search.'%')
            ->join('categories','products.cat_id','categories.id')
            ->join('subcategories','products.subcat_id','subcategories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','subcategories.subcat_name','brands.brand_name')
            ->orderBy('id','desc')
            ->paginate(9); 
            return view('frontend.pages.product.search',compact('search','products'));
}

public function SubCategoryProduct($id){
    $products = DB::table('products')->where('subcat_id',$id)->orderBy('id','DESC')->paginate(6);
    $categories =Category::With('subcategory')->orderBy('category_name','desc')->get();
    return view('frontend.index',compact('products','categories'));
}


public function CheckOut(){
    $payments = DB::table('payments')->get();
    return view('frontend.pages.checkout.checkout',compact('payments'));
}





}
