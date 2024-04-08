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
