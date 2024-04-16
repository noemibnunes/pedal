@extends('base')

@section('content')
<body id="perfil">
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
          <h5>Meu perfil</h5>
            <ul class="list-unstyled">
              <li><a href="{{ route('endereco-view') }}">Endereço</a></li>
              <li><a href="#">Cadastro de Cartão</a></li>
              <li><a href="#">Histórico de aluguel</a></li>
            </ul>
        </div>
      </div>

      <div class="col-md-9">
        <form action="{{ route('editar-perfil') }}" method="POST" enctype="multipart/form-data" class="form-two">
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
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $user->name }}" readonly>
          </div>
          <div class="col-2">
            <label for="sobrenome" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ $user->sobrenome }}" readonly>
          </div>
          <div class="col-2">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $user->cpf }}" readonly>
          </div>
          <div class="col-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
          </div>
          <div class="col-2">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $user->data_nascimento }}" readonly>
          </div>
          <div class="col-2">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $user->telefone->telefone ?? 'Não informado'}}" readonly>
          </div>
          <div class="col-2">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" value="{{ $user->telefone->celular ?? 'Não informado'}}" readonly>
          </div>
          <div class="col-2">
            <label for="plano" class="form-label">Plano</label>
            <select class="form-select" id="plano" name="plano" disabled>
                <option value="">Selecione</option>
                @foreach ($planos as $plano)
                    <option value="{{ $plano->id }}" {{ $user->plano_id == $plano->id ? 'selected' : '' }}>{{ $plano->tipo_plano }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-2">
            <input type="file" id="imagem" >
            <label class="label-file" for="imagem">
              <span class="text-file">Selecionar imagem</span>
              <span>Procurar</span>
            </label>
          </div>
          <button type="button" class="botao btn-login col-2" id="editarPerfil">Editar Perfil</button>
          <button type="submit" class="botao btn-login col-2" id="salvarPerfil">Salvar Perfil</button>
        </form>
      </div>
    </div>
  </div>
@endsection
