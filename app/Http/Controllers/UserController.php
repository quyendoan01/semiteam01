<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function login_auth(Request $request){

    }
    public function logout(){
        Auth::logout();

        return redirect()->route('home');
    }


}
