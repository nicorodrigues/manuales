<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ForbiddenContent
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            $manual = explode('/', $_SERVER['REQUEST_URI'])[2];

            foreach (Auth::user()->manuals as $key => $value) {
                if ($value->name === $manual && $value->permiso()) {
                    return $next($request);
                }
            }

            return redirect('/forbidden')->with('manual', $manual);
        }

        return redirect('/login');
    }
}
