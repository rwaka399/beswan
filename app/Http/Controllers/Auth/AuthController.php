<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function loginpage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    try {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Cek user & password cocok
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            // Ambil role pertama user
            $userRole = $user->userRole->first();

            if (!$userRole) {
                Auth::logout();
                return redirect()->route('login-page')->with('error', 'User does not have a role assigned');
            }

            // Simpan role & user_id ke session
            Session::put([
                'role_id' => $userRole->role_id,
                'user_id' => $user->user_id,
            ]);

            return redirect()->intended('/')->with('success', 'Login successful');
        }

        // Kalau kombinasi user dan password salah
        return redirect()->route('login-page')->with([
            'error' => 'Email or password is incorrect'
        ]);

    } catch (\Throwable $e) {
        // Tangkap error tak terduga
        return back()->with('error', 'Something went wrong. Please try again later.');

    }
}


    public function registerpage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
        ]);
    
        DB::beginTransaction();
    
        try {
            $userAdmin = User::where('user_id', 1)->firstOrFail();
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'created_by' => $userAdmin->user_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
    
            UserRole::create([
                'user_id' => $user->user_id,
                'role_id' => Role::where('role_name', 'User')->firstOrFail()->role_id,
                'created_by' => $userAdmin->user_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
    
            DB::commit();
    
            Auth::login($user);
            Session::put([
                'role_id' => $user->userRole->first()->role_id,
                'user_id' => $user->user_id,
            ]);


            return redirect()->intended('/')->with('success', 'Registration successful, please login');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }




    public function logout()
    {
        Auth::logout();
        Session::forget([
            'role_id',
            'user_id',
        ]);
        Session::flush();
        return redirect()->route('login-page')->with('success', 'Logout successful');
    }
}
