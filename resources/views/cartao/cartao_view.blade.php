@extends('base')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
            @if ($user->imagem_perfil)
              <img src="{{ asset('storage/' .$user->imagem_perfil) }}" alt="Foto do perfil" class="card-img">
            @else
              <img src="{{ asset('img/icones/user.jpg') }}" alt="Foto do perfil" class="card-img">
            @endif
          </div>

          <div class="mt-3">
              <a href="{{ route('perfil') }}">
                <h5> {{ $user->name}} {{ $user->sobrenome }} </h5>
              </a>
              <ul class="list-unstyled">
                <li><a href="{{ route('endereco-view') }}">Meu Endereço</a></li>
                <li><a href="{{ route('cartoes-cadastrados') }}" style="color: #4e6c50; font-weight: bold;">Meus Cartões</a></li>
                <li><a href="#">Meu Histórico de aluguel</a></li>
              </ul>
          </div>
      </div>

      <div class="col-md-9">
        <form action="{{ route('editar-cartao', $cartao->id) }}" method="POST" enctype="multipart/form-data" class="form-two">
            @if ($errors->has('success'))
            <div class="alert alert-success">
              {{ $errors->first('success') }}
                <script>
                    setTimeout(function() {
                      window.location.href = "{{ route('cartoes-cadastrados') }}";
                    }, 2000);
                </script>
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
          @method('PUT')

          <div class="col-2">
            <label for="nome_titular" class="form-label">Nome do Titular</label>
            <input type="text" class="form-control" id="nome_titular" name="nome_titular" value="{{ $cartao->nome_titular ?? 'Não informado' }}" readonly>
          </div>
          <div class="col-2">
            <label for="numero_cartao" class="form-label">Número do cartão</label>
            <input type="text" class="form-control" id="numero_cartao" name="numero_cartao" value="{{ $cartao->numero_cartao ?? 'Não informado' }}" readonly>
          </div>
          <div class="col-2">
            <label for="data_validade" class="form-label">Data de vencimento</label>
            <input type="month" class="form-control" id="data_validade" name="data_validade" value="{{ $cartao->data_validade ?? 'Não informado' }}" readonly>
          </div>
          <div class="col-2">
            <label for="tipo_cartao" class="form-label">Tipo do Cartão</label>
            <select class="form-select" id="tipo_cartao" name="tipo_cartao" disabled>
                <option value="">Selecione</option>
                <option value="credito" {{ $cartao->tipo_cartao === 'credito' ? 'selected' : '' }}>Crédito</option>
                <option value="debito" {{ $cartao->tipo_cartao === 'debito' ? 'selected' : '' }}>Débito</option>
                <option value="pre-pago" {{ $cartao->tipo_cartao === 'pre-pago' ? 'selected' : '' }}>Pré-pago</option>
            </select>
            </div>
          <div class="col-2">
            <label for="bandeira_cartao" class="form-label">Bandeira</label>
            <select class="form-select" id="bandeira_cartao" name="bandeira_cartao" disabled>
                <option value="">Selecione</option>
                <option value="visa" {{ $cartao->bandeira_cartao === 'visa' ? 'selected' : '' }}>Visa</option>
                <option value="mastercard" {{ $cartao->bandeira_cartao === 'mastercard' ? 'selected' : '' }}>Mastercard</option>
                <option value="amex" {{ $cartao->bandeira_cartao === 'amex' ? 'selected' : '' }}>American Express</option>
                <option value="elo" {{ $cartao->bandeira_cartao === 'elo' ? 'selected' : '' }}>Elo</option>
                <option value="hipercard" {{ $cartao->bandeira_cartao === 'hipercard' ? 'selected' : '' }}>Hipercard</option>
            </select>
          </div>
          <div class="col-2">
            <label for="apelido_cartao" class="form-label">Apelido</label>
            <input type="text" class="form-control" id="apelido_cartao" name="apelido_cartao" value="{{ $cartao->apelido_cartao ?? 'Não informado' }}" readonly>
          </div>

          <button type="button" class="botao btn-login col-2" id="editarCartao">Editar Cartão</button>
          <button type="submit" class="botao btn-login col-2" id="salvarCartao">Salvar Cartão</button>
        </form>
      </div>
    </div>
  </div>
@endsection
