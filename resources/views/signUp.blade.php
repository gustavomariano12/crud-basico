@extends('layouts.login')

@section('titulo', "Sign Up")

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
        <br>
        <h2>Sign Up</h2>
        <br>
        <form method="POST" action="/signup">
                @csrf
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="Email" value="" placeholder="Digite seu email" >
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="Username" value="" placeholder="Digite seu username">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="text" class="form-control" name="Senha" value="" placeholder="Digite sua senha" >
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Confirmar Senha</label>
                    <input type="text" class="form-control" name="CSenha"  placeholder="Confirme sua senha">
                </div>
                <p>Já em conta? <a href="{{ url('/')}}">clique aqui</a></p>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
  </div>
</div>

@endsection
