<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioControllers;


Route::get('/', [UsuarioControllers::class, "viewSignIn" ]);
Route::post('/', [UsuarioControllers::class, "signIn" ])->middleware(\App\Http\Middleware\ValidationSignIn::class);

Route::get('/signup', [UsuarioControllers::class, "viewSignUp" ]);
Route::post('/signup', [UsuarioControllers::class, "signUp"])->middleware(\App\Http\Middleware\ValidationSignUp::class);

Route::get('/account', [UsuarioControllers::class, "getAccount"]);
Route::post('/account', [UsuarioControllers::class, "updateAccount"])->middleware(\App\Http\Middleware\ValidationUpdateAccount::class);

Route::get('/logout', [UsuarioControllers::class, "logout"])->name('logout');



Route::get('/dashboard', [ClienteController::class, "index" ]);
Route::get('/cadastrar', [ClienteController::class, "cadastrar" ]);
Route::post('/adicionar', [ClienteController::class, "adicionar" ]);
Route::get('/editar/{id}', [ClienteController::class, "editar" ]);
Route::get('/excluir/{id}', [ClienteController::class, "excluir" ]);
Route::post('/atualizar/{id}', [ClienteController::class, "atualizar"]);


