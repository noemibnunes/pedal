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
              <a href="{{ route('perfil') }}">
                <h5> {{ $user->name}} {{ $user->sobrenome }} </h5>
              </a>
              <ul class="list-unstyled">
                <li><a href="{{ route('endereco-view') }}">Meu Endereço</a></li>
                <li><a href="{{ route('cartoes-cadastrados') }}" style="color: #4e6c50; font-weight: bold;">Meus Cartões</a></li>
                <li><a href="#">Meu Histórico de aluguel</a></li>
              </ul>
          </div>
      </div>

      <div class="container-cadastro">
        <a href="{{ route('cadastro-cartao') }}" class="btn-cadastro">
          <img src="./img/icones/add.png"alt="Cadastrar cartão"> 
        </a>
      </div>

      <div class="col-md-9">
        <div class="cartoes">
            @if ($cartoes->isEmpty())
                  <p>Você ainda não cadastrou nenhum cartão.</p>
              @else
                  @foreach ($cartoes as $cartao)
                      <div class="cartao">
                        <a href="{{ route('cartao-view', $cartao->id) }}" class="btn-view">
                          <img src="./img/icones/eye.png"alt="Visualizar/Editar cartão"> 
                        </a>
                        <h2>{{ $cartao->apelido_cartao }}</h2>
                        <p>Número: {{ $cartao->numero_cartao }}</p>
                        <p>Validade: {{ $cartao->data_validade }}</p>
                        <p>Bandeira: {{ $cartao->bandeira_cartao }}</p>
                        <p>Tipo de cartão: {{ $cartao->tipo_cartao }}</p>
                      </div>
                  @endforeach
              @endif
          </div>
      </div>
    </div>
  </div>
@endsection
