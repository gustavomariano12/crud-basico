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
            'Email' => 'required|email|unique:funcionarios,email',
            'Username' => 'required|unique:funcionarios,username',
            'Senha' => 'required|min:8',
            'CSenha' => 'required|min:8',
        ], [
            'Email.required' => 'O campo email deve ser preenchido',
            'Email.unique' => 'este email está em uso',
            'Username.required' => "O campo username deve ser preenchido",
            'Username.unique' => 'este username está em uso',
            'Senha.required' => "O campo senha deve ser preenchido",
            'Senha.min' => "o campo senha deve haver mais do que :min digitos",
            'CSenha.required' => "O campo confirmar deve ser preenchido",
            'CSenha.min' => "o campo confirmar senha deve haver mais do que :min digitos"

        ]);
        return $next($request);
    }
}
