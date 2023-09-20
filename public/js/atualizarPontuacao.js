// função que atualiza a pontuação do usuário de acordo com os arquivos inseridos e a pontuacaoConfig.js
import { pontuacaoConfig } from './pontuacaoConfig.js';

export function atualizarPontuacao(requisito_id) {

  let pontuacaoRequisito = 0;
  let limiteRequisito = 0;

  for (let requisito in pontuacaoConfig) {
    for( let subrequisito in pontuacaoConfig[requisito]) {
      if (requisito_id === subrequisito) {
        pontuacaoRequisito = pontuacaoConfig[requisito][subrequisito].pontuacao;
        limiteRequisito = pontuacaoConfig[requisito][subrequisito].limite;
        break;
      }
    }
  }

  const pontuacaoFinal = document.getElementById('pontuacao');
  const inputs = document.querySelectorAll(`input[name="${requisito_id}[]"]`);
  let pontuacaoTotalRequisito = 0;
  inputs.forEach((input) => {
    if (input.files.length > 0) {
      pontuacaoTotalRequisito += pontuacaoRequisito;
    }
  });
  if (pontuacaoTotalRequisito > limiteRequisito) {
    pontuacaoFinal.innerHTML = pontuacaoFinal.innerHTML
  } 
  else {
    pontuacaoFinal.innerHTML = parseFloat(pontuacaoFinal.innerHTML) + pontuacaoRequisito;
  }
}