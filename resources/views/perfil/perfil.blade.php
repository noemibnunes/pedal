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
          <h3> {{ $user->name}} {{ $user->sobrenome }} </h3>                   
          <div class='foto-perfil'>
            @if ($user->imagem_perfil)
              <img src="{{ asset('storage/' .$user->imagem_perfil) }}" alt="Foto do perfil" class="card-img">
            @else
              <img src="{{ asset('img/icones/user.jpg') }}" alt="Foto do perfil" class="card-img">
            @endif
          </div>
          <div class='enviar-foto'>
            <input type="file" id="imagem" name="imagem_perfil">
              <label class="label-file" for="imagem">
                <a class="text-file">selecionar imagem</a>
              </label>
            </input>
          </div>
          <div class='lista-perfil'>
              <ul class="list-unstyled">
                <li><a href="{{ route('endereco-view') }}">endereço</a></li>
                <li><a href="{{ route('cartoes-cadastrados') }}">cartões</a></li>
                <li><a href="#">histórico de alugueis</a></li>
              </ul>
          </div>
        </section>
        <section class="cadastro-formulario" aria-label="Formulário">
          <h2 class="font-1-xs cor-9">dados pessoais</h2>
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
          <form action="{{ route('editar-perfil') }}" method="POST" enctype="multipart/form-data" class="form-two">          
            @csrf
            @method('PUT')

            <div>
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="{{ $user->name }}" readonly>
            </div>
            <div>
              <label for="sobrenome" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ $user->sobrenome }}" readonly>
            </div>
            <div>
              <label for="cpf" class="form-label">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $user->cpf }}" readonly>
            </div>
            <div>
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
            </div>
            <div>
              <label for="data_nascimento" class="form-label">Data de Nascimento</label>
              <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $user->data_nascimento }}" readonly>
            </div>
            <div>
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $user->telefone->telefone ?? 'Não informado'}}" readonly>
            </div>
            <div>
              <label for="celular" class="form-label">Celular</label>
              <input type="text" class="form-control" id="celular" name="celular" value="{{ $user->telefone->celular ?? 'Não informado'}}" readonly>
            </div>
            <div>
              <label for="plano" class="form-label">Plano</label>
              <select class="form-select" id="plano" name="plano" disabled>
                  <option value="">Selecione</option>
                  @foreach ($planos as $plano)
                      <option value="{{ $plano->id }}" {{ $user->plano_id == $plano->id ? 'selected' : '' }}>{{ $plano->tipo_plano }}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-2">
              <input type="file" id="imagem" name="imagem_perfil">
                <label class="label-file" for="imagem">
                  <span class="text-file">Selecionar imagem</span>
                  <span>Procurar</span>
                </label>
              </input>
            </div>
            <div>
              <button type="button" class="botao btn-login" id="editarPerfil" style="font-size: 0.9rem">Editar Perfil</button>
            </div>
            <div>
              <button type="submit" class="botao btn-login" id="salvarPerfil" style="font-size: 0.9rem">Salvar Perfil</button>
            </div>           
          </form>
        </section>  
      </div>
    </main>
</body>
@endsection()