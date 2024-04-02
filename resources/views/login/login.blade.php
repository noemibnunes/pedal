@extends('base')

@section('content')
  <main class="login">
    <div class="titulo-bg">
        <div class="titulo container">
          <p class="font-2-l cor-5">escolha a bike que mais combina com você</p>
          <h1 class="font-1-xl cor-0">login<span class="cor-0">.</span></h1>
        </div>
      </div>

    <div class="form-login">
    <form method="POST" action="/login-usuario">
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

      <h1>Login</h1>
        @csrf
        <div class="form-group">
            <label for="exampleInputPEmail">Email</label>
            <input type="email" class="form-control" name="email" placeholder="email@email.com">
        </div>
        <div class="form-group">
            <label for="exampleInputPSenha">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
            <div class="recuperar-senha">
              <a href="#">Recuperar Senha</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        <button type="button" onclick="window.location='{{ route('cadastro') }}'">Cadastre-se</button>
      </div>
  </main>
@endsection()