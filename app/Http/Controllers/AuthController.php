<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function postlogin(Request $request)
    {
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Di Isi',
            'password.required' => 'Password Wajib Di Isi',
        ]);

        $infologin =[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function simpanRegister(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(20),
        ]);

        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect('/login');
    }
}
