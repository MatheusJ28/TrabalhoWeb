<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Verificar se NAO existe um usuario logado
        if (!Auth::check())
        {
            //Se não existir a sessão, redireciona para a rota de login
            return redirect()->route('login');
        }
        //Se existir, continua o fluxo
        return $next($request);
    }
}
