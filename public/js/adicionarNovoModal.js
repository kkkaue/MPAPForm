export function adicionarNovoModal(requisito){
    const divPai = document.getElementById("documentos_comprobatorios");
    const novoModal = document.createElement("div");
    const novoIdModal = requisito.popup.idModal.replace(/\d+/, function (match) {
        return parseInt(match) + 1;
    });
    const novoIdButton = requisito.popup.idButton.replace(/\d+/, function (match) {
        return parseInt(match) + 1;
    });
    const indice = requisito.popup.idModal.match(/\d+/)[0];
    novoModal.innerHTML = 
    `
        <!-- Div do pop-up -->
        <div id="popup" class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-xl font-medium text-gray-900"">${requisito.popup.label}</h2>
            <div class="flex mt-2 items-center justify-center gap-4">
                <div class="flex items-center">
                    <input id="${novoIdModal}_radio-1" type="radio" value="1" name="${requisito.id}_radio[${indice}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="${novoIdModal}_radio-1" class="ml-2 text-sm text-gray-700">${requisito.popup.options[0]}</label>
                </div>
                <div class="flex items-center">
                    <input id="${novoIdModal}_radio-2" type="radio" value="2" name="${requisito.id}_radio[${indice}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="${novoIdModal}_radio-2" class="ml-2 text-sm text-gray-700">${requisito.popup.options[1]}</label>
                </div>
                <div class="flex items-center">
                    <input id="${novoIdModal}_radio-3" type="radio" value="3" name="${requisito.id}_radio[${indice}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <label for="${novoIdModal}_radio-3" class="ml-2 text-sm text-gray-700">${requisito.popup.options[2]}</label>
                </div>
            </div>
            <div class="mt-5 flex justify-end gap-3">
                <button id="${novoIdButton}" type="button" class="flex-1 rounded-lg border border-blue-500 bg-blue-500 px-4 py-2 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">Confirmar</button>
            </div>
        </div>
    `;
    novoModal.id = novoIdModal;
    novoModal.classList.add("fixed", "invisible", "top-0", "left-0", "w-full", "h-full", "bg-black", "bg-opacity-50", "flex", "items-center", "justify-center", "z-50");
    divPai.appendChild(novoModal);

    requisito.popup.idModal = novoIdModal;
    requisito.popup.idButton = novoIdButton;

    const novoRequisito = requisito;

    return {novoIdModal, novoIdButton, novoRequisito}
}