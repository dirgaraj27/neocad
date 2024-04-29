<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // Admin
        if ($userRole == 0) {
            return $next($request);
        }
        //Dental office
        elseif ($userRole == 1) {
            return redirect()->route('dentaloffice.dashboard');
        }
        // Partner Lab
        elseif ($userRole == 2) {
            return redirect()->route('partnerlab.dashboard');
        }
        
    }
}
