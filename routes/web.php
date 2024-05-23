<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\CartaoController;
use App\Http\Controllers\AluguelController;
use App\Http\Controllers\BicicletaController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [BicicletaController::class, 'welcome'])->name('welcome');

Route::get('/cadastro', [UserController::class, 'index'])->name('cadastro');
Route::get('/login', [UserController::class, 'loginView'])->name('login');

Route::post('/cadastro-usuario', [UserController::class, 'cadastro'])->name('cadastro-usuario');
Route::post('/login-usuario', [UserController::class, 'login'])->name('login-usuario');

Route::get('/bicicletas', [BicicletaController::class, 'all'])->name('bicicletas');
Route::get('/', [PlanoController::class, 'all'])->name('planos');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/perfil', [UserController::class, 'perfilView'])->name('perfil');
    Route::get('/endereco', [UserController::class, 'enderecoView'])->name('endereco-view');
    Route::put('/editar-endereco', [UserController::class, 'updateEndereco'])->name('editar-endereco');
    Route::put('/editar-perfil', [UserController::class, 'updatePerfil'])->name('editar-perfil');

    Route::get('/cartoes', [CartaoController::class, 'all'])->name('cartoes-cadastrados');
    Route::get('/cadastro-cartao', [CartaoController::class, 'cadastroCartaoView'])->name('cadastro-cartao');
    Route::get('/cadastro-cartao-aluguel', [CartaoController::class, 'cadastroCartaoView'])->name('cadastro-cartao-aluguel');
    Route::post('/cadastrar-cartao', [CartaoController::class, 'cadastrarCartao'])->name('cadastrar-cartao');
    Route::get('/cartao/{id}', [CartaoController::class, 'cartaoView'])->name('cartao-view');
    Route::put('/editar-cartao/{id}', [CartaoController::class, 'editarCartao'])->name('editar-cartao');

    Route::get('/bicicleta/{id}', [BicicletaController::class, 'show'])->name('info-bicicleta');
    Route::get('/aluguel/{id}', [AluguelController::class, 'aluguelView'])->name('aluguel');
    Route::get('/taxa-aluguel/{hora_selecionada}', [AluguelController::class, 'taxaAluguelHora'])->name('taxaAluguel');
    Route::post('/aluguel-finalizado', [AluguelController::class, 'aluguelFinalizado'])->name('aluguel-finalizado');
    Route::get('/aluguel-finalizado-view', [AluguelController::class, 'aluguelFinalizadoView'])->name('aluguel-finalizado-view');
    Route::get('/aluguel-historico', [AluguelController::class, 'historicoAluguel'])->name('aluguel-historico');

});