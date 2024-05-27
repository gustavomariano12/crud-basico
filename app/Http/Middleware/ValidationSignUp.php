<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationSignUp
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
            'Username' => 'required',
            'Senha' => 'required|min:8',
            'CSenha' => 'required|min:8',
        ], [
            'Email.required' => 'O campo email deve ser preenchido',
            'Username.required' => "O campo username deve ser preenchido",
            'Senha.required' => "O campo senha deve ser preenchido",
            'CSenha.required' => "O campo confirmar deve ser preenchido",
            'Senha.min' => "o campo senha deve haver mais do que :min digitos",
            'CSenha.min' => "o campo confirmar senha deve haver mais do que :min digitos"

        ]);
        return $next($request);
    }
}
