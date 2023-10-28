import { adicionarNovoInput } from "./adicionarDocumento.js";
import { atualizarNomeArquivo } from "./atualizarNomeArquivo.js";
import { atualizarPontuacao } from "./atualizarPontuacao.js";
import { ativarPopover } from "./popover.js";

const CARGOS = {
    ASSISTENTE_ADMINISTRATIVO: 1,
    ASSESSOR_JURIDICO: 2,
    ASSISTENTE_SOCIAL: 3,
    PEDAGOGO: 4,
    PSICOLOGO: 5,
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
                            <label for="${requisito.id}" class="after:content-['*'] after:ml-0.5 after:text-red-500 flex items-center text-sm font-medium text-gray-500 mt-2.5">
                                ${requisito.label}
                            </label>
                        </div>
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
                                    <input type="file" name="${requisito.id}[]" id="${requisito.id}" class="hidden">
                                </div>
                            </div>
                        </div>`;
                }
                else {
                    return `
                        <div class="sm:col-span-5 relative">
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
                            <div class="sm:col-span-5 relative">
                                <label for="${requisito.id}" class="after:content-['*'] after:ml-0.5 after:text-red-500 flex items-center text-sm font-medium text-gray-500 mt-2.5">
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
                                <input type="file" name="${requisito.id}[]" id="${requisito.id}" class="hidden">
                            </div>
                        `;
                    }
                    else {
                        return `
                        <div class="sm:col-span-5 relative">
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
                const inputs = divDocumento.querySelectorAll('input[type="file"]');
                let ultimoInput;
                    // Verifica se encontrou algum input
                    if (inputs.length > 0) {
                        // Seleciona o último input de tipo "file" no array de inputs
                        ultimoInput = inputs[inputs.length - 1];
                    }
                ultimoInput.addEventListener("change", function(event) {
                    atualizarNomeArquivo(`${requisito.id}_1`);
                    atualizarPontuacao(ultimoInput.id, requisito.id);
                    adicionarNovoInput(divDocumento, event, requisito.id);
                });
                /* ativarPopover(requisito.id); */
            } else {
                const inputDocumento = document.getElementById(`${requisito.id}`);
                inputDocumento.addEventListener("change", function() {
                    atualizarNomeArquivo(requisito.id);
                    atualizarPontuacao(inputDocumento.id, requisito.id);
                });
                /* ativarPopover(requisito.id); */
            }
        });

        if(cargoInfo.experiencias_profissionais){
            cargoInfo.experiencias_profissionais.forEach((requisito) => {
                if(!requisito.documento_unico){
                    const divDocumento = document.getElementById(`divDocumento_${requisito.id}`);
                    const inputs = divDocumento.querySelectorAll('input[type="file"]');
                    let ultimoInput;
                        // Verifica se encontrou algum input
                        if (inputs.length > 0) {
                            // Seleciona o último input de tipo "file" no array de inputs
                            ultimoInput = inputs[inputs.length - 1];
                        }
                        ultimoInput.addEventListener("change", function(event) {
                        atualizarPontuacao(ultimoInput.id, requisito.id);
                        adicionarNovoInput(divDocumento, event, requisito.id);
                    });
                    // adiciona a função que altera nome em requisitos não únicos
                    const inputDocumento = document.getElementById(`${requisito.id}_1`);
                    inputDocumento.addEventListener("change", function() {
                        atualizarNomeArquivo(`${requisito.id}_1`);
                    });
                } else {
                    // adiciona a função que altera nome em requisitos únicos
                    const inputDocumento = document.getElementById(`${requisito.id}`);
                    inputDocumento.addEventListener("change", function() {
                        atualizarNomeArquivo(requisito.id);
                        atualizarPontuacao(inputDocumento.id, requisito.id);
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
            [CARGOS.ASSISTENTE_ADMINISTRATIVO]: {
                requisitos: [
                    { label: "Certificado de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true},
                    { label: "Diploma de Graduação", id: "diploma_graduacao", documento_unico: true},
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true},
                    { label: "Cursos de curta duração - min 40h", id: "curso_curta_duracao", documento_unico: false},
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false},
                    { label: "Diploma de Mestrado (stricto sensu)", id: "diploma_mestrado", documento_unico: false},
                    { label: "Diploma de Doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false},
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false},
                ],
                experiencias_profissionais: [
                    { label: "Metodologias de Atendimento à Pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ]
            },
            [CARGOS.ASSESSOR_JURIDICO]: {
                requisitos: [
                    { label: "Certificado de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true },
                    { label: "Diploma de Graduação", id: "diploma_graduacao", documento_unico: true },
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true },
                    { label: "Cursos de curta duração - min 30h", id: "curso_curta_duracao", documento_unico: false },
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false },
                    { label: "Diploma de Mestrado (stricto sensu)", id: "diploma_mestrado", documento_unico: false },
                    { label: "Diploma de Doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false },
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false },
                ],
                experiencias_profissionais: [
                    { label: "Experiência profissional na área", id: "assessor_juridico", documento_unico: false },
                    { label: "Metodologias de Atendimento à Pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ],
            },
            [CARGOS.ASSISTENTE_SOCIAL]: {
                requisitos: [
                    { label: "Certificado de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true },
                    { label: "Diploma de Graduação", id: "diploma_graduacao", documento_unico: true },
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true },
                    { label: "Cursos de curta duração - min 30h", id: "curso_curta_duracao", documento_unico: false },
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false },
                    { label: "Diploma de Mestrado (stricto sensu)", id: "diploma_mestrado", documento_unico: false },
                    { label: "Diploma de Doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false },
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false },
                ],
                experiencias_profissionais: [
                    { label: "Sistema de Políticas Garantidoras de Direito", id: "experiencia_sistema_politicas_garantidoras_direito", documento_unico: false },
                    { label: "Metodologias de Atendimento à Pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ],
            },

            [CARGOS.PEDAGOGO]:{
                requisitos: [
                    { label: "Certificado de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true },
                    { label: "Diploma de Graduação", id: "diploma_graduacao", documento_unico: true },
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true },
                    { label: "Cursos de curta duração - min 30h", id: "curso_curta_duracao", documento_unico: false },
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false },
                    { label: "Diploma de Mestrado (stricto sensu)", id: "diploma_mestrado", documento_unico: false },
                    { label: "Diploma de Doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false },
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false },
                ],
                experiencias_profissionais: [
                    { label: "Sistema de Políticas Garantidoras de Direito", id: "experiencia_sistema_politicas_garantidoras_direito", documento_unico: false },
                    { label: "Metodologias de Atendimento à Pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ],
            },
            [CARGOS.PSICOLOGO]:{
                requisitos: [
                    { label: "Certificado de Ensino Médio", id: "certificado_ensino_medio", documento_unico: true },
                    { label: "Diploma de Graduação", id: "diploma_graduacao", documento_unico: true },
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true },
                    { label: "Cursos de curta duração - min 30h", id: "curso_curta_duracao", documento_unico: false },
                    { label: "Curso	de	especialização - min 360h (lato sensu)", id: "curso_especializacao", documento_unico: false },
                    { label: "Diploma de Mestrado (stricto sensu)", id: "diploma_mestrado", documento_unico: false },
                    { label: "Diploma de Doutorado (stricto sensu)", id: "diploma_doutorado", documento_unico: false },
                    { label: "Aprovação em concurso público de provas e títulos", id: "aprovacao_concurso", documento_unico: false },
                ],
                experiencias_profissionais: [
                    { label: "Sistema de Políticas Garantidoras de Direito", id: "experiencia_sistema_politicas_garantidoras_direito", documento_unico: false },
                    { label: "Metodologias de Atendimento à Pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ],
            },
        };

        return cargoData[cargo];
    }
});