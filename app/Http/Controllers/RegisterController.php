<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.register',[
            "title" => "Register",
        ]); 
    }

    public function store(Request $request){
        $validatedata = $request->validate([
            'name' => 'required|max:255|unique:users|min:3',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|max:255',
        ]);

        $validatedata['password'] = bcrypt($validatedata['password']);
        User::create($validatedata);

        $request->session()->flash('success', 'Register succeed, please Login');
        return redirect('/login')->with('success', 'Register succeed, please Login');
    }
}
