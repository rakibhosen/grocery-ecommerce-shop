<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use App\Mail\ForgotMail;
use App\User;
use Exception;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotController extends Controller
{
    //forgot password method
    public function ForgotPassword(ForgotRequest $request){
        $email = $request->email;
        if(User::where('email',$email)->doesntExist()){
            return response()->json([
                'message'=>'email invalid'
            ]);
        }

        $token = rand(10,100000);


        try{
            DB::table('password_resets')->insert([
                'email'=>$email,
                'token'=>$token,
            ]);

            Mail::to($email)->send(new ForgotMail($token));
            return response()->json([
                'success'=>true,
                'message'=>'Reset password sent to your email'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ]);
        }

    }

    public function ResetPassword(ResetRequest $request){
        $email= $request->email;
        $token = $request->token;
        $password = Hash::make($request->password);

        $checkEmail = DB::table('password_resets')->where('email',$email)->first();
        $checkPin =   DB::table('password_resets')->where('token',$token)->first();

        if(!$checkEmail){
            return response()->json([
                'message'=>'Invalid Email'
            ]);
        }

        if(!$checkPin){
            return response()->json([
                'message'=>'Invalid Pin'
            ]);
        }

        DB::table('users')->where('email',$email)->update(['password'=>$password]);
        DB::table('password_resets')->where('email',$email)->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Password Changes successfully'
        ]);

    }


}
