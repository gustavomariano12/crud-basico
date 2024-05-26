@section('titulo', "Index")
@extends('layouts.layout')

@section('content')
<br>
@if (count($cliente) > 0)
<div class="container">
    <a href="/cadastrar" class="btn btn-primary">Cadastrar</a>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped-columns">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cliente as $cont)
                <tr>
                    <th scope="row">{{ $cont->id }}</th>
                    <td>{{ $cont->Email }}</td>
                    <td>{{ $cont->Nome }}</td>
                    <td>{{ $cont->Nascimento }}</td>
                    <td>{{ $cont->Telefone }}</td>
                    <th><a href="/editar/{{ $cont->id}}" class="btn btn-primary">Editar</a>  <a href="/excluir/{{ $cont->id}}" class="btn btn-danger">Excluir</a></th>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="text-center">
            <h2>Sem Clientes Cadastrados!!</h2>
            <p>Deseja cadastrar um? <a href="{{ url('/cadastrar')}}">clique aqui</a></p>
        </div>
    </div>
@endif
@endsection




