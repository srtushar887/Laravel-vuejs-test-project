<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web',['except'=>['logout']]);
    }


    public function showLoginform()
    {
        return view('auth.admin-login');
    }



    //this is login function for admin which is given email and password to get data form database
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return response()->json(Auth::user(),200);
        }

        return response()->json('no user',200);

    }



    //this funsion for admin logout which i customized to cpy form loginController
    public function userLogout()
    {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return response()->json('logout',200);
    }
}
