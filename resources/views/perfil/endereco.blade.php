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
        <section class="cadastro-formulario" aria-label="Formulário">
          <h2 class="font-1-xs cor-9" style="margin-top:20px">endereço</h2>
          @if ($errors->has('success'))
            <div class="alert alert-success">
              {{ $errors->first('success') }}
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

          <form action="{{ route('editar-endereco') }}" method="POST" enctype="multipart/form-data" class="form-two">         
          @csrf
          @method('PUT')

            <div class="col-2">
              <label for="tipo_logradouro" class="form-label">Tipo de Logradouro</label>
              <input type="text" class="form-control" id="tipo_logradouro" name="tipo_logradouro" value="{{ $user->endereco->tipo_logradouro ?? 'Não informado' }}" readonly>
            </div>
            <div>
              <label for="logradouro" class="form-label">Logradouro</label>
              <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ $user->endereco->logradouro ?? 'Não informado' }}" readonly>
            </div>
            <div>
              <label for="numero" class="form-label">Número</label>
              <input type="number" class="form-control" id="numero" name="numero" value="{{ $user->endereco->numero ?? 0 }}" readonly>
            </div>
            <div class="col-2">
              <label for="complemento" class="form-label">Complemento</label>
              <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $user->endereco->complemento ?? 'Não informado' }}" readonly>
            </div>
            <div>
              <label for="cep" class="form-label">CEP</label>
              <input type="text" class="form-control" id="cep" name="cep" value="{{ $user->endereco->cep ?? 'Não informado' }}" readonly>
            </div>
            <div>
              <label for="endereco" class="form-label">Bairro</label>
              <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $user->endereco->bairro ?? 'Não informado'}}" readonly>
            </div>
            <div>
              <button type="button" class="botao btn-login" id="editarEndereco" style="font-size: 1rem; margin-botton:80px">Editar Endereço</button>
            </div>
            <div>
              <button type="submit" class="botao btn-login" id="editarEndereco" style="font-size: 1rem; margin-botton:80px">Salvar Endereço</button>
            </div>  
         </form>          
        </section>  
      </div>
    </main>
</body>
@endsection()