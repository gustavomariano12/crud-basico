@extends('layouts.dashboard')

@section('titulo', "Account")

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Informações do Funcionario</div>
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Username:</label>
                                     <p>{{ $token->Username }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Email:</label>
                                     <p>{{ $token->Email}}</p>
                                </div>

                                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

