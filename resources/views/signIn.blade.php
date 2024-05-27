@extends('layouts.login')

@section('titulo', "Sign In")

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
        <br>
        <h2>Sign In</h2>
        <br>
        <form method="POST" action="/">
                @csrf
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="Email" value="" placeholder="E-mail">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="text" class="form-control" name="Senha" value="" placeholder="Senha ">
                </div>
                <p>Não tem conta? <a href="{{ url('/signup')}}">clique aqui</a></p>
                <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
  </div>
</div>

@endsection
