<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCheckerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && ($request->user()->checker != 1)) {
            return $next($request);
        }

        if ($request->user() && $request->user()->checker == 1) {
            return redirect()->back()->with('msg-error', 'Você não possui permissão para adicionar, editar ou excluír.');
        }

       
    }
}
