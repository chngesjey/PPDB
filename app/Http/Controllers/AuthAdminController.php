<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Str;

class AuthAdminController extends Controller
{
    public function adminLogin(Request $request)
    {
        return view('auth.admin');
    }

    public function postAdmin(Request $request)
    {
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'admin@sia.net',
            'password.required' => '12345678',
        ]);

        $infoAdmin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(AuthAdmin::attempt($infoAdmin)){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect('/login');
    }
}
