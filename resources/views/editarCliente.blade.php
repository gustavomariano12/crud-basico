
@extends('layouts.layout')

@section('titulo', "Update")

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
        <br>
        <h2>Editar Cliente</h2>
        <br>
        <form method="POST" action="/atualizar/{{$cliente->id}}">
                @csrf
                <div class="form-group mb-2">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="Email" value="{{$cliente->Email}}" placeholder="E-mail">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Nome</label>
                    <input type="text" class="form-control" name="Nome" value="{{$cliente->Nome}}" placeholder="Telefone">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Nascimento</label>
                    <input type="date" class="form-control" name="Nascimento" value="{{$cliente->Nascimento}}" placeholder="Telefone">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">Telefone</label>
                    <input type="text" class="form-control" name="Telefone" value="{{$cliente->Telefone}}" placeholder="Telefone">
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
  </div>
</div>
@endsection
