<?php

namespace App\Http\Middleware;

use Closure;

class Bancario
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
        if(auth()->user()->rol !== 'Cliente'){
            return $next($request);
        }else{
            return redirect('ofertas-cliente');
        }
    }
}
