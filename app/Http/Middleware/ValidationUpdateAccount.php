<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationUpdateAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if($request->input('NSenha') == "" && $request->input('CSenha') == ""){
            $request->validate([
                'Email' => 'email',
                'Username' => '',
                'Senha' => 'required|min:8',

            ], [
                'Email.required' => 'O campo email deve ser preenchido',
                'Senha.required' => "O campo senha deve ser preenchido",
                'Senha.min' => "o campo senha antiga deve haver mais do que :min digitos",
            ]);
            return $next($request);
        }

        $request->validate([
            'Email' => 'email',
            'Username' => '',
            'Senha' => 'required|min:8',
            'CSenha' => 'min:8',
            'NSenha' => 'min:8',

        ], [
            'Email.required' => 'O campo email deve ser preenchido',
            'Senha.required' => "O campo senha deve ser preenchido",
            'Senha.min' => "o campo senha antiga deve haver mais do que :min digitos",
            'CSenha.min' => "o campo confirmar senha deve haver mais do que :min digitos",
            'NSenha.min' => "o campo confirmar senha deve haver mais do que :min digitos",

        ]);
        return $next($request);
    }
}
