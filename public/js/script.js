// Ativar Links do Menu
const links = document.querySelectorAll(".header-menu a");

function ativarLink(link) {
  const url = location.href;
  const href = link.href;
  if (url.includes(href)) {
    link.classList.add("ativo");
  }
}

links.forEach(ativarLink);

// Ativar Items do Orçamento

const parametros = new URLSearchParams(location.search);

function ativarProduto(parametro) {
  const elemento = document.getElementById(parametro);
  if (elemento) {
    elemento.checked = true;
  }
}

parametros.forEach(ativarProduto);

// Perguntas Frequentes
const perguntas = document.querySelectorAll(".perguntas button");

function ativarPergunta(event) {
  const pergunta = event.currentTarget;
  const controls = pergunta.getAttribute("aria-controls");
  const resposta = document.getElementById(controls);

  resposta.classList.toggle("ativa");
  const ativa = resposta.classList.contains("ativa");
  pergunta.setAttribute("aria-expanded", ativa);
}

function eventosPerguntas(pergunta) {
  pergunta.addEventListener("click", ativarPergunta);
}

perguntas.forEach(eventosPerguntas);

// Galeria de Bicicletas
const galeria = document.querySelectorAll(".bicicleta-imagens img");
const galeriaContainer = document.querySelector(".bicicleta-imagens");

function trocarImagem(event) {
  const img = event.currentTarget;
  const media = matchMedia("(min-width: 1000px)").matches;
  if (media) {
    galeriaContainer.prepend(img);
  }
}

function eventosGaleria(img) {
  img.addEventListener("click", trocarImagem);
}

galeria.forEach(eventosGaleria);

// Animação
if (window.SimpleAnime) {
  new SimpleAnime();
}

// PERFIL
document.addEventListener('DOMContentLoaded', function() {
  function habilitarEdicao() {
    document.querySelectorAll('input[readonly]').forEach(function(input) {
      input.removeAttribute('readonly');
      if (input.value === 'Não informado') {
        input.value = ''; 
      }
    });

    var selectPlano = document.getElementById('plano');
    selectPlano.removeAttribute('disabled');

    document.getElementById('editarPerfil').classList.add('d-none');
    document.getElementById('salvarPerfil').classList.remove('d-none');
  }

  document.getElementById('editarPerfil').addEventListener('click', function() {
    habilitarEdicao();
  });
});

// ENDERECO
document.addEventListener('DOMContentLoaded', function() {
  function habilitarEdicao() {
    document.querySelectorAll('input[readonly]').forEach(function(input) {
      input.removeAttribute('readonly');
    });
    document.getElementById('editarEndereco').classList.add('d-none');
    document.getElementById('salvarEndereco').classList.remove('d-none');
  }

  document.getElementById('editarEndereco').addEventListener('click', function() {
    habilitarEdicao();
  });
});

// CARTAO
document.addEventListener('DOMContentLoaded', function() {
  function habilitarEdicao() {
    document.querySelectorAll('input[readonly]').forEach(function(input) {
      input.removeAttribute('readonly');
      if (input.value === 'Não informado') {
        input.value = ''; 
      }
    });

    var selectTipoCartao = document.getElementById('tipo_cartao');
    var selectBandeiraCartao = document.getElementById('bandeira_cartao');

    selectTipoCartao.removeAttribute('disabled');
    selectBandeiraCartao.removeAttribute('disabled');

    document.getElementById('editarCartao').classList.add('d-none');
    document.getElementById('salvarCartao').classList.remove('d-none');
  }

  document.getElementById('editarCartao').addEventListener('click', function() {
    habilitarEdicao();
  });
});

var inputHorario = document.getElementById("quantidadeHoras");
var valorInput = document.getElementById("valor");
var bicicletaDiv = document.getElementById("modeloAlugado");
var inputRadio = bicicletaDiv.querySelector('input[type="radio"]');
var bicicleta_id = inputRadio.value;

inputHorario.addEventListener("change", function() {
    var horarioSelecionado = inputHorario.value;

    fetch('/taxa-aluguel/' + horarioSelecionado + '?bicicleta_id=' + bicicleta_id)
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na requisição');
            }
            return response.json();
        })
        .then(data => {
            valorInput.value = 'R$ ' + data;
        })
        .catch(error => {
            console.error('Erro:', error);
        });
});

var inputHorario = document.getElementById("quantidadeHoras");
var tipoPagamentoHoraFixa = document.getElementById("tipoPagamentoHoraFixa");
var tipoPagamentoLivre = document.getElementById("tipoPagamentoLivre");
var tipoPagamentoPlano = document.getElementById("tipoPagamentoPlano");
var valorDiv = document.getElementById("valorDiv");

function mostrarCampoValor() {
    valorDiv.style.display = "block";
}

function ocultarCampoValor() {
    valorDiv.style.display = "none";
}

tipoPagamentoHoraFixa.addEventListener("change", mostrarCampoValor);
tipoPagamentoLivre.addEventListener("change", ocultarCampoValor);
tipoPagamentoPlano.addEventListener("change", ocultarCampoValor);

if (tipoPagamentoHoraFixa.checked) {
    mostrarCampoValor();
} else {
    ocultarCampoValor();
}

document.getElementById('tipoPagamentoPlano').addEventListener('change', function() {
  var planoSelect = document.getElementById('plano');
  if (this.checked) {
      planoSelect.disabled = false;
  } else {
      planoSelect.disabled = true;
  }
});

document.addEventListener('DOMContentLoaded', function() {
    const horaFixaRadio = document.getElementById('tipoPagamentoHoraFixa');
    const livreRadio = document.getElementById('tipoPagamentoLivre');
    const planoRadio = document.getElementById('tipoPagamentoPlano');
    const horasDiv = document.getElementById('horasDiv');
    const mensagemLivre = document.getElementById('mensagemLivre');
    const planoDiv = document.getElementById('planoDiv');
    const planoRadioDiv = document.getElementById('planoRadioDiv');
    const userHasPlan = document.getElementById('userHasPlan').value === 'true';

    function togglePagamentoOptions() {
        if (horaFixaRadio.checked) {
            horasDiv.style.display = 'block';
            mensagemLivre.style.display = 'none';
            planoDiv.style.display = 'none';
            planoRadioDiv.style.display = 'none';
        } else if (livreRadio.checked) {
            horasDiv.style.display = 'none';
            mensagemLivre.style.display = 'block';
            planoDiv.style.display = 'none';
            planoRadioDiv.style.display = 'none';
        } else if (planoRadio.checked) {
            horasDiv.style.display = 'none';
            mensagemLivre.style.display = 'none';
            if (userHasPlan) {
                planoDiv.style.display = 'none';
                planoRadioDiv.style.display = 'block';
            } else {
                planoDiv.style.display = 'block';
                planoRadioDiv.style.display = 'none';
            }
        }
    }

    horaFixaRadio.addEventListener('change', togglePagamentoOptions);
    livreRadio.addEventListener('change', togglePagamentoOptions);
    planoRadio.addEventListener('change', togglePagamentoOptions);

    togglePagamentoOptions();
});

document.querySelector('#imagem').addEventListener('change', function () {
  document.querySelector('.text-file').textContent = this.files[0].name;
});