import { aplicarMascaraContato } from "./mascara.js"

// cria um evento que verifica se o elemento com id "botaoAdicionarContato" foi clicado e executa a função para adicionar um novo contato

if (document.getElementById("botaoAdicionarContato")) {
  document.getElementById("botaoAdicionarContato").addEventListener("click", adicionarContato);
}

/*
    Função adicionarContato que cria um novo elemento como este abaixo:
    <div class="sm:col-span-9">
        <div id="divContato" class="sm:col-span-9">
            <input id="telefone" name="telefone" type="text"
            placeholder="(__) _____-____"
            class="telefone py-2 px-3 pr-11 block w-1/3 border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
        </div>
    </div>
     
    e chama a função aplicarMascaraContato que recebe um seletor, neste caso a classe "telefone" para aplicar a máscara ao input criado

    por fim remove o botão de adicionar contato
*/

function adicionarContato() {
    // seleciona o elemento com id "divContato"
    const divContato = document.getElementById("divContato");
    // cria um elemento input
    const inputContato = document.createElement("input");
    inputContato.setAttribute("id", "telefone_2");
    inputContato.setAttribute("name", "telefone_2");
    inputContato.setAttribute("type", "text");
    inputContato.setAttribute("placeholder", "(__) _____-____");
    inputContato.classList.add("telefone");
    inputContato.classList.add("py-2");
    inputContato.classList.add("px-3");
    inputContato.classList.add("pr-11");
    inputContato.classList.add("block");
    inputContato.classList.add("w-1/3");
    inputContato.classList.add("border-gray-200");
    inputContato.classList.add("shadow-sm");
    inputContato.classList.add("rounded-lg");
    inputContato.classList.add("text-sm");
    inputContato.classList.add("focus:border-blue-500");
    inputContato.classList.add("focus:ring-blue-500");
    inputContato.classList.add("mt-1.5");

    divContato.appendChild(inputContato);
    aplicarMascaraContato(".telefone");
    document.getElementById("botaoAdicionarContato").remove();
}