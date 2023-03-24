<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (! $user) {
            // Redirect to login page if user is not logged in
            return redirect('/login');
        }

        foreach ($roles as $role) {
            // Check if user has the required role
            if ($user->role == $role) {
                return $next($request);
            }
        }

        // Return a 403 Forbidden HTTP response if user does not have any of the required roles
        abort(403);

    }
}
