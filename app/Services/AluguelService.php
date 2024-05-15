<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Plano;
use App\Models\Cartao;
use App\Models\Aluguel;
use App\Models\Bicicleta;
use Illuminate\Support\Facades\Auth;

class AluguelService
{
    public function aluguelView($bicicleta_id) 
    {        
        $user = Auth::user();
        $planos = Plano::all();
        $bicicleta = Bicicleta::with('ponto')->findOrFail($bicicleta_id);
        $cartoes = Cartao::all();
        return view('aluguel.aluguel', ['user' => $user, 'planos' => $planos, 'bicicleta' => $bicicleta, 'cartoes' => $cartoes]);
    }

    public function taxaAluguelHora($hora_selecionada) 
    {
        $hora_atual = Carbon::now('America/Sao_Paulo')->format('H:i');
        $hora_atual_formatada = Carbon::createFromFormat('H:i', $hora_atual, 'America/Sao_Paulo');
        $hora_selecionada_formatada = Carbon::createFromFormat('H:i', $hora_selecionada, 'America/Sao_Paulo');

        if ($hora_selecionada_formatada->lessThan($hora_atual_formatada)) {
            $hora_selecionada_formatada->addDay();
        }

        $quantidade_minutos = $hora_atual_formatada->diffInMinutes($hora_selecionada_formatada);

        $quantidade_horas = round($quantidade_minutos / 60, 2);

        $taxa = round($quantidade_horas * 4, 2);

        return $taxa;
    }

    public function aluguelFinalizadoView($request) 
    {        
        $user = Auth::user();
    
        $valor_aluguel = str_replace('R$', '', $request->valor);
        $valor_aluguel = str_replace(',', '.', $valor_aluguel);
    
        $aluguel = Aluguel::create([
            'bicicleta_id' => $request->bicicleta,
            'user_id' => $user->id, 
            'plano_id' => $request->plano,
            'cartao_id' => $request->cartao ?? null,
            'valor_aluguel' => $valor_aluguel,
            'tipo_pagamento' => $request->tipo_pagamento,
        ]);
    
        return "Aluguel finalizado com sucesso!";
    }
    

}