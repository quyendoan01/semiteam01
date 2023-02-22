<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function product(){
        return view('product');
    }

    public function staff(){
        return view('staff');
    }

    public function add_account(){
        return view('add_account');
    }
    public function user_inf(){
        return view('user_information');
    }
    public function bill(){
        return view('bill');
    }
}
