<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function doLogout(){
        Auth::logout();
        return redirect('login');
    }

    public function doLogin(Request $request){
        if($request->remember == null){
            if (Auth::attempt($request->only('email','password'))) {
                return redirect(url('/'));
            }
        }
        else{
            //login sekaligus remember me
            if (Auth::attempt($request->only('email','password'),true)) {
                return redirect(url('/'));
            }
        }
        $errors = array('message'=>'Email or Password is Incorrect');
        return back()->withErrors($errors);
    }
}
