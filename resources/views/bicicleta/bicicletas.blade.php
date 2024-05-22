@extends('base')

@section('content')
<main>
    <div class="titulo-bg">
      <div class="titulo container">
        <p class="font-2-l-b cor-5">Escolha a melhor para você</p>
        <h1 class="font-1-xxl cor-0">nossas bicicletas<span class="cor-p1">.</span></h1>
      </div>
    </div>
      
  @foreach($bicicletas as $bicicleta)
    <div class="bicicletas container">
      <div class="bicicletas-imagem">
        <img src="{{ $bicicleta->imagem }}" alt="{{ $bicicleta->modelo }}" width="100%" height="100%">
        <span class="font-2-m cor-0 preco">R$ {{ $bicicleta->valor_aluguel }}/h</span>
        <div class="disponibilidade">
          <div class="estoque">
            <img src="./img/icones/estoque.svg" alt="">
            <span>{{ $bicicleta->disponibilidade ? 'Disponível' : Indisponível }}</span>
          </div>
          <div class="entrega">
            <img src="./img/icones/entrega.svg" alt="">
            <span>{{ $bicicleta->quantidades }}</span>
          </div>
          <div class="pontoPedal">
            <img src="./img/icones/local.svg" alt="">
            <span>{{ $bicicleta->ponto->descricao }}</span>
          </div>
        </div>
      </div>
      <div class="bicicletas-conteudo">
        <h2 class="font-1-xl">{{ $bicicleta->modelo }}</h2>
        <p class="font-2-s cor-8">{{ $bicicleta->descricao }}</p>
        <ul class="font-1-m cor-8">
          <li>
            <img src="./img/icones/carbono.svg" alt="">
            Fibra de Carbono
          </li>
          <li>
            <img src="./img/icones/velocidade.svg" alt="">
            20 km/h
            </li>
          <li>
            <img src="./img/icones/rastreador.svg" alt="">
            Rastreador
          </li>
          </ul>
        <a class="botao" style="color: #fff" href="{{ route('info-bicicleta', ['id' => $bicicleta->id]) }}">Saiba mais</a>
      </div>
    </div>
</main>
  @endforeach
@endsection()