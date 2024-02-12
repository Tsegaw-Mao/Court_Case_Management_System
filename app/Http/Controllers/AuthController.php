<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //ana
    public function register()
    {
        return view('Auth/register');
    }
    public function registerSave(Request $request){
        Validator::make($request->all(),[
            'name'=>'require',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ])->validate();

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'level'=>'Admin'
        ]);
        return redirect()->route('login');
    }

    public function login(){
        return view('auth/login');
    }

}
