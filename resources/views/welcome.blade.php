@extends('base')

@section('content')
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
        <a class="botao fadeInDown" data-anime="600" href="{{ route('bicicletas') }}">Selecione a sua</a>
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

  <article class="seguros-bg carousel container-seguro seguro">
    <h2 class="font-1-xxl cor-0">planos<span class="cor-p1">.</span></h2>
    <div class="seguros-item">
        <h3 class="font-1-xl cor-0">{{ $planos[0]->tipo_plano }}</h3>
        <span class="font-1-xl cor-0">R$ {{ $planos[0]->valor_plano }} <span class="font-1-xs cor-6">anual</span></span>
        <ul class="font-2-m cor-0">
            @foreach(explode(';', $planos[0]->descricao) as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
        <a class="botao" href="{{ route('planos-show', $planos[0]->id) }}">Saiba mais</a>
    </div>

    @for ($i = 1; $i < count($planos); $i++)
        <?php $plano = $planos[$i]; ?>
        <div class="seguros-item">
            <h3 class="font-1-xl cor-6">{{ $plano->tipo_plano }}</h3>
            <span class="font-1-xl cor-4">R$ {{ $plano->valor_plano }} <span class="font-1-xs cor-6">mensal</span></span>
            <ul class="font-2-m cor-4">
                @foreach(explode(';', $plano->descricao) as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
            <a class="botao-seguro secundario" href="{{ route('planos-show', $plano->id) }}">Saiba mais</a>
        </div>
    @endfor
  </article>
@endsection()