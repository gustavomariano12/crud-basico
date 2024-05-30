<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioControllers;


Route::get('/', [UsuarioControllers::class, "viewSignIn" ]);
Route::post('/', [UsuarioControllers::class, "signIn" ])->middleware(\App\Http\Middleware\ValidationSignIn::class);

Route::get('/signup', [UsuarioControllers::class, "viewSignUp" ]);
Route::post('/signup', [UsuarioControllers::class, "signUp"])->middleware(\App\Http\Middleware\ValidationSignUp::class);

Route::get('/account', [UsuarioControllers::class, "getAccount"])->middleware(\App\Http\Middleware\Auth::class);;

Route::get('/updateaccount', [UsuarioControllers::class, "getUpdateAccount"])->middleware(\App\Http\Middleware\Auth::class);;
Route::post('/updateaccount', [UsuarioControllers::class, "updateAccount"])->middleware(\App\Http\Middleware\Auth::class)->middleware(\App\Http\Middleware\ValidationUpdateAccount::class);

Route::get('/logout', [UsuarioControllers::class, "logout"])->name('logout');



Route::get('/dashboard', [ClienteController::class, "index" ])->middleware(\App\Http\Middleware\Auth::class);
Route::get('/cadastrar', [ClienteController::class, "cadastrar" ])->middleware(\App\Http\Middleware\Auth::class);
Route::post('/adicionar', [ClienteController::class, "adicionar" ])->middleware(\App\Http\Middleware\Auth::class);
Route::get('/editar/{id}', [ClienteController::class, "editar" ])->middleware(\App\Http\Middleware\Auth::class);
Route::get('/excluir/{id}', [ClienteController::class, "excluir" ])->middleware(\App\Http\Middleware\Auth::class);
Route::post('/atualizar/{id}', [ClienteController::class, "atualizar"])->middleware(\App\Http\Middleware\Auth::class);


