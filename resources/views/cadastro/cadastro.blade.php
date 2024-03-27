<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Pedal - Aluguel de Bicicletas</title>
  <meta name="description" content="Bicicletas elétricas de alta precisão e qualidade, feitas sob medida para o cliente. Explore o mundo na sua velocidade com a Bikcraft.">

  <link rel="icon" href="img/icones/ic.svg" type="image/svg+xml">
  <link rel="preload" href="./css/style.css" as="style">
  <link rel="stylesheet" href="./css/style.css">

  <script>document.documentElement.classList.add('js');</script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
  <header class="header-bg">
    <div class="header container">
      <a href="./">
        <img src="./img/icones/logo.svg" width="136" height="32" alt="pedal">
      </a>

      <nav aria-label="primaria">
        <ul class="header-menu font-1-m cor-0">
          <li><a href="{{ route('login') }}">Login</a></li> 
        </ul>
      </nav>
    </div>
  </header>

  <main class="login">
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

  <footer class="footer-bg">
    <div class="footer container">
      <img src="./img/bikcraft.svg" width="136" height="32" alt="Pedal">
      <div class="footer-contato">
        <h3 class="font-2-l-b cor-0">Contato</h3>
        <ul class="font-2-m cor-5">
          <li><a href="tel:+558399999999">+55 83 9999-9999</a></li>
          <li><a href="">contato@pedal.com</a></li>
          <li>Av Vigário Calixto, 3000 - Catolé</li>
          <li>Campina Grande - PB</li>
        </ul>
        <div class="footer-redes">
          <a href="./">
            <img src="./img/redes/instagram.svg" width="32" height="32" alt="Instagram">
          </a>
          <a href="./">
            <img src="./img/redes/facebook.svg" width="32" height="32" alt="Facebook">
          </a>
          <a href="./">
            <img src="./img/redes/youtube.svg" width="32" height="32" alt="Youtube">
          </a>
        </div>
      </div>
      <div class="footer-informacoes">
        <h3 class="font-2-l-b cor-0">Informações</h3>
        <nav>
          <ul class="font-1-m cor-5">
            <li><a href="#">Bicicletas</a></li>
            <li><a href="#">Seguros</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Termos e Condições</a></li>
          </ul>
        </nav>
      </div>
      <p class="footer-copy font-2-m cor-6">Pedal © Alguns direitos reservados.</p>
    </div>
  </footer>

  <script src="./js/plugins/simple-anime.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>