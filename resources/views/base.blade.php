<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Pedal - Aluguel de Bicicletas</title>
  <meta name="description" content="Bicicletas elétricas de alta precisão e qualidade, feitas sob medida para o cliente. Explore o mundo na sua velocidade com a Bikcraft.">

  <link rel="icon" href="{{ asset('img/icones/ic.svg') }}" type="image/svg+xml">
  <link rel="preload" href="{{ asset('css/style.css') }}" as="style">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <script>document.documentElement.classList.add('js');</script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
  <header class="header-bg">
    <div class="header container">
      <a href="./">
        <img src="{{ asset('img/icones/logo.svg') }}" width="136" height="32" alt="pedal">
      </a>

      <nav aria-label="primaria">
          <ul class="header-menu font-1-m cor-0">
              <li><a href="{{ route('bicicletas') }}">Bicicletas</a></li>
              @auth 
                  <li><a href="{{ route('logout') }}">Sair</a></li> 
              @else
                  <li><a href="{{ route('cadastro') }}">Cadastrar</a></li>
                  <li><a href="{{ route('login') }}">Login</a></li>
              @endauth
          </ul>
      </nav>

    </div>
  </header>

  @yield('content')

  <footer class="footer-bg">
    <div class="footer container">
      <img src="{{ asset('img/icones/logo.svg') }}" width="136" height="32" alt="Pedal">
    <div class="footer-contato">
        <h3 class="font-2-l-b cor-0">Contato</h3>
        <ul class="font-2-m cor-5">
          <li><a href="tel:+558399999999">+55 83 9999-9999</a></li>
          <li><a href="mailto:contato@pedal.com">contato@pedal.com</a></li>
          <li>Av Vigário Calixto, 3000 - Catolé</li>
          <li>Campina Grande - PB</li>
        </ul>
        <div class="footer-redes">
          <a href="./">
            <img src="{{ asset('img/redes/instagram.svg') }}" width="32" height="32" alt="Instagram">
          </a>
          <a href="./">
            <img src="{{ asset('img/redes/facebook.svg') }}" width="32" height="32" alt="Facebook">
          </a>
          <a href="./">
            <img src="{{ asset('img/redes/youtube.svg') }}" width="32" height="32" alt="Youtube">
          </a>
        </div>
      </div>
      <div class="footer-informacoes">
        <h3 class="font-2-l-b cor-0">Informações</h3>
        <nav>
          <ul class="font-1-m cor-5">
            <li><a href="#">Seguros</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Termos e Condições</a></li>
          </ul>
        </nav>
      </div>
      <p class="footer-copy font-2-m cor-6">Pedal © Alguns direitos reservados.</p>
    </div>
  </footer>

    <script src="{{ asset('js/plugins/simple-anime.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>