<?php

namespace App\Http\Middleware;

use Closure;

class checkAdmin
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
        // jika blm login dan dia member, maka kembalikan ke halaman utama
        if(!auth()->check() || auth()->user()->role == "Member")
            return redirect('/');
        return $next($request);
    }
}
