@extends('base')

@section('content')
  <body id="login">
    <class="login">
    <div class="titulo-bg">
        <div class="titulo container">
          <p class="font-2-l-b cor-5">escolha a bike que mais combina com você</p>
          <h1 class="font-1-xxl cor-0">login<span class="cor-p1">.</span></h1>
        </div>
      </div>

      <div class="login container">        
        <section class="login-formulario" aria-label="Formulário">
          <h2 class="font-1-xs cor-9">dados login</h2>
          <form class="form" method="POST" action="/login-usuario"> 
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
            <div>
                <label for="exampleInputPEmail">Email</label>
                <input type="email" name="email" placeholder="email@email.com">
            </div>
            <div class="form-group">
                <label for="exampleInputPSenha">Senha</label>
                <input type="password" name="senha" placeholder="senha">
                <div class="recuperar-senha">
                  <span><a href="#">recuperar senha</a></span>
                </div>                
            </div>
            <button type="submit" class="botao btn-login">entrar</button>   
          </form>
        </section>
        <picture data-anime="800" class="fadeInDown">
          <source media="(max-width: 800px)" srcset="./img/bicicletas/img1.jpg">
          <img src="./img/bicicletas/img1.jpg" width="460" height="600" alt="Senhora andando de bicicleta" class="img-login">
        </picture>
      </div>
    </main>
</body>
@endsection()