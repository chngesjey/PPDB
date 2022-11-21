<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use Auth;
use DB;
use Str;

class AuthAdminLoginController extends Controller
{
    public function create()
    {
        return view('Admin.Auth.login');
    }

    public function store(LoginRequest $request)
    {
       $request->authenticate();

       $request-session()->regenerate();

       return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect('/login');
    }
}
