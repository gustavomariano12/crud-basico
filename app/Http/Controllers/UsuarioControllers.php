<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Str;

class UsuarioControllers extends Controller
{
    public function viewSignUp(){
        return view('signUp');
    }

    public function viewSignIn(){
        return view('signIn');
    }

    public function signUp(Request $req) {
        $username = $req->input('Username');
        $email = $req->input('Email');
        $senha = $req->input('Senha');
        $csenha = $req->input('CSenha');

        $usernameQuery = Usuario::where('Username', $username)->first();
        $emailQuery = Usuario::where('Email', $email)->first();

        if ($emailQuery !== null){
            return 'email já cadastrado, utilize outro';
        }
        if($usernameQuery !== null){
            return 'username já utilzado, utilize outro';
        }
        if($senha !== $csenha){
            return "senhas não são iguais";
        }else {
            $token = Str::random(60);
            $user = new Usuario();
            $user->Username = $username;
            $user->Email = $email;
            $user->Senha = $senha;
            $user->Token = $token;
            $user->save();
            return redirect('/dashboard')->cookie('Token', $token);
        }
    }

    public function signIn(Request $req) {
        $email = $req->input('Email');
        $senha = $req->input('Senha');
        $user = Usuario::where('Email', $email)->first();
        $token = Str::random(60);
        if($user === null){
            return 'o email ou a senha podem estar incorretos';
        }
        if($user->Senha !== $senha){
            return 'o email ou a senha podem estar incorretos';

        }else {
            $user->Email = $email;
            $user->Senha = $senha;
            $user->Token = $token;
            $user->save();
            return redirect('/dashboard')->cookie('Token', $token);
        }
    }

    public function getAccount(Request $req){
        $token = $req->cookie('Token');
        $user = Usuario::where('Token', $token)->first();
        return view('account')->with("token", $user);
    }

    public function logout()
    {
        Auth::logout();
        $cookieJar = new CookieJar();
        $cookie = $cookieJar->forget('Token');
        // Redirecionar para a página de login ou outra página de sua escolha
        return redirect('/')->withCookie($cookie);
    }
}
