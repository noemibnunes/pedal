@extends('base')

@section('content')
<body id="cadastro">
    <div class="titulo-bg">
        <div class="titulo container">
          <p class="font-2-l-b cor-5">faça parte da nossa comunidade</p>
          <h1 class="font-1-xxl cor-0">cadastre-se<span class="cor-p1">.</span></h1>
        </div>
      </div>

      <div class="cadastro container">
        <picture data-anime="800" class="fadeInDown">
          <source media="(max-width: 800px)" srcset="./img/bicicletas/img3.jpg">
          <img src="./img/bicicletas/img3.jpg" alt="bicicletas encostadas na parede" class="img-cadastro">
        </picture> 
        <section class="cadastro-formulario" aria-label="Formulário">
          <h2 class="font-1-xs cor-9">dados pessoais</h2>
            @if ($errors->has('success'))
                <div class="alert alert-success col-2">
                  {{ $errors->first('success') }}
                  <script>
                    setTimeout(function() {
                      window.location.href = "{{ route('login') }}";
                    }, 2000);
                </script>
                </div>
              @else
                @if ($errors->any())
                  <div class="alert alert-danger col-2">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
              @endif
          <form class="form-two" method="POST" action="/cadastro-usuario"> 
            @csrf
            <div>
              <label for="exampleInputNome">Nome</label>
              <input type="text" class="form-control" name="nome" placeholder="Maria">
            </div>
            <div>
              <label for="exampleInputSobrenome">Sobrenome</label>
              <input type="text" class="form-control" name="sobrenome" placeholder="Silva">
            </div>
            <div class="col-2">
              <label for="exampleInputCpf">CPF</label>
              <input type="text" class="form-control" name="cpf" placeholder="000.000.000-00">
            </div>
            <div class="col-2">
              <label for="exampleInputPEmail">E-mail</label>
              <input type="email" class="form-control" name="email" placeholder="example@email.com">
            </div>
            <div class="col-2">
              <label for="email">Repetir E-mail</label>
              <input type="email" class="form-control" name="email_confirmation" placeholder="example@email.com">
            </div>
            <div class="col-2">
              <label for="exampleInputPSenha">Senha</label>
              <input type="password" class="form-control" name="senha" placeholder="senha">
            </div>
            <div class="col-2">
              <label for="exampleInputPSenha">Repetir Senha</label>
              <input type="password" class="form-control" name="senha_confirmation" placeholder="repetir senha">
            </div>
            <button type="submit" class="botao btn-login col-2" onclick="{{ route('login') }}">Cadastrar</button>
            
          </form>
        </section>  
      </div>
    </main>
</body>

    

@endsection()