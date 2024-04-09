<?php

namespace App\Services;

use Exception;
use App\Models\Plano;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PlanoService
{
    public function listarPlanosDisponiveis()
    {
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8081/planos');

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents(), true);
            $planos = Plano::hydrate($data);

            return view('welcome', compact('planos'));

        } else {
            abort(500, 'Erro ao carregar os planos.');
        }
    }

}