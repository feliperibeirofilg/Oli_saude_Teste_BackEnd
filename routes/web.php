<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DoencaController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/cliente/criarCadastro', [ClienteController::class, 'listarClientes' ])->name('listarClientes');
Route::post('/cliente/criarCadastro', [ClienteController::class, 'criarCliente'])->name('cadastrarCliente');

Route::get('/cliente/editarCadastro', [ClienteController::class, 'editarCliente'])->name('editarCliente');
Route::post('/cliente/editarCadastro', [ClienteController::class, 'atualizarCliente'])->name('attCliente');

Route::get('/cliente/{cliente}/doenca/adcdoenca', [DoencaController::class, 'formAdicionarDoenca'])->name('doencas');
Route::post('/cliente/{cliente}/doenca/adcdoenca', [DoencaController::class, 'adcDoenca'])->name('adicionardoenca');