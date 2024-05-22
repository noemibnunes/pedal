<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AluguelService;
use Illuminate\Routing\Controller;
use App\Http\Requests\CartaoRequest;
use Illuminate\Support\Facades\Auth;

class AluguelController extends Controller
{
    private AluguelService $aluguelService;

    public function __construct(AluguelService $aluguelService)
    {
        $this->aluguelService = $aluguelService;
    }
    
    public function aluguelView(int $bicicleta_id) 
    {
        return $this->aluguelService->aluguelView($bicicleta_id);
    }

    public function taxaAluguelHora($hora_selecionada, Request $request) 
    {
        return $this->aluguelService->taxaAluguelHora($hora_selecionada, $request);
    }

    public function aluguelFinalizado(Request $request)
    {
        try {
            $mensagem = $this->aluguelService->aluguelFinalizado($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function aluguelFinalizadoView() 
    {
        return $this->aluguelService->aluguelFinalizadoView();
    }

    public function historicoAluguel() 
    {
        $user = Auth::user();
        return $this->aluguelService->historicoAluguel($user->id);
    }

}
