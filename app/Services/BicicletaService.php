<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use App\Models\Bicicleta;
use Illuminate\Support\Facades\Http;

class BicicletaService
{
    public function listarBicicletasDisponiveis()
    {
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8080/bicicletas');

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents(), true);
            $bicicletas = collect($data)->map(function ($bicicletaData) {
                $bicicletaData['imagem'] = 'http://127.0.0.1:8080/storage/' . $bicicletaData['imagem'];
                return new Bicicleta($bicicletaData);
            });

            return view('bicicleta.bicicletas', compact('bicicletas'));
        } else {
            abort(500, 'Erro ao carregar as bicicletas.');
        }
    }

}