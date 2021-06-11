<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

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


    public function createuser()
    {
        $new_user = new User();
        $new_user->name = "ami";
        $new_user->email = "sei@sei.com";
        $new_user->password = Hash::make('12345678');
        $new_user->save();
    }



}
