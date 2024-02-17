<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login.login',[
            "title" => "Login",
        ]); 
    }

    public function authenticate(Request $request){
        $cred = $request -> validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($cred)){
            $request->session()->regenerate();
            return redirect('auth/home/all')->with('success','Login Success');
        }
        return back()->with('LoginError','Login Failed! Try Again');
    }

    public function logout( ){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/register');
    }


}

