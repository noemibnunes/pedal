@extends('base')

@section('content')
  <main class="">     
    
  <h1>Lista de Bicicletas Disponíveis</h1>

    <ul>
        @foreach($bicicletas as $bicicleta)
            <li>
                <strong>Modelo:</strong> {{ $bicicleta->modelo }}<br>
                <strong>Disponibilidade:</strong> {{ $bicicleta->valor_aluguel ? 'Disponível' : Indisponível }}<br>
                <strong>Valor:</strong> R$ {{ $bicicleta->valor_aluguel }}<br>
                <strong>Quantidade:</strong> {{ $bicicleta->quantidades }}<br>
                <strong>Tipo:</strong> {{ $bicicleta->tipo }}<br>
                <img src="{{ $bicicleta->imagem }}" alt="{{ $bicicleta->modelo }}">
            </li>
        @endforeach
    </ul>
  </main>
@endsection()