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
        $response = $client->get('http://127.0.0.1:8080/planos');

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents(), true);
            $planos = Plano::hydrate($data);

            return view('welcome', compact('planos'));

        } else {
            abort(500, 'Erro ao carregar os planos.');
        }
    }

    public function visualizarPlano($id)
    {
        $client = new Client();
        $response = $client->get("http://127.0.0.1:8080/plano-show/{$id}");

        if ($response->getStatusCode() === 200) {
            $plano = json_decode($response->getBody()->getContents(), true);
            return view('plano.plano_show', compact('plano'));
        } else {
            abort(500, 'Erro ao carregar o plano.');
        }
    }

    public function visualizarTodosPlanos()
    {
        $data = $this->listarPlanosDisponiveis();
        $planos = $data->planos;
        return view('plano.planos', compact('planos'));
    }
}