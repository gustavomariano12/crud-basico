<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Funcionario;
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

        if($senha !== $csenha){
            return redirect()->back()->withInput()->withErrors(['senha' => 'senhas não coincidem']);
        }
        $token = Str::random(60);
        $user = new Funcionario();
        $user->Username = $username;
        $user->Email = $email;
        $user->Senha = $senha;
        $user->Token = $token;
        $user->save();
        return redirect('/dashboard')->cookie('Token', $token);

    }

    public function signIn(Request $req) {
        $email = $req->input('Email');
        $senha = $req->input('Senha');
        $user = Funcionario::where('Email', $email)->first();
        $token = Str::random(60);
        if($user === null || $user->Senha !== $senha ){
            return redirect()->back()->withInput()->withErrors(['email' => 'Credenciais inválidas']);
        }
        $user->Email = $email;
        $user->Senha = $senha;
        $user->Token = $token;
        $user->save();
        return redirect('/dashboard')->cookie('Token', $token);

    }

    public function getAccount(Request $req){
        $token = $req->cookie('Token');
        $user = Funcionario::where('Token', $token)->first();
        return view('account')->with("token", $user);
    }

    public function getUpdateAccount(Request $req){
        $token = $req->cookie('Token');
        $user = Funcionario::where('Token', $token)->first();
        return view('updateaccount')->with("token", $user);
    }


    /*public function updateAccount(Request $req){
        $token = $req->cookie('Token');
        $senha = $req->input('Senha');
        $nSenha = $req->input('NSenha');
        $cSenha = $req->input('CSenha');
        $user = Funcionario::where('Token', $token)->first();

        if($user->Senha !== $senha){
            return redirect()->back()->withInput()->withErrors(['senha' => 'senha inválida']);
        }
        if($nSenha !== $cSenha){
            return redirect()->back()->withInput()->withErrors(['senha' => 'Senhas não coincidem']);
        }
        if($cSenha === '' && $nSenha === ''){
            $user->update([
                "Username" => $req->Username,
                "Email" => $req->Email,
                "Senha" => $req->Senha
            ]);
            return redirect()->back();
        }
        $user->update([
            "Username" => $req->Username,
            "Email" => $req->Email,
            "Senha" => $req->CSenha
        ]);
        return redirect()->back();

    }
    */
    public function logout()
    {
        Auth::logout();
        $cookieJar = new CookieJar();
        $cookie = $cookieJar->forget('Token');
        // Redirecionar para a página de login ou outra página de sua escolha
        return redirect('/')->withCookie($cookie);
    }
}
