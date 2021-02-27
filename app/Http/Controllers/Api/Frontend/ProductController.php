<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProductController extends Controller
{
    
    public function AllProduct(){
        $products = DB::table('products')
        ->join('categories','products.cat_id','categories.id')
        ->join('subcategories','products.subcat_id','subcategories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','subcategories.subcat_name','brands.brand_name')
        ->paginate(6);

       
        return response()->json([
            'data'=>$products,
             
           
        ]);
    }

    public function SingleProduct($slug){
        $product = DB::table('products')
        ->join('categories','products.cat_id','categories.id')
        ->join('subcategories','products.subcat_id','subcategories.id')
        ->join('brands','products.brand_id','brands.id')
        ->join('sizes','products.size_id','sizes.id')
        ->join('colors','products.color_id','colors.id')
        ->select('products.*','categories.category_name','subcategories.subcat_name',
        'brands.brand_name','colors.product_color','sizes.product_size')
        ->where('products.product_slug',$slug)
        ->first();
 
   

        return view('frontend.pages.product.show',compact('product'));
    
        // return response()->json([
        //     'data'=>$product,
           
        // ]);
    }

    public function RecentProducts(){
        $products = DB::table('products')->orderBy('id','DESC')->limit(5)->get();
        return view('frontend.partials.sidebar',compact('products'));
    }

    public function WishlistProduct($id){
        $user_id = Auth::id();

        $product =DB::table('wishlist')->where('user_id',$user_id)->where('product_id',$id)->first();
        if($product){
            return response()->json([
                'message'=>'Product already added on your wishlist',
            ]);
        }else{
            $data = array();
            $data['user_id']=$user_id;
            $data['product_id']=$id;
            DB::table('wishlist')->insert($data);
            return response()->json([
                'message'=>'Product added on your wishlist',
            ]);

        }
    }

    public function SubCategoryProduct($id){
        $products = DB::table('products')->where('subcat_id',$id)->get();
        return response()->json([
            'data'=>$products,
        ]);
    }

    public function CategoryProduct($id){
        $products = DB::table('products')->where('cat_id',$id)->get();
        return response()->json([
            'data'=>$products,
        ]);
    }




}
