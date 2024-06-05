@extends('base')

@section('content')
<body id="perfil">
    <div class="titulo-bg">
        <div class="titulo container">
          <h1 class="font-1-xxl cor-0">informações pessoais<span class="cor-p1">.</span></h1>
        </div>
      </div>

      <div class="perfil container">
        <section class='menu-perfil'>                            
          <div class='foto-perfil'>
              @if ($user->imagem_perfil)
                <img src="{{ asset('storage/' .$user->imagem_perfil) }}" alt="Foto do perfil" class="card-img">
              @else
                <img src="{{ asset('img/icones/user.jpg') }}" alt="Foto do perfil" class="card-img">
              @endif
            </div>
            <h3> {{ $user->name}} {{ $user->sobrenome }} </h3> 
            <div class='lista-perfil'>
              <ul class="list-unstyled">
                  <li><a href="{{ route('perfil') }}">dados pessoais</a></li>
                  <li><a href="{{ route('endereco-view') }}">endereço</a></li>
                  <li><a href="{{ route('aluguel-historico') }}">histórico de alugueis</a></li>
                  <li><a href="{{ route('cartoes-cadastrados') }}">cartões</a></li>
              </ul>
          </div>
        </section>
        <div class="col-md-9">
          <table class="table_historico">
            <thead>
                <tr>
                    <th>Nome do Usuário</th>
                    <th>Modelo da Bicicleta</th>
                    <th>Tipo de Pagamento</th>
                    <th>Valor do Aluguel / Plano</th>
                    <th>Cartão</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alugueis as $aluguel)
                <tr>
                    <td>{{ $aluguel->user->name }}</td>
                    <td>{{ $aluguel->bicicleta->modelo }}</td>
                    <td>
                        @php
                            $paymentType = '';
                            if ($aluguel->tipo_pagamento == 'horaFixa') {
                                $paymentType = 'Hora Fixa';
                            } elseif ($aluguel->tipo_pagamento == 'plano') {
                                $paymentType = 'Plano';
                            } elseif ($aluguel->tipo_pagamento == 'livre') {
                                $paymentType = 'Livre';
                            }
                        @endphp
                        {{ $paymentType }}
                    </td>
                    <td>
                        @if ($aluguel->tipo_pagamento == 'horaFixa')
                            {{ $aluguel->valor_aluguel }}
                        @elseif ($aluguel->tipo_pagamento == 'plano')
                            {{ $aluguel->plano->tipo_plano }}
                        @endif
                    </td>
                    <td>
                        @if ($aluguel->cartao)
                            {{ $aluguel->cartao->bandeira_cartao }} terminado em <strong>{{ substr($aluguel->cartao->numero_cartao, -4) }}
                        @else
                            Não informado
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>

      </div>
    </main>
</body>
@endsection()