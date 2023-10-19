import { atualizarPontuacao } from "./atualizarPontuacao.js";

export function openPopup(inputId, idModal, idButton) {
    const modal = document.getElementById(idModal);
    const closePopupButton = document.getElementById(idButton);

    modal.classList.remove('invisible');

    const closePopupHandler = () => {
        // Verifica se algum radio desse modal está selecionado
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
        atualizarPontuacao(inputId, requisitoId, radioSelecionadoPopup.value);
        modal.classList.add('invisible');

        // Remove o evento após ser acionado
        closePopupButton.removeEventListener('click', closePopupHandler);
    };

    // Adiciona o evento de clique, mas somente uma vez
    closePopupButton.addEventListener('click', closePopupHandler, { once: true });
}