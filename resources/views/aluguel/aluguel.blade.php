@extends('base')

@section('content')
<body id="login">
    <div class="titulo-bg">
        <div class="titulo container">
          <p class="font-2-l-b cor-5">Finalize seu aluguel</p>
          <h1 class="font-1-xxl cor-0">área de pagamento<span class="cor-p1">.</span></h1>
        </div>
      </div>

  <div class="login container"> 
    <section class="aluguel-formulario" aria-label="Formulário">
      <h2 class="font-1-xs cor-5">Forma de aluguel</h2>
        <form class="form-aluguel" id="formPagamento" method="POST" action="{{ route('aluguel-finalizado') }}">
          @if ($errors->has('success'))
                  <div class="alert alert-success">
                    {{ $errors->first('success') }}
                    <script>
                      setTimeout(function() {
                        window.location.href = "{{ route('aluguel-finalizado-view') }}";
                      }, 2000);
                    </script>
                  </div>
                  @else
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                @endif
          <div class="tipo-pagamento">
              <label for="tipoPagamentoHoraFixa">
                  <input class="form-control" type="radio" id="tipoPagamentoHoraFixa" name="tipo_pagamento" value="horaFixa" checked>
                  <span>HORA FIXA</span>
              </label>
              <label for="tipoPagamentoLivre">
                  <input class="form-control" type="radio" id="tipoPagamentoLivre" name="tipo_pagamento" value="livre">
                  <span>LIVRE</span>
              </label>
              <label for="tipoPagamentoPlano">
                  <input class="form-control" type="radio" id="tipoPagamentoPlano" name="tipo_pagamento" value="plano">
                  <span>PLANO</span>
              </label>
              <input type="hidden" id="userHasPlan" value="{{ $user->plano_id ? 'true' : 'false' }}">
          </div>

        @if ($user->plano)
          <div id="planoRadioDiv" style="display: none;">
            <input class="form-control" type="radio" id="planoRadio" name="plano_id" value="{{ $user->plano_id }}" checked>
            <label for="planoRadio">{{ $user->plano->tipo_plano }}</label>
          </div>
          @endif

            <div id="planoDiv" style="display: none;">
              <label id="labelAluguel" for="plano">Selecione desejar aderia a um plano, selecione uma opção:</label>
                <select class="select-aluguel" id="planoSelect" name="plano_id">
                    <option value="">Selecione</option>
                    @foreach ($planos as $plano)
                        <option value="{{ $plano->id }}">{{ $plano->tipo_plano . " - " . "R$ " . $plano->valor_plano }}</option>
                    @endforeach
                </select>
            </div>

          <div id="mensagemLivre" style="display: none;">
              <p class="alert-aluguel">
                <img src="../img/icones/alert.svg" alt="Alerta" class="alert-aluguel-icon">
                Após finalizar o aluguel, um cronômetro será iniciado e ao devolver a bike em um ponto de pedal, o pagamento será efetuado automaticamente.
              </p>
          </div>
          <div id="horasDiv">
              <p class="alert-aluguel">
                <img src="../img/icones/alert.svg" alt="Alerta" class="alert-aluguel-icon">
                A taxa será calculada com base no número de horas entre o momento atual e o horário de entrega selecionado.
              </p>
              <label id="labelAluguel" for="quantidadeHoras">Selecione o horário de entrega da bicicleta:</label>
              <input class="form-control" type="time" id="quantidadeHoras" name="quantidadeHoras">
          </div>

          <div id="modeloDiv">
            <h2 class="font-1-xs cor-5">Modelo</h2>
            <div id="modeloAlugado">
                <input class="form-control" type="radio" id="modelo{{ $bicicleta->modelo }}" name="bicicleta_id" value="{{ $bicicleta->id }}" checked>
                <label for="modelo{{ $bicicleta->id }}">{{ $bicicleta->modelo }}</label>
            </div>
          </div>

          <div id="localDiv">
            <h2 class="font-1-xs cor-5">Ponto da pedal</h2>
            <div id="postoPedal">
                @foreach ($bicicleta->pontos as $ponto)
                    <input class="form-control" type="radio" id="ponto{{ $ponto }}" name="ponto_id" value="{{ $ponto->id }}" checked>
                    <label for="ponto{{ $ponto->descricao }}">{{ $ponto->descricao }}</label><br>
                @endforeach
            </div>
        </div>

    </section>

    <section class="aluguel-form" aria-label="Formulário">
        <div id="valorDiv">
            <label for="valor">Valor do aluguel:</label>
            <input type="text" id="valor" name="valor" value="" readonly>
        </div>

          <div id="cartaoDiv">
            <h2 class="font-1-xs cor-9">Cartões cadastrados</h2>
            @if ($cartoes->isEmpty())
                <p class="alert">Nenhum cartão cadastrado.</p>
            @else
                @foreach ($cartoes as $cartao)
                    <div class="cartoes">
                        <input class="form-control" type="radio" id="cartao{{ $cartao->id }}" name="cartao_id" value="{{ $cartao->id }}" checked>
                        <label for="cartao{{ $cartao->id }}">
                            @if ($cartao->tipo_cartao === 'debito')
                                <strong>Débito</strong>
                            @elseif ($cartao->tipo_cartao === 'credito')
                                <strong>Crédito</strong>
                            @else
                                <strong>{{ strtoupper($cartao->tipo_cartao) }}</strong>
                            @endif
                            (<strong>{{ strtoupper($cartao->bandeira_cartao) }}</strong>) terminado em <strong>{{ substr($cartao->numero_cartao, -4) }}</strong>
                        </label>
                    </div>
                @endforeach
            @endif
          </div>

          <div class="container-cadastro">
            <a class="botao-novo-cartao" style="color: #fff" href="{{ route('cadastro-cartao-aluguel', ['aluguel' => $bicicleta->id]) }}">Novo cartão</a>
          </div>
          <div class="container-finalizar">
            <button type="submit" class="botao-finalizar" style="color: #fff">Finalizar</button>
          </div>
        
        @csrf
      </form> 
    </section>
  </div>
  </main>
</body>

@endsection
