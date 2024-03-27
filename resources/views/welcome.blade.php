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
        <li><a href="{{ route('cadastro') }}">Cadastrar</a></li>
          <li><a href="{{ route('login') }}">Login</a></li> 
        </ul>
      </nav>
    </div>
  </header>

  <main class="introducao-bg">
    <div class="introducao container">
      <picture data-anime="800" class="fadeInDown">
          <source media="(max-width: 800px)" srcset="./img/bicicletas/img6.jpg">
          <img src="./img/bicicletas/img6.jpg" width="1280" height="1600" alt="Bicicleta elétrica preta.">
      </picture>
      <div class="introducao-conteudo">
        <h1 class="font-1-xxl cor-0 fadeInDown" data-anime="200">Pedale pela 
          cidade<span class="cor-0">.</span></h1>
        <p class="font-2-l cor-5 fadeInDown" data-anime="400">Bicicletas de alta qualidade,  pensadas para garantir conforto e segurança para o cliente. Explore o mundo na sua velocidade com a Pedal.</p>
        <a class="botao fadeInDown" data-anime="600" href="./bicicletas.html">Selecione a sua</a>
      </div>
    </div>
  </main>

  <article class="bicicletas-lista">
    <h2 class="container font-1-xxl">escolha a sua<span class="cor-p1">.</span></h2>

    <ul>
      <li>
        <a href="./bicicletas/magic.html">
          <img src="./img/bicicletas/classica.jpg" alt="modelo classico" width="920" height="1040">
          <h3 class="font-1-xl">clássica</h3>
        </a>
      </li>
      <li>
        <a href="./bicicletas/nimbus.html">
          <img src="./img/bicicletas/conceitual.jpg" alt="modelo conceitual" width="920" height="1040">
          <h3 class="font-1-xl">conceitual</h3>
        </a>
      </li>
      <li>
        <a href="./bicicletas/nebula.html">
          <img src="./img/bicicletas/esportiva.jpg" alt="modelo esportivo" width="920" height="1040">
          <h3 class="font-1-xl">esportiva</h3>
        </a>
      </li>
    </ul>
  </article>

  <article class="tecnologia-bg">
    <div class="tecnologia container">
      <div class="tecnologia-conteudo">
        <span class="font-2-l-b cor-5">Tecnologia Avançada</span>
        <h2 class="font-1-xxl cor-0">você escolhe o melhor jeito de pedalar<span class="cor-p1">.</span></h2>
        <p class="font-2-l cor-5">Ao optar por utilizar o Pedal, você não apenas investe na sua própria saúde e bem-estar, mas também contribui para a redução da poluição e a preservação do meio ambiente. Cada pedalada é um passo em direção a um estilo de vida mais sustentável e saudável,
           enquanto você se locomove pela cidade de forma eficiente e ecologicamente consciente.</p>
        <div class="tecnologia-vantagens">
          <div>
            <img src="./img/icones/eletrica.svg" width="24" height="24" alt="">
            <h3 class="font-1-m cor-0">Conforto</h3>
            <p class="font-2-s cor-5">O produto Pedal não só oferece uma forma eficaz de se deslocar pela cidade, mas também prioriza o conforto do usuário.</p>
          </div>
          <div>
            <img src="./img/icones/rastreador.svg" width="24" height="24" alt="">
            <h3 class="font-1-m cor-0">Rastreador</h3>
            <p class="font-2-s cor-5">Sabemos o quão preciosa é a sua segurança, por isso adicionamos rastreadores e sistemas anti-furto para garantir o seu sossego.</p>          </div>
        </div>
      </div>
      <div class="tecnologia-imagem">
        <img src="./img/bicicletas/bicicletas.jpg" width="1200" height="1920" alt="">
      </div>
    </div>
  </article>

  <section class="parceiros" aria-label="Nossos Parceiros">
    <h2 class="container font-1-xxl">nossos parceiros<span class="cor-p1">.</span></h2>

    <ul>
      <li><img src="./img/parceiros/caloi.jpg" alt="Caravan" width="140" height="38"></li>
      <li><img src="./img/parceiros/cannondale.png" alt="Ranek" width="149" height="36"></li>
      <li><img src="./img/parceiros/Cervelo_logo.svg" alt="Handel" width="140" height="50"></li>
      <li><img src="./img/parceiros/focus.png" alt="Dogs" width="152" height="39"></li>
    </ul>
  </section>

  <section class="depoimento" aria-label="Depoimento">
    <div>
      <img src="./img/bicicletas/img4.jpg" width="1560" height="1360" alt="Pessoa pedalando">    
    </div>
    <div class="depoimento-conteudo">
      <blockquote class="font-1-xl cor-p5">
        <p>Pedalar sempre foi a minha paixão, o que a Pedal fez foi intensificar o meu amor por esta atividade. Recomendo à todos que amo.</p>    </div>
      </blockquote>
  </section>

  <article class="seguros-bg">
    <div class="seguros container">
      <h2 class="font-1-xxl cor-0">seguros<span class="cor-p1">.</span></h2>
      <div class="seguros-item">
      <h3 class="font-1-xl cor-6">MENSAL</h3>
        <span class="font-1-xl cor-4">R$ 120 <span class="font-1-xs cor-6">mensal</span></span>
          <ul class="font-2-m cor-4">
            <li>Troque o modelo até duas vezes no mês</li>
            <li>Assistência técnica</li>
            <li>Suporte 24h</li>
            <li>Devolva ou troque em qualquer posto</li>
        </ul>
        <a class="botao secundario" href="./orcamento.html?tipo=seguro&produto=prata">Inscreva-se</a>
      </div>

      <div class="seguros-item">
      <h3 class="font-1-xl cor-0">ANUAL</h3>
        <span class="font-1-xl cor-0">R$ 180 <span class="font-1-xs cor-6">anual</span></span>
          <ul class="font-2-m cor-0">
            <li>Troque o modelo quando quiser</li>
            <li>Assistência especial</li>
            <li>Suporte 24h</li>
            <li>Devolva ou troque em qualquer posto</li>
            <li>Pode usar a bicicleta fora da cidade</li>
            <li>Muita economia</li>
        </ul>
        <a class="botao" href="./orcamento.html?tipo=seguro&produto=ouro">Inscreva-se</a>
      </div>
    </div>
  </article>

  <footer class="footer-bg">
    <div class="footer container">
      <img src="./img/icones/logo.svg" width="136" height="32" alt="Pedal">
    <div class="footer-contato">
        <h3 class="font-2-l-b cor-0">Contato</h3>
        <ul class="font-2-m cor-5">
          <li><a href="tel:+558399999999">+55 83 9999-9999</a></li>
          <li><a href="mailto:contato@bikcraft.com">contato@pedal.com</a></li>
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
            <li><a href="#">Seguros</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Termos e Condições</a></li>
          </ul>
        </nav>
      </div>
      <p class="footer-copy font-2-m cor-6">Pedal © Alguns direitos reservados.</p>
    </div>
  </footer>

  <script src="../../js/plugins/simple-anime.js"></script>
  <script src="../../js/script.js"></script>
</body>

</html>