<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissions): Response
    {
        
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $role = Auth::user()->role_id;
        
        $hasPermission = Role::where('role_id', $role)
            ->where('slug', $permissions)
            ->where('value', true)
            ->exists();


        if(!$hasPermission) {
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }

        // if (!$request->user()->hasPermissionTo($permissions)) {
        //     return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        // }
        return $next($request);
    }
}
