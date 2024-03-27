<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro', [UserController::class, 'index'])->name('cadastro');
Route::get('/login', [UserController::class, 'loginView'])->name('login');

Route::post('/cadastro-usuario', [UserController::class, 'cadastro'])->name('cadastro-usuario');
Route::post('/login-usuario', [UserController::class, 'login'])->name('login-usuario');

