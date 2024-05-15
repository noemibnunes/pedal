@extends('base')

@section('content')
<body id="login">
    <div class="titulo-bg">
        <div class="titulo container">
          <p class="font-2-l-b cor-5">Aluguel finalizado</p>
          <h1 class="font-1-xxl cor-0">confirmação do seu aluguel<span class="cor-p1">.</span></h1>
        </div>
      </div>

  <div class="login container"> 
    <section class="aluguel-formulario" aria-label="Formulário">
      <img src="../img/icones/confirmacao.svg" alt="confirmacao do aluguel"></img>
      <p> Pagamento confirmado! Código para retirada da bike enviado por e-mail.</p>
      <p> Atenção! O código se expira em 4h contando a partir de seu recebimento, ou no momento que for informado em um de nossos postos.</p>
      <p> Agradecemos sua preferência e boa PEDALada!🚲 </p>
    </section>
  </div>
  </main>
</body>

@endsection
