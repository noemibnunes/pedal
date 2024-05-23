@extends('base')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          @if ($user->imagem_perfil)
            <img src="{{ asset('storage/' .$user->imagem_perfil) }}" alt="Foto do perfil" class="card-img">
          @else
            <img src="{{ asset('img/icones/user.jpg') }}" alt="Foto do perfil" class="card-img">
          @endif
        </div>

        <div class="mt-3">
          <h5> {{ $user->name}} {{ $user->sobrenome }} </h5>
            <ul class="list-unstyled">
              <li><a href="{{ route('endereco-view') }}">Meu Endereço</a></li>
              <li><a href="{{ route('cartoes-cadastrados') }}">Meus Cartões</a></li>
              <li><a href="{{ route('aluguel-historico') }}"  style="color: #4e6c50; font-weight: bold;">Meu Histórico de aluguel</a></li>
            </ul>
        </div>
      </div>

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
                    <td>{{ $aluguel->tipo_pagamento }}</td>
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
  </div>
@endsection