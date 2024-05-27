<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationSignIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'Email' => 'required|email',
            'Senha' => 'required|min:8',
        ], [
            'Email.required' => 'O campo email deve ser preenchido',
            'Senha.required' => "O campo senha deve ser preenchido",
            'Senha.min' => "o campo senha deve haver mais do que :min digitos",
        ]);
        return $next($request);
    }
}
