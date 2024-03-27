<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function index() 
    {
        return view('cadastro.cadastro');
    }

    public function loginView() 
    {
        return view('login.login');
    }

    public function cadastro($request) 
    {
        User::create([
           'name' => $request->nome,
           'cpf' => $request->cpf,
           'email' => $request->email,
           'password' => bcrypt($request->senha)
        ]);
        
        return "Cadastro realizado com sucesso!";
    }

    public function login($request)
    {
        if ($request->email && $request->senha) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
                return "Login com Sucesso!"; 
            }
        } else {
            throw new Exception("Insira seu email e a senha!"); 
        }

        throw new Exception("Credenciais inválidas");
    }

}