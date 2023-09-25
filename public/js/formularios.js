import { adicionarNovoInput } from "./adicionarDocumento.js";
import { atualizarNomeArquivo } from "./atualizarNomeArquivo.js";
import { atualizarPontuacao } from "./atualizarPontuacao.js";
import { openPopup } from "./pop-up.js";

const CARGOS = {
    ESTAGIARIO_DIREITO: 1,
    ASSISTENTE_ADMINISTRATIVO: 2,
    ASSESSOR_JURIDICO: 3,
    ASSISTENTE_SOCIAL: 4,
    PEDAGOGO: 5,
    PSICOLOGO: 6,
};

document.addEventListener("DOMContentLoaded", function() {
    const draggableCard = document.getElementById("draggable-card");
    const cargoSelect = document.getElementById("cargo_id");
    const documentosDiv = document.getElementById("documentos_comprobatorios");

    cargoSelect.addEventListener("change", function() {
        const selectedCargo = cargoSelect.value;
        const cargoInfo = getCargoInfo(selectedCargo);

        // cria dinamicamente os inputs de documentos comprobatórios
        documentosDiv.innerHTML = `
            <div class="sm:col-span-12 flex">
                <h2 class="text-lg font-semibold text-gray-800">
                    Documentos comprobatórios - ${cargoSelect.options[cargoSelect.selectedIndex].text}
                </h2>
            </div>

            <div class="sm:col-span-12 flex items-center justify-center">
                <span class="inline-block text-base font-medium text-gray-800">
                    Documentos para análise de Curriculum Vitae
                </span>
            </div>

            ${cargoInfo.requisitos.map((requisito) => {
                if(requisito.documento_unico){
                    return `
                        <div class="sm:col-span-5 relative">
                            <label for="${requisito.id}" class="flex items-center text-sm font-medium text-gray-500 mt-2.5">
                                ${requisito.label} <button id="popover-button" class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-help-circle stroke-gray-500"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg></button>
                            </label>
                            <div class="absolute -top-56 z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-96" id="popover-content">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900">Informações sobre Upload</h3>
                                    <p>O formato deve ser em PDF com tamanho máximo de 5MB</p>
                                    <h3 class="font-semibold text-gray-900">Pontuação:</h3>
                                    <p>Revisão de Conclusão do curso (tempo restante):</p>
                                    <p> - 24 meses ou mais (2 pontos)</p>
                                    <p> - De 23 a 12 meses (1 pontos)</p>
                                    <p> - 11 meses ou menos (0.5 pontos)</p>
                                </div>
                            </div>
                        </div>
                        `
                        + (requisito.popup ? 
                            `
                            <div id="${requisito.popup.idModal}" class="fixed invisible top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
                                <!-- Div do pop-up -->
                                <div id="popup" class="bg-white p-8 rounded-lg shadow-md">
                                    <h2 class="text-xl font-medium text-gray-900"">${requisito.popup.label}</h2>
                                    <div class="flex mt-2 items-center justify-center gap-4">
                                        <div class="flex items-center">
                                            <input id="radio-1" type="radio" value="1" name="${requisito.id}_radio[0]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="radio-1" class="ml-2 text-sm text-gray-700">${requisito.popup.options[0]}</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="radio-2" type="radio" value="2" name="${requisito.id}_radio[0]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="radio-2" class="ml-2 text-sm text-gray-700">${requisito.popup.options[1]}</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="radio-3" type="radio" value="3" name="${requisito.id}_radio[0]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="radio-3" class="ml-2 text-sm text-gray-700">${requisito.popup.options[2]}</label>
                                        </div>
                                    </div>
                                    <div class="mt-5 flex justify-end gap-3">
                                        <button id="${requisito.popup.idButton}" type="button" class="flex-1 rounded-lg border border-blue-500 bg-blue-500 px-4 py-2 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                            ` 
                            : ``) + 
                        `
                        <div class="sm:col-span-4 sm:col-end-13">
                            <div>
                                <div class="flex justify-end">
                                    <div class="flex flex-row items-center w-full text-xs border border-gray-200 rounded-lg">
                                        <label for="${requisito.id}" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                                            Escolher arquivo
                                        </label>
                                        <label for="${requisito.id}" id="${requisito.id}_file_name">
                                            Nenhum arquivo selecionado
                                        </label>
                                    </div>
                                    <input type="file" name="${requisito.id}" id="${requisito.id}" class="hidden">
                                </div>
                            </div>
                        </div>`;
                }
                else {
                    return `
                        <div class="sm:col-span-5 relative">
                            <label for="${requisito.id}_1" class="flex items-center text-sm font-medium text-gray-500 mt-2.5">
                                ${requisito.label} <button id="popover-button" class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-help-circle stroke-gray-500"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg></button>
                            </label>
                            <div class="absolute -top-56 z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-96" id="popover-content">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900">Informações sobre Upload</h3>
                                    <p>O formato deve ser em PDF com tamanho máximo de 5MB</p>
                                    <h3 class="font-semibold text-gray-900">Pontuação:</h3>
                                    <p>Revisão de Conclusão do curso (tempo restante):</p>
                                    <p> - 24 meses ou mais (2 pontos)</p>
                                    <p> - De 23 a 12 meses (1 pontos)</p>
                                    <p> - 11 meses ou menos (0.5 pontos)</p>
                                </div>
                            </div>
                        </div>
                        `
                        + (requisito.popup ? 
                            `
                            <div id="${requisito.popup.idModal}" class="fixed invisible top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
                                <!-- Div do pop-up -->
                                <div id="popup" class="bg-white p-8 rounded-lg shadow-md">
                                    <h2 class="text-xl font-medium text-gray-900"">${requisito.popup.label}</h2>
                                    <div class="flex mt-2 items-center justify-center gap-4">
                                        <div class="flex items-center">
                                            <input id="radio-1" type="radio" value="1" name="${requisito.id}_radio[0]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="radio-1" class="ml-2 text-sm text-gray-700">${requisito.popup.options[0]}</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="radio-2" type="radio" value="2" name="${requisito.id}_radio[0]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="radio-2" class="ml-2 text-sm text-gray-700">${requisito.popup.options[1]}</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="radio-3" type="radio" value="3" name="${requisito.id}_radio[0]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                                            <label for="radio-3" class="ml-2 text-sm text-gray-700">${requisito.popup.options[2]}</label>
                                        </div>
                                    </div>
                                    <div class="mt-5 flex justify-end gap-3">
                                        <button id="${requisito.popup.idButton}" type="button" class="flex-1 rounded-lg border border-blue-500 bg-blue-500 px-4 py-2 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                            ` 
                            : ``) + 
                        `
                        <div class="sm:col-span-4 sm:col-end-13">
                            <div id="divDocumento_${requisito.id}">
                                <div class= "flex justify-end">
                                    <div class="flex flex-row items-center w-full text-xs border border-gray-200 rounded-lg">
                                        <label for="${requisito.id}_1" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                                            Escolher arquivo
                                        </label>
                                        <label for="${requisito.id}_1" id="${requisito.id}_1_file_name">
                                            Nenhum arquivo selecionado
                                        </label>
                                    </div>
                                    <input type="file" name="${requisito.id}[]" id="${requisito.id}_1" class="hidden">
                                </div>
                            </div>
                        </div>`;
                }
            }).join("")}
        `;
        if(cargoInfo.experiencias_profissionais){
            documentosDiv.innerHTML += `
                <div class="sm:col-span-12 flex items-center justify-center">
                    <span class="inline-block text-base font-medium text-gray-800">
                        Experiência profissional
                    </span>
                </div>
                ${cargoInfo.experiencias_profissionais.map((requisito) => {
                    if(requisito.documento_unico){
                        return `
                            <div class="sm:col-span-5">
                                <label for="${requisito.id}" class="flex items-center text-sm font-medium text-gray-500 mt-2.5">
                                    ${requisito.label}
                                </label>
                            </div>
                            <div class="sm:col-span-4 sm:col-end-13 flex justify-end">
                                <div class="flex flex-row items-center w-full text-xs border border-gray-200 rounded-lg">
                                    <label for="${requisito.id}" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                                        Escolher arquivo
                                    </label>
                                    <label for="${requisito.id}" id="${requisito.id}_file_name">
                                        Nenhum arquivo selecionado
                                    </label>
                                </div>
                                <input type="file" name="${requisito.id}" id="${requisito.id}" class="hidden">
                            </div>
                        `;
                    }
                    else {
                        return `
                        <div class="sm:col-span-5">
                            <label for="${requisito.id}_1" class="flex items-center text-sm font-medium text-gray-500 mt-2.5">
                                ${requisito.label}
                            </label>
                        </div>
                        <div class="sm:col-span-4 sm:col-end-13">
                            <div id="divDocumento_${requisito.id}">
                                <div class= "flex justify-end">
                                    <div class="flex flex-row items-center w-full text-xs border border-gray-200 rounded-lg">
                                        <label for="${requisito.id}_1" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                                            Escolher arquivo
                                        </label>
                                        <label for="${requisito.id}_1" id="${requisito.id}_1_file_name">
                                            Nenhum arquivo selecionado
                                        </label>
                                    </div>
                                    <input type="file" name="${requisito.id}[]" id="${requisito.id}_1" class="hidden">
                                </div>
                            </div>
                        </div>`;
                    }
                }).join("")}
            `;
        }

        // adiciona evento de mudança nos file input de documento não único
        cargoInfo.requisitos.forEach((requisito) => {
            if(!requisito.documento_unico){
                const divDocumento = document.getElementById(`divDocumento_${requisito.id}`);
                divDocumento.addEventListener("change", function(event) {
                    adicionarNovoInput(divDocumento, event, requisito);
                    atualizarPontuacao(requisito.id);
                });
                // adiciona a função que altera nome em requisitos não únicos
                const InputDocumento = document.getElementById(`${requisito.id}_1`);
                InputDocumento.addEventListener("change", function() {
                    atualizarNomeArquivo(`${requisito.id}_1`);
                    if(requisito.popup){
                        openPopup(requisito.popup.idModal, requisito.popup.idButton);
                    }
                });
            } else {
                // adiciona a função que altera nome em requisitos únicos
                const InputDocumento = document.getElementById(`${requisito.id}`);
                InputDocumento.addEventListener("change", function() {
                    atualizarNomeArquivo(requisito.id);
                    if(requisito.popup){
                        openPopup(requisito.popup.idModal, requisito.popup.idButton);
                    }
                    atualizarPontuacao(requisito.id);
                });
            }
        });

        if(cargoInfo.experiencias_profissionais){
            cargoInfo.experiencias_profissionais.forEach((requisito) => {
                if(!requisito.documento_unico){
                    const divDocumento = document.getElementById(`divDocumento_${requisito.id}`);
                    divDocumento.addEventListener("change", function(event) {
                        adicionarNovoInput(divDocumento, event);
                        atualizarPontuacao(requisito.id);
                    });
                    // adiciona a função que altera nome em requisitos não únicos
                    const InputDocumento = document.getElementById(`${requisito.id}_1`);
                    InputDocumento.addEventListener("change", function() {
                        atualizarNomeArquivo(`${requisito.id}_1`);
                    });
                } else {
                    // adiciona a função que altera nome em requisitos únicos
                    const InputDocumento = document.getElementById(`${requisito.id}`);
                    InputDocumento.addEventListener("change", function() {
                        atualizarNomeArquivo(requisito.id);
                        atualizarPontuacao(requisito.id);
                    });
                }
            });
        }

        // se documentosDiv tiver com classe hidden, remove
        documentosDiv.classList.remove("hidden");
        // se draggableCard tiver com classe hidden, remove
        draggableCard.classList.remove("hidden");
    });

    function getCargoInfo(cargo) {
        const cargoData = {
            [CARGOS.ESTAGIARIO_DIREITO]: {
                requisitos: [
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true, popup: false},
                    { label: "Comprovante de matrícula", id: "comprovante_matricula", documento_unico: true, popup:{idModal:"comprovante_matricula_modal_1", idButton:"comprovante_matricula_button_1", label: "Quanto tempo para a conclusão do curso?", options: ["24 meses ou mais", "De 23 a 12 meses", "11 meses ou menos"]}},
                    { label: "Experiências Profissionais - Certificados ou Declarações", id: "experiencia_profissional", documento_unico: false, popup: {idModal:"experiencia_profissional_modal_1", idButton:"experiencia_profissional_button_1", label: "Quanto tempo de duração?", options: ["A partir de 06 meses", "01 a 05 meses", "Não possui"]}},
                    { label: "Trabalhos Voluntários - Certificados ou Declarações", id: "trabalho_voluntario", documento_unico: false, popup: {idModal:"trabalho_voluntario_modal_1", idButton:"trabalho_voluntario_button_1", label: "Quanto tempo de duração?", options: ["A partir de 06 meses", "01 a 05 meses", "Não possui"]}},
                ],
            },
            [CARGOS.ASSISTENTE_ADMINISTRATIVO]: {
                requisitos: [
                    { label: "Certificado de conclusão de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true},
                    { label: "Diploma de conclusão de Curso de Graduação", id: "diploma_graduacao", documento_unico: true},
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true},
                    { label: "Cursos de curta duração - min 40h", id: "curso_curta_duracao", documento_unico: false},
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false},
                    { label: "Diploma de conclusão de Curso de mestrado (stricto sensu),", id: "diploma_mestrado", documento_unico: false},
                    { label: "Diploma de conclusão de Curso de doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false},
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false},
                ],
                experiencias_profissionais: [
                    { label: "Experiência no âmbito das metodologias de atendimento à pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Experiência em Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ]
            },
            [CARGOS.ASSESSOR_JURIDICO]: {
                requisitos: [
                    { label: "Certificado de conclusão de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true },
                    { label: "Diploma de conclusão de Curso de Graduação", id: "diploma_graduacao", documento_unico: true },
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true },
                    { label: "Cursos de curta duração - min 30h", id: "curso_curta_duracao", documento_unico: false },
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false },
                    { label: "Diploma de conclusão de Curso de mestrado (stricto sensu),", id: "diploma_mestrado", documento_unico: false },
                    { label: "Diploma de conclusão de Curso de doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false },
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false },
                ],
                experiencias_profissionais: [
                    { label: "Experiência profissional na área - Certificados ou Declarações", id: "assessor_juridico", documento_unico: false },
                    { label: "Experiência no âmbito das metodologias de atendimento à pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Experiência em Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ],
            },
            [CARGOS.ASSISTENTE_SOCIAL]: {
                requisitos: [
                    { label: "Certificado de conclusão de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true },
                    { label: "Diploma de conclusão de Curso de Graduação", id: "diploma_graduacao", documento_unico: true },
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true },
                    { label: "Cursos de curta duração - min 30h", id: "curso_curta_duracao", documento_unico: false },
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false },
                    { label: "Diploma de conclusão de Curso de mestrado (stricto sensu),", id: "diploma_mestrado", documento_unico: false },
                    { label: "Diploma de conclusão de Curso de doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false },
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false },
                ],
                experiencias_profissionais: [
                    { label: "Experiência com sistema de políticas garantidoras de direito, SUAS, SUS, Educação", id: "experiencia_sistema_politicas_garantidoras_direito", documento_unico: false },
                    { label: "Experiência no âmbito das metodologias de atendimento à pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Experiência em Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ],
            },

            [CARGOS.PEDAGOGO]:{
                requisitos: [
                    { label: "Certificado de conclusão de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true },
                    { label: "Diploma de conclusão de Curso de Graduação", id: "diploma_graduacao", documento_unico: true },
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true },
                    { label: "Cursos de curta duração - min 30h", id: "curso_curta_duracao", documento_unico: false },
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false },
                    { label: "Diploma de conclusão de Curso de mestrado (stricto sensu),", id: "diploma_mestrado", documento_unico: false },
                    { label: "Diploma de conclusão de Curso de doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false },
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false },
                ],
                experiencias_profissionais: [
                    { label: "Experiência com sistema de políticas garantidoras de direito, SUAS, SUS, Educação", id: "experiencia_sistema_politicas_garantidoras_direito", documento_unico: false },
                    { label: "Experiência no âmbito das metodologias de atendimento à pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Experiência em Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ],
            },
            [CARGOS.PSICOLOGO]:{
                requisitos: [
                    { label: "Certificado de conclusão de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true },
                    { label: "Diploma de conclusão de Curso de Graduação", id: "diploma_graduacao", documento_unico: true },
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true },
                    { label: "Cursos de curta duração - min 30h", id: "curso_curta_duracao", documento_unico: false },
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false },
                    { label: "Diploma de conclusão de Curso de mestrado (stricto sensu),", id: "diploma_mestrado", documento_unico: false },
                    { label: "Diploma de conclusão de Curso de doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false },
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false },
                ],
                experiencias_profissionais: [
                    { label: "Experiência com sistema de políticas garantidoras de direito, SUAS, SUS, Educação", id: "experiencia_sistema_politicas_garantidoras_direito", documento_unico: false },
                    { label: "Experiência no âmbito das metodologias de atendimento à pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Experiência em Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ],
            },
        };

        return cargoData[cargo];
    }
});