import { pontuacaoConfig } from './pontuacaoConfig.js';

function obterInformacoesRequisito(requisitoId) {
  for (const requisito in pontuacaoConfig) {
    for (const subrequisito in pontuacaoConfig[requisito]) {
      if (subrequisito === requisitoId) {
        return pontuacaoConfig[requisito][subrequisito];
      }
    }
  }
  return null;
}

export function atualizarPontuacao(requisitoId, variavel = null) {
  const configuracaoRequisito = obterInformacoesRequisito(requisitoId);

  if (!configuracaoRequisito) {
    console.error(`Requisito ${requisitoId} não encontrado`);
    return;
  }

  const pontuacaoBase = configuracaoRequisito.pontuacao || 0;

  if (configuracaoRequisito.calcularPontuacao) {
    pontuacaoBase = configuracaoRequisito.calcularPontuacao(variavel);
  }

  const limite = configuracaoRequisito.limite;
  const pontuacaoFinalElement = document.getElementById('pontuacao');
  const inputs = document.querySelectorAll(`input[name="${requisitoId}[]"]`);

  const pontuacaoTotalRequisito = Array.from(inputs)
    .map((input) => (input.files.length > 0 ? pontuacaoBase : 0))
    .reduce((total, value) => total + value, 0);

  const pontuacaoAtual = parseFloat(pontuacaoFinalElement.innerHTML);

  if (pontuacaoTotalRequisito > limite) {
    pontuacaoFinalElement.innerHTML = pontuacaoAtual;
  } else {
    pontuacaoFinalElement.innerHTML = pontuacaoAtual + pontuacaoBase;
  }
}
