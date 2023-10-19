import { atualizarNomeArquivo } from "./atualizarNomeArquivo.js";
import { adicionarNovoModal } from "./adicionarNovoModal.js";
import { atualizarPontuacao } from "./atualizarPontuacao.js";
import { openPopup } from "./pop-up.js";

export function adicionarNovoInput(divDocumento, event, requisitoId, requisito = null) {

    const inputsDeArquivo = divDocumento.querySelectorAll('input[type="file"]');
    const ultimoInput = inputsDeArquivo[inputsDeArquivo.length - 1];
    const novoId = ultimoInput.id.replace(/\d+/, function (match) {
        return parseInt(match) + 1;
    });
    const novoName = ultimoInput.name;

    if (event.target === ultimoInput && ultimoInput.files.length > 0) {
        const novoInput = document.createElement("div");
        novoInput.innerHTML = `
            <div class="flex flex-row items-center w-full text-xs border border-gray-200 rounded-lg">
                <label for="${novoId}" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                    Escolher arquivo
                </label>
                <label for="${novoId}" id="${novoId}_file_name">
                    Nenhum arquivo selecionado
                </label>
            </div>
            <input type="file" name="${novoName}" id="${novoId}" class="hidden">
        `;
        novoInput.classList.add("flex", "justify-end", "mt-2");
        if (requisito) {
            const novoModal = adicionarNovoModal(requisito);
            novoInput.querySelector("input").addEventListener("change", function (event) {
                openPopup(novoModal.novoIdModal, novoModal.novoIdButton);
                atualizarPontuacao(requisitoId);
                atualizarNomeArquivo(event.target.id);
                adicionarNovoInput(divDocumento, event, requisitoId, novoModal.novoRequisito);
            });
        } 
        else {
            novoInput.querySelector("input").addEventListener("change", function (event) {
                atualizarPontuacao(requisitoId);
                atualizarNomeArquivo(event.target.id);
                adicionarNovoInput(divDocumento, event, requisitoId);
            });
        }
        divDocumento.appendChild(novoInput);
    }
}