<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Plano;
use App\Models\Endereco;
use App\Models\Telefone;
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
           'sobrenome' => $request->sobrenome,
           'cpf' => $request->cpf,
           'email' => $request->email,
           'password' => bcrypt($request->senha)
        ]);
        
        return "cadastro realizado com sucesso!";
    }

    public function login($request)
    {
        if ($request->email && $request->senha) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
                return "login com sucesso!"; 
            }
        } else {
            throw new Exception("insira seu email e a senha"); 
        }

        throw new Exception("e-mail ou senha inválida");
    }

    public function perfilView()
    {
        $user = Auth::user();
        $planos = Plano::all();
        return view('perfil.perfil', ['user' => $user, 'planos' => $planos]);
    }

    public function updatePerfil($request)
    {
        $user = Auth::user();

        $user->name = $request->nome;
        $user->sobrenome = $request->sobrenome;
        $user->cpf = $request->cpf;
        $user->email = $request->email;
        $user->password = bcrypt($request->senha);
        
        $user->data_nascimento = $request->data_nascimento;
        

        $user->plano_id = $request->plano;

        if ($request->hasFile('imagem_perfil')) {
            $imagem_perfil = $request->file('imagem_perfil')->store('fotos', 'public');
            $user->imagem_perfil = $imagem_perfil;
        }

        if($request->telefone || $request->celular) {
            $user->telefone()->updateOrCreate(
                ['telefonable_id' => $user->id],
                [
                    'telefone' => $request->telefone,
                    'celular' => $request->celular
                ]
            );
        }

        $user->save();

        return "Perfil atualizado com sucesso!";
    }

    public function enderecoView()
    {
        $user = Auth::user();
        return view('perfil.endereco', ['user' => $user]);
    }

    public function updateEndereco($request)
    {
        $user = Auth::user();

        $user->endereco()->updateOrCreate(
            ['endereable_id' => $user->id],
            [
                'tipo_logradouro' => $request->tipo_logradouro,
                'logradouro' => $request->logradouro,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'cep' => $request->cep,
                'bairro' => $request->bairro
            ]
        );

        return "Endereço atualizado com sucesso!";
    }

}