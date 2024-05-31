<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BicicletaService;

class BicicletaController extends Controller
{
    private BicicletaService $bicicletaService;

    public function __construct(BicicletaService $bicicletaService)
    {
        $this->bicicletaService = $bicicletaService;
    }

    public function welcome() 
    {
        return $this->bicicletaService->welcome();
    }
    
    public function all() 
    {
        return $this->bicicletaService->listarBicicletasDisponiveis();
    }

    public function show(int $id) 
    {
        return $this->bicicletaService->visualizarBicicleta($id);
    }
}
