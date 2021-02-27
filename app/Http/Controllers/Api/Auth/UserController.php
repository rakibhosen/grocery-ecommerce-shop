<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function userProfile(){
        $divisions = DB::table('divisions')->get();
        $districts = DB::table('districts')->get();
        return view('frontend.pages.user.profile',compact('divisions','districts'));
    }

    public function userUpdate(Request $request, $id){
        $user= User::findOrfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->district_id = $request->district_id;
        $user->division_id = $request->division_id;
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('Updated successfully :)','Success');
        return redirect()->route('user.profile');
    }

}
