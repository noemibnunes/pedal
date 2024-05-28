<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Plano;
use App\Models\Cartao;
use App\Models\Aluguel;
use App\Models\Bicicleta;
use App\Services\BicicletaService;
use Illuminate\Support\Facades\Auth;

class AluguelService
{
    private BicicletaService $bicicletaService;

    public function __construct(BicicletaService $bicicletaService)
    {
        $this->bicicletaService = $bicicletaService;
    }
    
    
    public function aluguelView($bicicleta_id) 
    {        
        $user = Auth::user();
        $planos = Plano::all();
        $bicicleta = Bicicleta::with('pontos')->findOrFail($bicicleta_id);
        $cartoes = Cartao::where('user_id', $user->id)->get();
        return view('aluguel.aluguel', ['user' => $user, 'planos' => $planos, 'bicicleta' => $bicicleta, 'cartoes' => $cartoes]);
    }

    public function taxaAluguelHora($hora_selecionada, $request) 
    {
        $bicicleta = Bicicleta::findOrFail($request->bicicleta_id);

        $hora_atual = Carbon::now('America/Sao_Paulo')->format('H:i');
        $hora_atual_formatada = Carbon::createFromFormat('H:i', $hora_atual, 'America/Sao_Paulo');
        $hora_selecionada_formatada = Carbon::createFromFormat('H:i', $hora_selecionada, 'America/Sao_Paulo');

        if ($hora_selecionada_formatada->lessThan($hora_atual_formatada)) {
            $hora_selecionada_formatada->addDay();
        }

        $quantidade_minutos = $hora_atual_formatada->diffInMinutes($hora_selecionada_formatada);

        $quantidade_horas = round($quantidade_minutos / 60, 2);

        $taxa = round($quantidade_horas * $bicicleta->valor_aluguel, 2);

        return $taxa;
    }

    public function aluguelFinalizado($request) 
    {        
        $user = Auth::user();
    
        if ($request->tipo_pagamento != 'horaFixa') {
            $valor_aluguel = null; 
        } else {
            $valor_aluguel = str_replace('R$', '', $request->valor);
            $valor_aluguel = str_replace(',', '.', $valor_aluguel);
        }

        $aluguel = $this->bicicletaService->alugarBicicleta($request->bicicleta_id);
        
        if ($aluguel !== "Bicicleta alugada com sucesso!") {
            return response()->json(['message' => 'Erro ao alugar bicicleta.'], 500);
        }
    
        $aluguel = Aluguel::create([
            'bicicleta_id' => $request->bicicleta_id,
            'user_id' => $user->id, 
            'plano_id' => $request->plano_id ?? null,
            'cartao_id' => $request->cartao_id,
            'valor_aluguel' => $valor_aluguel ?? null,
            'tipo_pagamento' => $request->tipo_pagamento,
        ]);

        if ($request->tipo_pagamento == 'plano') {
            $user->plano_id = $request->plano_id;
            $user->save();
        }
    
        return "Aluguel finalizado com sucesso!";
    }
    
    public function aluguelFinalizadoView() 
    {        
        return view('aluguel.aluguel_finalizado');
    }

    public function historicoAluguel($user_id) 
    {        
        $user = Auth::user();
        $alugueis = Aluguel::with(['user', 'bicicleta', 'bicicleta.pontos', 'plano', 'cartao'])->where('user_id', $user_id)->get();
        return view('aluguel.aluguel_historico', ['alugueis' => $alugueis, 'user' => $user]);
    }
}