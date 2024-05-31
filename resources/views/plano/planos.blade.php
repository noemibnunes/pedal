@extends('base')

@section('content')
<main class="todos-planos container">
    <h1>Todos os Planos Disponíveis</h1>
    @if(!empty($planos))
        <ul>
            @foreach($planos as $plano)
            <h1 class="font-1-xxl">{{ $plano['tipo_plano'] }}</h1>
            <span class="font-1-xl">R$ {{ $plano['valor_plano'] }} <span class="font-1-xs">{{ $plano['tipo_plano'] }}</span></span>
            <ul class="font-2-m">
                @foreach(explode(';', $plano['descricao']) as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
            @if(auth()->check())
                <a class="botao" href="{{ route('perfil') }}">Aderir ao Plano</a>
            @else
                <a class="botao" href="{{ route('cadastro') }}">Inscreva-se</a>
            @endif
            @endforeach
        </ul>
    @else
        <p>Nenhum plano disponível.</p>
    @endif
</main>
@endsection
