<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role1, $role2)
    {

        if (Auth::check() && (Auth::user()->role_id == $role1 || Auth::user()->role_id == $role2)) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }

        // return abort(403, 'Unauthorized action.');
    }
}
