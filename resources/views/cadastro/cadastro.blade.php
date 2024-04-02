@extends('base')

@section('content')
  <main class="cadastro">
    <div class="titulo-bg">
        <div class="titulo container">
          <p class="font-2-l cor-5">faça parte da nossa comunidade</p>
          <h1 class="font-1-xl cor-0">Cadastre-se<span class="cor-0">.</span></h1>
        </div>
      </div>

    <div class="form-cadastro">
    <form method="POST" action="/cadastro-usuario">
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

        <h1>Cadastro</h1>
        @csrf
        <div class="form-group mb-2">
            <label for="exampleInputNome">Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputCpf">CPF</label>
            <input type="text" class="form-control" name="cpf" placeholder="cpf">
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputPEmail">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputPSenha">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
    
    <div class="links">
      <a href="{{ route('login') }}">Login</a>
    </div>
  </main>
@endsection()