<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


Route::get('/', [ClienteController::class, "index" ]);
Route::get('/cadastrar', [ClienteController::class, "cadastrar" ]);
Route::post('/adicionar', [ClienteController::class, "adicionar" ]);
Route::get('/editar/{id}', [ClienteController::class, "editar" ]);
Route::get('/excluir/{id}', [ClienteController::class, "excluir" ]);
Route::post('/atualizar/{id}', [ClienteController::class, "atualizar"]);
