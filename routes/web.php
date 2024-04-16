<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\BicicletaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/cadastro', [UserController::class, 'index'])->name('cadastro');
Route::get('/login', [UserController::class, 'loginView'])->name('login');

Route::post('/cadastro-usuario', [UserController::class, 'cadastro'])->name('cadastro-usuario');
Route::post('/login-usuario', [UserController::class, 'login'])->name('login-usuario');

Route::get('/bicicletas', [BicicletaController::class, 'all'])->name('bicicletas');
Route::get('/', [PlanoController::class, 'all'])->name('planos');

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [UserController::class, 'perfilView'])->name('perfil');
    Route::get('/endereco', [UserController::class, 'enderecoView'])->name('endereco-view');
    Route::put('/editar-endereco', [UserController::class, 'updateEndereco'])->name('editar-endereco');
    Route::put('/editar-perfil', [UserController::class, 'updatePerfil'])->name('editar-perfil');
});