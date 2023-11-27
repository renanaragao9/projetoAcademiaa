<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
     public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->profile == 2 || $request->user()->profile == 1) {
            return $next($request);
        }
        
        // Redirecionamento ou resposta de erro, caso o usuário não tenha permissão
        return abort(403, 'Você não possui permissão para acessar esta página.');
    }
}
