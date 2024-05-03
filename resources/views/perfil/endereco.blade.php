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
                <li><a href="{{ route('endereco-view') }}" style="color: #4e6c50; font-weight: bold;">Meu Endereço</a></li>
                <li><a href="{{ route('cartoes-cadastrados') }}">Meus Cartões</a></li>
                <li><a href="#">Meu Histórico de aluguel</a></li>
              </ul>
          </div>
      </div>

      <div class="col-md-9">
        <form action="{{ route('editar-endereco') }}" method="POST" enctype="multipart/form-data" class="form-two">
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
          
          @csrf
          @method('PUT')

          <div class="col-2">
            <label for="tipo_logradouro" class="form-label">Tipo de Logradouro</label>
            <input type="text" class="form-control" id="tipo_logradouro" name="tipo_logradouro" value="{{ $user->endereco->tipo_logradouro ?? 'Não informado' }}" readonly>
          </div>
          <div class="col-2">
            <label for="logradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ $user->endereco->logradouro ?? 'Não informado' }}" readonly>
          </div>
          <div class="col-2">
            <label for="numero" class="form-label">Número</label>
            <input type="number" class="form-control" id="numero" name="numero" value="{{ $user->endereco->numero ?? 0 }}" readonly>
          </div>
          <div class="col-2">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $user->endereco->complemento ?? 'Não informado' }}" readonly>
          </div>
          <div class="col-2">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="{{ $user->endereco->cep ?? 'Não informado' }}" readonly>
          </div>
          <div class="col-2">
            <label for="endereco" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $user->endereco->bairro ?? 'Não informado'}}" readonly>
          </div>
        
          <button type="button" class="botao btn-login col-2" id="editarEndereco">Editar Endereço</button>
          <button type="submit" class="botao btn-login col-2" id="salvarEndereco">Salvar Endereço</button>
        </form>
      </div>
    </div>
  </div>
@endsection
