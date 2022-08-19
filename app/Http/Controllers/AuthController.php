<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
            return redirect('/dashboard/tasks');
        else
            return back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/auth/login');
    }
}
