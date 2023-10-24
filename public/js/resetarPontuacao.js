//evento para resetar a pontuação quando o usuário alterar o select do cargo selecionado
const selectCargo = document.getElementById('cargo_id');
selectCargo.addEventListener('change', resetarPontuacao);

function resetarPontuacao() {
  const pontuacaoFinalElement = document.getElementById('pontuacao');
  pontuacaoFinalElement.innerHTML = 0;
}