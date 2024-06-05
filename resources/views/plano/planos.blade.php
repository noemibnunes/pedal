@extends('base')

@section('content')
<article class="seguros-bg carousel container-seguro seguro">
    <h2 class="font-1-xxl cor-0">planos<span class="cor-p1">.</span></h2>
    <div class="seguros-item">
        <h3 class="font-1-xl cor-0">{{ $planos[0]->tipo_plano }}</h3>
        <span class="font-1-xl cor-0">R$ {{ $planos[0]->valor_plano }} <span class="font-1-xs cor-6">anual</span></span>
        <ul class="font-2-m cor-0">
            @foreach(explode(';', $planos[0]->descricao) as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
        <a class="botao" href="{{ route('perfil') }}">Aderir plano</a>
    </div>

    @for ($i = 1; $i < count($planos); $i++)
        <?php $plano = $planos[$i]; ?>
        <div class="seguros-item">
            <h3 class="font-1-xl cor-6">{{ $plano->tipo_plano }}</h3>
            <span class="font-1-xl cor-4">R$ {{ $plano->valor_plano }} <span class="font-1-xs cor-6">mensal</span></span>
            <ul class="font-2-m cor-4">
                @foreach(explode(';', $plano->descricao) as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
            <a class="botao-seguro secundario" href="{{ route('perfil') }}">Aderir plano</a>
        </div>
    @endfor
  </article>
@endsection
