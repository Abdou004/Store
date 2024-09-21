<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show(){
        return view('login.show');
    }
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email'=>$email,'password'=>$password];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('homepage')->with('success','Vous etes bien connecte  '. $email . " .");
        }else
            return back()->withErrors([
            'email'=>'Email ou mot de pass incorrect !'
        ])->onlyInput('email');   
    }
    public function logout(){
        Session::flush();
        return to_route('login')->with('success','Vous etes Bien Deconnecte');
    }
}
