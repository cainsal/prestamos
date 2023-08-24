<?php

namespace App\Http\Middleware;

use Closure;

class Cliente
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
        if(auth()->user()==null){
            return redirect('login');
        };

        if(auth()->user()->rol === 'Cliente'){
            return $next($request);
        }else{
            return redirect('solicitudes');
        }
    }
}
