<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }
    
    public function showRegister(){
        return view('register');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }

        return view('login')->with("error", "Login details are invalid");
    }

    public function registerPost(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $detail['username'] = $request->username;
        $detail['email'] = $request->email;
        $detail['password'] = Hash::make($request->password);

        $user = User::create($detail);

        if(!$user){
            return redirect(route('register'))->with("error", "Registration failed!, try again.");
        }
        return redirect(route('login'))->with("success", "Registration successful, you can Login now");
    }
    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect(route('home'));
    }
}
