@extends('layouts.dashboard')

@section('titulo', "Account")

@section('content')

<br>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Configurações do Usuário</div>

                    <div class="card-body">
                        <form method="POST" action="\updateaccount">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="Username" value="{{ $token->Username }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="Email" value="{{ $token->Email }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Senha Antiga</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="Senha" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Senha Nova</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="NSenha" value="" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Confirma Senha</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="CSenha" value="" required autofocus>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection