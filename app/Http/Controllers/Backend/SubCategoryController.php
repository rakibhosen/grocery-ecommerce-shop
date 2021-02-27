<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subcategory as SubCat;
use App\Models\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
        $sub_categories = Subcategory::all();

        return view('admin.pages.category.subcategory',compact('sub_categories'));
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
    public function store(SubCat $request)
    {
        $category = new Subcategory();
        $category->subcat_name=$request->name;
        $category->cat_id = $request->cat_id;
        $category->save();
        Toastr::success('Sub Category added successfully :)','Success');
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
    public function update(SubCat $request, $id)
    {
        $category =Subcategory::find($id);
        $category->subcat_name=$request->name;
        $category->cat_id = $request->cat_id;
        $category->save();
        Toastr::success('Sub Category updated successfully :)','Success');
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
        $category =Subcategory::find($id);
        $category->delete();
        Toastr::success('Category deleted successfully :)','Success');
        return back();
    }
}
