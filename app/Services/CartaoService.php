<?php

namespace App\Services;

use App\Models\Cartao;
use Illuminate\Support\Facades\Auth;

class CartaoService
{
    public function listarCartoesCadastrados() 
    {
        $user = Auth::user();
        $cartoes = Cartao::all();
        return view('cartao.cartao', ['user' => $user, 'cartoes' => $cartoes]);
    }

    public function cadastroCartaoView() 
    {
        $user = Auth::user();
        return view('cartao.cadastro_cartao', ['user' => $user]);
    }

    public function cadastroCartaoAluguelView() 
    {
        $user = Auth::user();
        return view('cartao.cadastro_cartao', ['user' => $user]);
    }

    public function cadastrarCartao($request) 
    {
        Cartao::create([
           'nome_titular' => $request->nome_titular,
           'numero_cartao' => $request->numero_cartao,
           'data_validade' => $request->data_validade,
           'tipo_cartao' => $request->tipo_cartao,
           'bandeira_cartao' => $request->bandeira_cartao,
           'apelido_cartao' => $request->apelido_cartao
        ]);

        $previousUrl = $request->headers->get('Referer');

        if (strpos($previousUrl, 'cadastro-cartao-aluguel') !== false) {
            $urlParts = explode('?', $previousUrl); 
            $params = explode('=', $urlParts[1]); 
            $rentalId = $params[1]; 

            return redirect("/aluguel/$rentalId");
        } else {
            return redirect('/cartoes');
        }
    }

    public function cartaoView($id)
    {
        $user = Auth::user();
        $cartao = Cartao::findOrFail($id);
        return view('cartao.cartao_view', ['user' => $user, 'cartao' => $cartao]);
    }

    public function editarCartao($request, $id) 
    {
        $cartao = Cartao::findOrFail($id);

        $cartao->nome_titular = $request->nome_titular;
        $cartao->numero_cartao = $request->numero_cartao;
        $cartao->data_validade = $request->data_validade;
        $cartao->tipo_cartao = $request->tipo_cartao;
        $cartao->bandeira_cartao = $request->bandeira_cartao;
        $cartao->apelido_cartao = $request->apelido_cartao;

        $cartao->save();

        return "Dados do cartão editados com sucesso!";
    }
}