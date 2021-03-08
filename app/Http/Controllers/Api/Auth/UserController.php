<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth as FacadesAuth;
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
        $auth_id= Auth::id();
        $orders = Order::where('user_id',$auth_id)->with('carts','user')->withCount('carts')->orderBy('id','desc')->get();
        
        // $track_order = Order::where('order_number',$request->order_number)->with('carts','user')->get();
        return view('frontend.pages.user.profile',compact('divisions','districts','orders'));
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
