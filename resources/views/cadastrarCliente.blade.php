
@extends('layouts.dashboard')

@section('titulo', "Insert")

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <h2>Cadastrar Clientes</h2>
            <br>
                <form action="/adicionar" method ="post">
                @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="Email" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nome</label>
                        <input type="text" name="Nome" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Data de Nascimento</label>
                        <input type="date" name="Nascimento" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Telefone</label>
                        <input type="text" name="Telefone" class="form-control">
                    </div>
                <br>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="/dashboard" class="btn btn-danger">Voltar</a>
                </form>

        </div>
    </div>
</div>
@endsection
