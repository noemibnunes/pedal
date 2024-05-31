@extends('base')

@section('content')
<main class="plano-detalhes container">
    <h1 class="font-1-xxl">{{ $plano['tipo_plano'] }}</h1>
    <span class="font-1-xl">R$ {{ $plano['valor_plano'] }} <span class="font-1-xs">{{ $plano['tipo_plano'] }}</span></span>
    <ul class="font-2-m">
        @foreach(explode(';', $plano['descricao']) as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    <a class="botao" href="{{ route('cadastro') }}">Inscreva-se</a>
</main>
@endsection
