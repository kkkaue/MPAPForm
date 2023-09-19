// função que atualiza a pontuação do usuário de acordo com os arquivos inseridos e a pontuacaoConfig.js
import { pontuacaoConfig } from './pontuacaoConfig.js';

export function atualizarPontuacao(requisito_id) {
  const pontuacaoAtual = parseFloat(document.getElementById("pontuacao").innerHTML);
  const requisito = pontuacaoConfig.curriculum_vitae[requisito_id];
  const inputs = document.querySelectorAll(`input[name="${requisito_id}[]"]`);
  let pontuacaoTotal = 0;
  inputs.forEach((input) => {
    if (input.value) {
      pontuacaoTotal += requisito.pontuacao;
    }
  });
  //verificar se a pontuação atual chegou no limite, se não chegou, atualizar a pontuação adicionando a pontuação do ultimo arquivo inserido, se chegou, não adicionar nada
  if (pontuacaoAtual >= requisito.limite) {
    document.getElementById("pontuacao").innerHTML = pontuacaoAtual;
  } else {
    document.getElementById("pontuacao").innerHTML = pontuacaoAtual + pontuacaoTotal;
  }

}