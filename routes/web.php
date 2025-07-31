<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cliente/criarCadastro', [ClienteController::class, 'listarClientes' ])->name('listarClientes');
Route::post('/cliente/criarCadastro', [ClienteController::class, 'criarCliente'])->name('cadastrarCliente');

Route::get('/cliente/editarCadastro', [ClienteController::class, 'editarCliente'])->name('editarCliente');
Route::post('/cliente/editarCadastro', [ClienteController::class, 'atualizarCliente'])->name('attCliente');

