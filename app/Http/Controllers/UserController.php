<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function index() 
    {
        return $this->userService->index();
    }

    public function loginView() 
    {
        return $this->userService->loginView();
    }

    public function cadastro(UserRequest $request)
    {
        try {
            $mensagem = $this->userService->cadastro($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function login(Request $request)
    {
        try {
            $mensagem = $this->userService->login($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function perfilView() 
    {
        try {
            return $this->userService->perfilView();
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function updatePerfil(Request $request)
    {
        try {
            $mensagem = $this->userService->updatePerfil($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function enderecoView() 
    {
        try {
            return $this->userService->enderecoView();
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }

    public function updateEndereco(Request $request)
    {
        try {
            $mensagem = $this->userService->updateEndereco($request);
            return redirect()->back()->withErrors(['success' => $mensagem]);
        } catch (Exception $exception) {
            return response()->json(['errors' => $exception->getMessage()], 400);
        }
    }
}
