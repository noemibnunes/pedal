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
        <section class="view-cartoes" aria-label="Formulário">
          <div class="container-cadastro">
            <a href="{{ route('cadastro-cartao') }}" class="btn-cadastro" style="margin-right: 32px; margin-botton: 16px">
              <img src="./img/icones/add.png" alt="Cadastrar cartão"> 
            </a>
          </div>

          <div class="cartoes-container {{ count($cartoes) > 4 ? 'scrollable' : '' }}">
            @if ($cartoes->isEmpty())
              <p>Você ainda não cadastrou nenhum cartão.</p>
            @else
              <div class="cartoes">
                  @foreach ($cartoes as $cartao)
                      <div class="cartao">
                        <a href="{{ route('cartao-view', $cartao->id) }}" class="btn-view">
                          <img src="./img/icones/eye.png" alt="Visualizar/Editar cartão"> 
                        </a>
                        <h2>{{ $cartao->apelido_cartao }}</h2>
                        <p>Número: {{ $cartao->numero_cartao }}</p>
                        <p>Validade: {{ $cartao->data_validade }}</p>
                        <p>Bandeira: {{ $cartao->bandeira_cartao }}</p>
                        <p>Tipo de cartão: {{ $cartao->tipo_cartao }}</p>
                      </div>
                  @endforeach
              </div>
            @endif
          </div>
        </section>  
      </div>
    </main>
</body>
@endsection()
