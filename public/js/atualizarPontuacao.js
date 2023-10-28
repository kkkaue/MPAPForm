import { pontuacaoConfig } from './pontuacaoConfig.js';

let inputsAlterados = [];

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

export function atualizarPontuacao(inputId, requisitoId) {
  const pontuacaoFinalElement = document.getElementById('pontuacao');
  const pontuacaoFinalInput = document.getElementById('pontuacao-submit');
  const inputs = document.querySelectorAll(`input[name="${requisitoId}[]"]`);
  let pontuacaoAtual = parseFloat(pontuacaoFinalElement.innerHTML);
  let inputAlterado = { inputId: inputId, pontuacaoAntiga: 0 };
  
  if (inputsAlterados.find(inputAlterado => inputAlterado.inputId === inputId)) {
    return;
  }
  inputsAlterados.push(inputAlterado);

  const configuracaoRequisito = obterInformacoesRequisito(requisitoId);
  
  if (!configuracaoRequisito) {
    console.error(`Requisito ${requisitoId} não encontrado`);
    return;
  }
  
  let pontuacaoBase = configuracaoRequisito.pontuacao || 0;
  
  const limite = configuracaoRequisito.limite;

  const pontuacaoTotalRequisito = Array.from(inputs)
  .map((input) => (input.files.length > 0 ? pontuacaoBase : 0))
  .reduce((total, value) => total + value, 0);
  
  inputsAlterados.find(inputAlterado => inputAlterado.inputId === inputId).pontuacaoAntiga = pontuacaoBase;

  if (pontuacaoTotalRequisito > limite) {
    pontuacaoFinalElement.innerHTML = pontuacaoAtual;
    pontuacaoFinalInput.value = pontuacaoFinalElement.innerHTML;
  } else {
    pontuacaoFinalElement.innerHTML = pontuacaoAtual + pontuacaoBase;
    pontuacaoFinalInput.value = pontuacaoFinalElement.innerHTML;
  }
}
