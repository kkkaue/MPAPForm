// função que atualiza a pontuação do usuário de acordo com os arquivos inseridos e a pontuacaoConfig.js
import { pontuacaoConfig } from './pontuacaoConfig.js';

export function atualizarPontuacao(requisito_id) {
    const pontuacaoElement = document.getElementById("pontuacao");
    let pontuacao = 0;
    const requisito =  pontuacaoConfig.curriculum_vitae[requisito_id];
    const inputsDeArquivo = document.querySelectorAll(`input[name^="${requisito_id}"]`);
    inputsDeArquivo.forEach(input => {
        if (input.files.length > 0) {
            pontuacao += requisito.pontuacao;
        }
    });
    
    // Atualiza a pontuação para o usuário pegando o valor que está em string no elemento de id "pontuacao", tranformando em float e somando com a pontuação do requisito
    pontuacaoElement.innerHTML = parseFloat(pontuacaoElement.innerHTML) + pontuacao;
    
    return pontuacao;
}