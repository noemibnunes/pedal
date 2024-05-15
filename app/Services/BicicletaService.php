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

            $bicicletas = [];

            foreach ($data as $bicicletaData) {
                $bicicleta = new Bicicleta();
                $bicicleta->id = $bicicletaData['id'];
                $bicicleta->modelo = $bicicletaData['modelo'];
                $bicicleta->disponibilidade = $bicicletaData['disponibilidade'];
                $bicicleta->valor_aluguel = $bicicletaData['valor_aluguel'];
                $bicicleta->descricao = $bicicletaData['descricao'];
                $bicicleta->ponto_id = $bicicletaData['ponto_id'];
                $bicicleta->quantidades = $bicicletaData['quantidades'];
                $bicicleta->imagem = 'http://127.0.0.1:8080/storage/' . $bicicletaData['imagem'];

                $bicicletas[] = $bicicleta;
            }

            return view('bicicleta.bicicletas', compact('bicicletas'));
        } else {
            abort(500, 'Erro ao carregar as bicicletas.');
        }
    }

    public function visualizarBicicleta($id)
    {
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8080/visualizar-bicicleta/' . $id);

        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents(), true);

            if ($data !== null) {
                $bicicleta = new Bicicleta($data);
                $bicicleta->id = $data['id'];
                $bicicleta->modelo = $data['modelo'];
                $bicicleta->disponibilidade = $data['disponibilidade'];
                $bicicleta->valor_aluguel = $data['valor_aluguel'];
                $bicicleta->descricao = $data['descricao'];
                $bicicleta->ponto_id = $data['ponto_id'];
                $bicicleta->quantidades = $data['quantidades'];
                $bicicleta->imagem = 'http://127.0.0.1:8080/storage/' . $data['imagem'];

                return view('bicicleta.visualizar', compact('bicicleta'));
            } else {
                abort(404, 'Bicicleta não encontrada.');
            }
        } else {
            abort(500, 'Erro ao carregar a bicicleta.');
        }
    }
}