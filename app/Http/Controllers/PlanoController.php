<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlanoService;

class PlanoController extends Controller
{
    private PlanoService $planoService;

    public function __construct(PlanoService $planoService)
    {
        $this->planoService = $planoService;
    }
    
    public function all() 
    {
        return $this->planoService->listarPlanosDisponiveis();
    }

    public function show(int $id) 
    {
        return $this->planoService->visualizarPlano($id);
    }

    public function planosView() 
    {
        return $this->planoService->visualizarTodosPlanos();
    }
}
