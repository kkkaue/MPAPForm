import { atualizarNomeArquivo } from "./atualizarNomeArquivo.js";

export function adicionarNovoInput(divDocumento, event) {

    const inputsDeArquivo = divDocumento.querySelectorAll('input[type="file"]');
    const ultimoInput = inputsDeArquivo[inputsDeArquivo.length - 1];
    const novoName = ultimoInput.name.replace(/\d+/, function (match) {
        return parseInt(match) + 1;
    });

    if (event.target === ultimoInput && ultimoInput.files.length > 0) {
        const novoInput = document.createElement("div");
        novoInput.innerHTML = `
            <div class="flex flex-row items-center w-10/12 text-xs border border-gray-200 rounded-lg">
                <label for="${novoName}" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                    Escolher arquivo
                </label>
                <label for="${novoName}" id="${novoName}_file_name">
                    Nenhum arquivo selecionado
                </label>
            </div>
            <input type="file" name="${novoName}" id="${novoName}" class="hidden">
        `;
        novoInput.classList.add("flex", "justify-end", "mt-2");
        novoInput.querySelector("input").addEventListener("change", function (event) {
            atualizarNomeArquivo(event.target.id);
            adicionarNovoInput(divDocumento, event);
        });
        divDocumento.appendChild(novoInput);
    }
}