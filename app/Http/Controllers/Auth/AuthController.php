<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function loginpage()
    {

        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            Session::put('role_id', $user->role_id);
            Session::put('user_id', $user->user_id);

            return redirect()->route('admin-dashboard')->with('success', 'Login successful');
    }

        return back()->with([
            'error' => 'Invalid credentials'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('role_id');
        Session::flush();
        return redirect()->route('login-page')->with('success', 'Logout successful');
    }   
}
