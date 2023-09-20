import { pontuacaoConfig } from './pontuacaoConfig.js';

function obterInformacoesSubrequisito(requisito_id){
  for (const requisito in pontuacaoConfig) {
    for (const subrequisito in pontuacaoConfig[requisito]) {
      if (subrequisito === requisito_id) {
        return pontuacaoConfig[requisito][subrequisito];
      }
    }
  }
  return null;
}

export function atualizarPontuacao(requisito_id, variavel = null) {
  const configRequisito = obterInformacoesSubrequisito(requisito_id);

  if(!configRequisito){
    console.log(`Requisito ${requisito_id} não encontrado`);
    return;
  }

  let pontuacao = configRequisito.pontuacao || 0;
  if (configRequisito.calcularPontuacao){
    pontuacao = configRequisito.calcularPontuacao(variavel);
  }

  const limite = configRequisito.limite;
  const pontuacaoFinal = document.getElementById('pontuacao');
  const inputs = document.querySelectorAll(`input[name="${requisito_id}[]"]`);

  const pontuacaoTotalRequisito = Array.from(inputs)
  .map((input) => (input.files.length > 0 ? pontuacao : 0))
  .reduce((total, value) => total + value, 0);

  const pontuacaoAtual = parseFloat(pontuacaoFinal.innerHTML);

  if(pontuacaoTotalRequisito > limite){
    pontuacaoFinal.innerHTML = pontuacaoAtual;
  }
  else{
    pontuacaoFinal.innerHTML = pontuacaoAtual + pontuacao;
  }
}