<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            // Admin
            if ($userRole == 0) {
                return $next($request);
            }
            // Dental office
            elseif ($userRole == 1) {
                return redirect()->route('dentaloffice.dashboard');
            }
            // Partner Lab
            elseif ($userRole == 2) {
                return redirect()->route('partnerlab.dashboard');
            }
        }

        // If the user is not authenticated or doesn't have the required role, return a 403 Forbidden response
        return response('Unauthorized', 403);
    }
}
