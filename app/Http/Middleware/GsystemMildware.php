<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GsystemMildware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('gystem_login','id_account')) {
            // user value cannot be found in session
              return redirect()->route('gosford.login')->with('alert','You must login first !');

        }
        return $next($request);
    }
}
