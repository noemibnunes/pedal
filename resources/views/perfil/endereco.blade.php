@extends('base')

@section('content')
<body id="perfil">
  <div class="container">
    <div class="row">
      <div class="col-md-3">

        <div class="mt-3">
          <h5>Meu perfil</h5>
            <ul class="list-unstyled">
              <li><a href="{{ route('endereco-view') }}">Endereço</a></li>
              <li><a href="#">Cadastro de Cartão</a></li>
              <li><a href="#">Histórico de aluguel</a></li>
            </ul>
        </div>
      </div>

      <div class="col-md-9">
        <form action="{{ route('editar-endereco') }}" method="POST" enctype="multipart/form-data">
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

          <div class="mb-3">
            <label for="tipo_logradouro" class="form-label">Tipo de Logradouro</label>
            <input type="text" class="form-control" id="tipo_logradouro" name="tipo_logradouro" value="{{ $user->endereco->tipo_logradouro ?? 'Não informado' }}" readonly>
          </div>
          <div class="mb-3">
            <label for="logradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ $user->endereco->logradouro ?? 'Não informado' }}" readonly>
          </div>
          <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="number" class="form-control" id="numero" name="numero" value="{{ $user->endereco->numero ?? 0 }}" readonly>
          </div>
          <div class="mb-3">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $user->endereco->complemento ?? 'Não informado' }}" readonly>
          </div>
          <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="{{ $user->endereco->cep ?? 'Não informado' }}" readonly>
          </div>
          <div class="mb-3">
            <label for="endereco" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $user->endereco->bairro ?? 'Não informado'}}" readonly>
          </div>
        
          <button type="button" class="btn btn-primary" id="editarEndereco">Editar Endereço</button>
          <button type="submit" class="btn btn-success d-none" id="salvarEndereco">Salvar Endereço</button>
        </form>
      </div>
    </div>
  </div>
@endsection
