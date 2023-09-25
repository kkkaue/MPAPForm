import { atualizarPontuacao } from "./atualizarPontuacao.js";

export function openPopup(idModal, idButton) {
    const modal = document.getElementById(idModal);
    const closePopupButton = document.getElementById(idButton);
    modal.classList.remove('invisible');
    closePopupButton.addEventListener('click', () => {
        //verifica se algum radio desse modal está selecionado
        const radios = modal.querySelectorAll('input[type="radio"]');
        const radioSelecionado = Array.from(radios).some((radio) => radio.checked);
        if (!radioSelecionado) {
            alert('Selecione uma opção');
            return;
        }
        const radiosPopup = modal.querySelectorAll('input[type="radio"]');
        const radiosPopupArray = Array.from(radiosPopup);
        const radioSelecionadoPopup = radiosPopupArray.find((radio) => radio.checked);
        const requisitoId = radioSelecionadoPopup.name.replace(/_radio\[\d+\]/g, '');
        atualizarPontuacao(requisitoId, radioSelecionadoPopup.value);
        modal.classList.add('invisible');
    });
}