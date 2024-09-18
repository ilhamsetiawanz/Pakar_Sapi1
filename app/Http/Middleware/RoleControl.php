<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
          return redirect()->route('login');  
        }

        $userRoleAuth = Auth::user()->role;

        switch ($role) {
            case 'admin':
                if ($userRoleAuth == 'admin') {
                    return $next($request);
                }
                break;
            case 'user':
                if ($userRoleAuth == 'user') {
                    return $next($request);
                }
                break;
        }

        switch ($userRoleAuth) {
            case 'admin':
                return redirect()->route('Admin');
                break;
            
            default:
                return redirect()->route('Home');
                break;
        }
    }
}
