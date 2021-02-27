<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        $categories = DB::table('categories')->get();
        $sub_categories = DB::table('subcategories')->get();
        $brands =DB::table('brands')->get();
        $colors =DB::table('colors')->get();
        $sizes =DB::table('sizes')->get();
        return view('admin.pages.products.index',compact('products','categories','brands','sub_categories','colors','sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'cat_id'=>'required',
            'subcat_id'=>'required',
            'brand_id'=>'required',
            'images'=>'required',
            'quantity'=>'required',
            'description'=>'required',
         
        ],[
            'name.required'=>'Please provide product  name',
            'price.required'=>'Please provide product  price',
            'cat_id.required'=>'Please provide product category',
            'subcat_id.required'=>'Please provide product  Subcategory',
            'brand_id.required'=>'Please provide product Brand',
            'images.required'=>'Please provide product  image',
            'quantity.required'=>'Please provide product quantity',
            'description.required'=>'Please provide product description',
        ]);

        // if($validator->fails()){
        //     $errors =$validator->getMessageBag()->first();
        //     return view('admin.pages.products.index',compact('errors'));;
        // }


        $product = new Product();
        $product->product_name = $request->name;
        $product->product_description = $request->description;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->product_stockout = $request->stockout;
        $product->product_hot_deal = $request->hot_deal;
        $product->product_buy_one_get_one = $request->buy_one_get_one;
        $product->product_price = $request->price;
        $product->product_offer_price = $request->offer_price;
        $product->admin_id = 1;
        $product->brand_id = $request->brand_id;
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->product_quantity = $request->quantity;
        $product->product_slug = Str::slug($request->name);
        $product->product_status = 1;
        // image upload
        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $file)
           {
               $name = time().'.'.$file->extension();
               $file->move(public_path().'/upload/product/', $name);  
               $data[] = $name;  
           }

        $product->product_image = json_encode($data);

        }
        // if ($request->hasFile('images')) {

        //     foreach($request->file('images') as $file){
        //         $img = time() . '.' . $file->getClientOriginalExtension();
        //     $location = public_path('upload/product' . $img);
        //     Image::make($file)->save($location);
        //     $data[]=$img;

        //     }

        //     $product->image = json_encode($data);

        // }




        $product->save();
        Toastr::success('Product updated successfully :)','Success');
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'cat_id'=>'required',
            'subcat_id'=>'required',
            'brand_id'=>'required',
            'quantity'=>'required',
            'description'=>'required',
         
        ],[
            'name.required'=>'Please provide product  name',
            'price.required'=>'Please provide product  price',
            'cat_id.required'=>'Please provide product category',
            'subcat_id.required'=>'Please provide product  Subcategory',
            'brand_id.required'=>'Please provide product Brand',
            'quantity.required'=>'Please provide product quantity',
            'description.required'=>'Please provide product description',
        ]);



        $product = Product::findOrfail($id);
        $product->product_name = $request->name;
        $product->product_description = $request->description;
        $product->product_color = $request->color;
        $product->product_size = $request->size;
        $product->product_stockout = $request->stockout;
        $product->product_hot_deal = $request->hot_deal;
        $product->product_buy_one_get_one = $request->buy_one_get_one;
        $product->product_price = $request->price;
        $product->product_offer_price = $request->offer_price;
        $product->admin_id = 1;
        $product->brand_id = $request->brand_id;
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->product_quantity = $request->quantity;
        $product->product_slug = Str::slug($request->name);
        $product->product_status = 1;
        // image upload
        // if($request->hasfile('images'))
        // {
        //    foreach($request->file('images') as $file)
        //    {
        //        $name = time().'.'.$file->extension();
        //        $file->move(public_path().'/upload/product/', $name);  
        //        $data[] = $name;  
        //    }

        // $product->image = json_encode($data);

        // }
        if ($request->hasFile('images')) {

            // delete old file
            foreach(json_decode($product->product_image) as $image){
            if(File::exists(public_path('upload/product/' . $image))){
                File::delete(public_path('upload/product/' . $image));
            }else{
                dd('File does not exists.');
            }
        }


        // insert multiple image
            foreach($request->file('images') as $file){
            $img = time() . '.' . $file->getClientOriginalExtension();
            $location = public_path('upload/product/' . $img);
            Image::make($file)->save($location);
            $data[]=$img;

            }

            $product->product_image = json_encode($data);

        }




        $product->save();
        Toastr::success('Product updated successfully :)','Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrfail($id);

        
        if (!is_null($product)) {
            if (is_array($product->image) || is_object($product->image))
                {
                    foreach(json_decode($product->image) as $image){
                        //delete productimage
                        if(File::exists(public_path('upload/product/' . $image))){
                            File::delete(public_path('upload/product/' . $image));

                        }else{
                            dd('File does not exists.');
                        }
                    }
                }

            $product->delete();
        }
        Toastr::success('Product deleted successfully :)','Success');
        return back();

    }
}
