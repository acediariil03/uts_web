<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    //
    function index(Request $request)
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }else{
            return redirect('login')->with('fail', 'Incorrect Email or Password');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    function registerView(Request $request)
    {
        return view('auth.register');
    }

    function register(Request $request)
    {
        
        $request->validate([
            'name'=>'required|max:200',
            'email'=>'required|unique:users|max:200',
            'password'=>'required|min:8|max:9'
        ]);

        $user=new User();
        $user->name = $request->name;
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect('login')->with('success','Create Account Successfully!');
    }
}