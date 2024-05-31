<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Funcionario;

class ClienteController extends Controller
{
    public function index(){
        $cliente = Cliente::all();
        return view('index')->with("cliente", $cliente);
    }

    public function cadastrar(){
        return view('cadastrarCliente');
    }

    public function adicionar(Request $req){
        $cliente = new Cliente();
        $token = $req->cookie('Token');
        $user = Funcionario::where('Token', $token)->first();

        $cliente->Email = $req->input('Email');
        $cliente->Nome = $req->input('Nome');
        $cliente->Nascimento = $req->input('Nascimento');
        $cliente->Telefone = $req->input('Telefone');
        $cliente->Funcionario = $user->Email;
        $cliente->save();
        return redirect('/dashboard');
    }

    public function editar($id){
        $cliente = Cliente::find($id);
        return view('editarCliente')->with("cliente", $cliente);
    }

    public function atualizar(Request $req, $id){
        $cliente = Cliente::find($id);
        $token = $req->cookie('Token');
        $user = Funcionario::where('Token', $token)->first();
        $cliente->update([
            "Email" => $req->Email,
            "Nome" => $req->Nome,
            "Nascimento" => $req->Nascimento,
            "Senha" => $req->Senha,
            "Telefone" => $req->Telefone,
            "Funcionario" => $user->Email,
        ]);
        return redirect('/dashboard');
    }

    public function excluir($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->back();
    }
}
