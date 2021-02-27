<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand as RequestsBrand;
use App\Models\Brand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('admin.pages.brand.index',compact('brands'));
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
    public function store(RequestsBrand $request)
    {
        $brand = new Brand();
        $brand->brand_name=$request->name;
        $brand->save();
        Toastr::success('Brand added successfully :)','Success');
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
    public function update(RequestsBrand $request, $id)
    {
        $brand =Brand::find($id);
        $brand->brand_name=$request->name;
        $brand->save();
        Toastr::success('Brand updated successfully :)','Success');
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
        $brand =Brand::find($id);
        $brand->delete();
        Toastr::success('Brand deleted successfully :)','Success');
        return back();
    }
}
