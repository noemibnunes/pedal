<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartaoService;
use Illuminate\Routing\Controller;
use App\Http\Requests\CartaoRequest;

class CartaoController extends Controller
{
    private CartaoService $cartaoService;

    public function __construct(CartaoService $cartaoService)
    {
        $this->cartaoService = $cartaoService;
    }
    
    public function all() 
    {
        return $this->cartaoService->listarCartoesCadastrados();
    }

    public function cadastroCartaoView() 
    {
        return $this->cartaoService->cadastroCartaoView();
    }

    public function cadastrarCartao(CartaoRequest $request)
    {
        try {
            $mensagem = $this->cartaoService->cadastrarCartao($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function cartaoView(int $id) 
    {
        try {
            return $this->cartaoService->cartaoView($id);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function editarCartao(Request $request, int $id)
    {
        try {
            $mensagem = $this->cartaoService->editarCartao($request, $id);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }
}
