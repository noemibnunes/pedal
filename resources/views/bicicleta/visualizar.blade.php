@extends('base')

@section('content')
<main>
    <div class="titulo-bg">
      <div class="titulo container">
        <p class="font-2-l-b cor-5">Escolha a melhor para você</p>
        <h1 class="font-1-xxl cor-0">nossas bicicletas<span class="cor-p1">.</span></h1>
      </div>
    </div>
      
    <div class="bicicletas container">
      <div class="bicicletas-imagem">
        <img src="{{ $bicicleta->imagem }}" alt="{{ $bicicleta->modelo }}" width="100%" height="100%">
        <span class="font-2-m cor-0 preco">R$ {{ $bicicleta->valor_aluguel }}/h</span>
        <div class="disponibilidade">
          <div class="estoque">
            <img src="./img/icones/estoque.svg" alt="">
            <span>{{ $bicicleta->disponibilidade ? 'Disponível' : 'Indisponível' }}</span>
          </div>
          <div class="entrega">
            <img src="./img/icones/entrega.svg" alt="">
            @php
            $pontos = explode(',', $bicicleta->pontos);
            $quantidades = explode(',', $bicicleta->quantidades);
            @endphp
            @foreach ($pontos as $index => $ponto)
            <span>{{ $ponto }}: {{ $quantidades[$index] }}</span>
            @if (!$loop->last)
            / 
            @endif
            @endforeach
          </div>
        </div>
      </div>
      <div class="bicicletas-conteudo">
        <h2 class="font-1-xl">{{ $bicicleta->modelo }}</h2>
        <p class="font-2-s cor-8">{{ $bicicleta->descricao }}</p>
        <a class="botao" style="color: #fff" href="{{ route('aluguel', ['id' => $bicicleta->id]) }}">Alugar agora</a>
      </div>
    </div>
</main>
@endsection()