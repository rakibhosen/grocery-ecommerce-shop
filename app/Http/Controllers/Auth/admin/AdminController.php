<?php

namespace App\Http\Controllers\Auth\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;


class AdminController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  // public function __construct()
  // {
  //   $this->middleware('auth:admin');
  // }
  // function __construct()
  // {
  //      $this->middleware('permission:admin.view|admin.create|admin.edit|admin.delete', ['only' => ['index','store']]);
  //      $this->middleware('permission:admin.create', ['only' => ['create','store']]);
  //      $this->middleware('permission:admin.edit', ['only' => ['edit','update']]);
  //      $this->middleware('permission:admin.delete', ['only' => ['destroy']]);
  // }
  public function index(){
    return view('admin.dashboard');
  }

}
