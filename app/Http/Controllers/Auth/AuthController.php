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

            return redirect()->route('admin-dashboard')->with('success', 'Login successful');
    }

        return back()->with([
            'error' => 'Invalid credentials'
        ]);
    }
}
