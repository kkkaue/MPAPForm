import { adicionarNovoInput } from "./adicionarDocumento.js";
import { atualizarNomeArquivo } from "./atualizarNomeArquivo.js";
import { atualizarPontuacao } from "./atualizarPontuacao.js";

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
                        <div class="sm:col-span-6">
                            <label for="${requisito.id}" class="block text-sm font-medium text-gray-700">
                                ${requisito.label}
                            </label>
                        </div>
                        <div class="sm:col-span-6 sm:col-end-13 flex justify-end">
                            <div class="flex flex-row items-center w-10/12 text-xs border border-gray-200 rounded-lg">
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
                        <div class="sm:col-span-6 mb-3">
                            <label for="${requisito.id}_1" class="block text-sm font-medium text-gray-700">
                                ${requisito.label}
                            </label>
                        </div>
                        <div class="sm:col-span-6 sm:col-end-13">
                            <div id="divDocumento_${requisito.id}">
                                <div class= "flex justify-end">
                                    <div class="flex flex-row items-center w-10/12 text-xs border border-gray-200 rounded-lg">
                                        <label for="${requisito.id}_1" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                                            Escolher arquivo
                                        </label>
                                        <label for="${requisito.id}_1" id="${requisito.id}_1_file_name">
                                            Nenhum arquivo selecionado
                                        </label>
                                    </div>
                                    <input type="file" name="${requisito.id}[]" id="${requisito.id}_1" class="hidden">
                                </div>`
                                + (requisito.radio ? `
                                <div class="flex mt-2 items-center justify-end gap-4">
                                    <div class="flex items-center mb-4">
                                        <input id="radio-1" type="radio" value="1" name="${requisito.id}_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">02 anos ou mais</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input checked id="radio-2" type="radio" value="2" name="${requisito.id}_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">01 ano</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input checked id="radio-3" type="radio" value="3" name="${requisito.id}_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="radio-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Não possui</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ` : 
                        `   </div> 
                        </div>`);
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
                            <div class="sm:col-span-6">
                                <label for="${requisito.id}" class="block text-sm font-medium text-gray-700">
                                    ${requisito.label}
                                </label>
                            </div>
                            <div class="sm:col-span-6 sm:col-end-13 flex justify-end">
                                <div class="flex flex-row items-center w-10/12 text-xs border border-gray-200 rounded-lg">
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
                        <div class="sm:col-span-6 mb-3">
                            <label for="${requisito.id}_1" class="block text-sm font-medium text-gray-700">
                                ${requisito.label}
                            </label>
                        </div>
                        <div class="sm:col-span-6 sm:col-end-13">
                            <div id="divDocumento_${requisito.id}">
                                <div class= "flex justify-end">
                                    <div class="flex flex-row items-center w-10/12 text-xs border border-gray-200 rounded-lg">
                                        <label for="${requisito.id}_1" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                                            Escolher arquivo
                                        </label>
                                        <label for="${requisito.id}_1" id="${requisito.id}_1_file_name">
                                            Nenhum arquivo selecionado
                                        </label>
                                    </div>
                                    <input type="file" name="${requisito.id}[]" id="${requisito.id}_1" class="hidden">
                                </div>`
                                + (requisito.radio ? `
                                <div class="flex mt-2 items-center justify-end gap-4">
                                    <div class="flex items-center mb-4">
                                        <input id="radio-1" type="radio" value="1" name="${requisito.id}_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">02 anos ou mais</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input checked id="radio-2" type="radio" value="2" name="${requisito.id}_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">01 ano</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input checked id="radio-3" type="radio" value="3" name="${requisito.id}_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="radio-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Não possui</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ` : 
                        `   </div> 
                        </div>`);
                    }
                }).join("")}
            `;
        }

        // adiciona evento de mudança nos file input de documento não único
        cargoInfo.requisitos.forEach((requisito) => {
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
            /* Estagiário de direito */ 1: {
                requisitos: [
                    { label: "Histórico escolar", id: "historico_escolar", documento_unico: true, radio: false},
                    { label: "Comprovante de matrícula", id: "comprovante_matricula", documento_unico: true, radio: false},
                    { label: "Experiências Profissionais - Certificados ou Declarações", id: "experiencia_profissional", documento_unico: false, radio: true},
                    { label: "Trabalhos Voluntários - Certificados ou Declarações", id: "trabalho_voluntario", documento_unico: false, radio: true},
                ],
            },
            /* Assistente administrativo */ 2: {
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
                    { label: "Experiência profissional na área - Certificados ou Declarações", id: "experiencia_profissional", documento_unico: false },
                    { label: "Experiência no âmbito das metodologias de atendimento à pessoa", id: "experiencia_metodologias_atendimento", documento_unico: false },
                    { label: "Experiência em Língua Brasileira de Sinais (LIBRAS)", id: "experiencia_libras", documento_unico: false },
                ]
            },
            /* Assessor Jurídico */ 3: {
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
            /* Assistente Social */ 4: {
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

            /* Pedagogo(a) */ 5:{
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
            /* Psicólogo(a) */ 6:{
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