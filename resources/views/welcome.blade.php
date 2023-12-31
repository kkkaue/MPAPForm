@extends('layouts.app')

@section('header')
  <header class="text-center p-5 w-full" style="background: #124676;">
    <h1 class="text-white text-xl w-full">
      Eventos
    </h1>
  </header>
@endsection

@section('content')
  <section class="bg-white">
    <div class="container py-10 max-w-7xl w-full px-20">
        <h1 class="border-l-[5px] pl-[10px] text-xl font-semibold text-gray-800 capitalize lg:text-2xl" style="border-color: #124676">Evento em destaque</h1>

        <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
          <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-md h-72 lg:h-96" src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c3R1ZHl8ZW58MHx8MHx8fDA%3D"alt="">

          <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
            <p class="text-sm text-blue-600 uppercase">Processo seletivo</p>

            <a href="{{route('form.create')}}" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
              Processo Seletivo CAVINP/MP-AP: Vagas para Equipe Multidisciplinar
            </a>

            <p class="mt-3 text-sm text-gray-500  md:text-sm">
              Participe do Processo Seletivo para a contratação temporária de uma equipe multidisciplinar no Centro de Atendimento às Vítimas Nós Pertencemos do Ministério Público do Estado do Amapá (CAVINP/MP-AP). Este é o seu caminho para fazer a diferença no apoio às vítimas de crimes e violações de direitos humanos, com foco em crimes sexuais, violência doméstica e crimes contra a vida em todo o Estado do Amapá.
            </p>

            <a href="{{route('form.create')}}" class="inline-block mt-2 text-blue-600 underline hover:text-blue-500">Faça a sua inscrição</a>
          </div>
        </div>
        <div class="px-3 mt-4">
          <h1 class="text-lg font-semibold text-gray-800 lg:text-xl">
            Detalhes do Evento:
          </h1>
          <div class="px-2">
            <dl class="divide-y divide-gray-100">
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Edital para informações detalhadas</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><a href="{{ asset('anexos/EDITAL - PROCESSO SELETIVO SIMPLIFICADO (CAVINP-2023).docx.pdf') }}" target="_blank" class="text-blue-600 underline hover:text-blue-500">EDITAL - PROCESSO SELETIVO SIMPLIFICADO (CAVINP-2023)</a></dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Período de Inscrição:</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">A inscrições iniciarão às 9:00 horas (horário de Brasília) no dia 08/11/2023 e encerrando-se às 23h59 horas (horário de Brasília) no dia 12/11/2023</dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Vagas</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Assistente Administrativo, Assessor Jurídico, Assistente Social, Pedagogo(a) e Psicólogo(a)</dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Contato para Dúvidas:</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">cavinp@mpap.mp.br</dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Upload de arquivos</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Somente serão aceitos arquivos que estejam na extensão ".pdf”. O tamanho de cada arquivo submetido deverá ser de, no máximo, 5MB (cinco Megabytes).</dd>
              </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Pontuação do Candidato (1°fase)</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                  <div class="mx-auto max-w-screen-xl px-4">
                      <!-- Start coding here -->
                      <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                          <div class="overflow-x-auto">
                              <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-gray-700 uppercase bg-gray-100">
                                  <tr>
                                      <th colspan="4" scope="col" class="px-4 py-3 text-center">Critérios e Indicadores para análise de Curriculum Vitae</th>
                                  </tr>
                                </thead>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                      <tr>
                                          <th scope="col" class="px-4 py-3">Item</th>
                                          <th scope="col" class="px-4 py-3">Diplomas e Certificados</th>
                                          <th scope="col" class="px-4 py-3">Pontuação por Item</th>
                                          <th scope="col" class="px-4 py-3">Pontuação Máxima</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr class="border-b">
                                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">01</th>
                                          <td class="px-4 py-3">Cursos de curta duração, com carga horária mínima de 40h, em área ligada ao Sistema</td>
                                          <td class="px-4 py-3">Será computado 0,25 ponto por curso.</td>
                                          <td class="px-4 py-3">0,75</td>
                                      </tr>
                                      <tr class="border-b">
                                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">02</th>
                                          <td class="px-4 py-3">Cursos de formação em práticas restaurativas e/ou em Língua Brasileira de Sinais (LIBRAS), com carga horária mínima de 36h.</td>
                                          <td class="px-4 py-3">Será computado 0,25 ponto por curso.</td>
                                          <td class="px-4 py-3">0,75</td>
                                      </tr>
                                      <tr class="border-b">
                                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">03</th>
                                          <td class="px-4 py-3">Curso	de	especialização (lato sensu), com carga horária mínima de 360 horas/aula na especialidade a que concorre, devidamente reconhecido pelo Ministério da Educação.</td>
                                          <td class="px-4 py-3">Será computado 0,5 ponto por curso de especialização (lato sensu).</td>
                                          <td class="px-4 py-3">1,50</td>
                                      </tr>
                                      <tr class="border-b">
                                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">04</th>
                                          <td class="px-4 py-3">Diploma de conclusão de Curso de mestrado (stricto sensu), na especialidade em que concorre, devidamente reconhecido pelo Ministério da Educação.</td>
                                          <td class="px-4 py-3">Será computado 0,5 ponto por curso de mestrado (stricto sensu).</td>
                                          <td class="px-4 py-3">0,50</td>
                                      </tr>
                                      <tr class="border-b">
                                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">05</th>
                                          <td class="px-4 py-3">Diploma de conclusão de Curso de doutorado (stricto sensu), na especialidade em que concorre, devidamente reconhecido pelo Ministério da Educação.</td>
                                          <td class="px-4 py-3">Serão computados 1,0 pontos por curso de doutorado (stricto sensu).</td>
                                          <td class="px-4 py-3">1,00</td>
                                      </tr>
                                      <tr class="border-b">
                                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">06</th>
                                          <td class="px-4 py-3">Aprovação em concurso público de provas e títulos, na especialidade em que concorre</td>
                                          <td class="px-4 py-3">Serão computados 0,25 pontos por aprovação em concurso.
                                          </td>
                                          <td class="px-4 py-3">0,50</td>
                                      </tr>
                                      <tr class="border-b">
                                        <tr>
                                          <th colspan="4" scope="col" class="px-4 py-3 text-center uppercase bg-gray-100 text-gray-700">Experiência profissional por área de Conhecimento</th>
                                        </tr>
                                      </tr>
                                      <tr class="border-b">
                                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">07</th>
                                          <td class="px-4 py-3">Psicologia, Assistência Social, Pedagogia, Assessor Jurídico: (sistema de políticas garantidoras de direito, SUAS, SUS, Educação e/ou em área ligada ao Sistema Penitenciário).
                                            <br>Assessor Jurídico (experiência profissional no sistema de garantia de direitos da Criança e do Adolescente (SGDCA) e/ou Instituições que atuam na defesa dos direitos e interesses da sociedade e/ou em área ligada ao Sistema Penitenciário).
                                            
                                            </td>
                                          <td class="px-4 py-3">Será computado 0,25 ponto por semestre de experiência.</td>
                                          <td class="px-4 py-3">2,50</td>
                                      </tr>
                                      <tr class="border-b">
                                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">08</th>
                                        <td class="px-4 py-3">Experiência na elaboração, coordenação e/ou execução de atividades e/ou pesquisas no âmbito das metodologias de atendimento à pessoa.</td>
                                        <td class="px-4 py-3">Será computado 0,25 ponto por semestre de experiência.</td>
                                        <td class="px-4 py-3">1,50</td>
                                    </tr>
                                    <tr class="border-b">
                                      <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">09</th>
                                      <td class="px-4 py-3">Experiência em justiça restaurativa e/ou atendimentos em Língua Brasileira de Sinais (LIBRAS).</td>
                                      <td class="px-4 py-3">Será computado 0,25 ponto por semestre de experiência.</td>
                                      <td class="px-4 py-3">1,00</td>
                                    </tr>
                                    <tr class="text-gray-700 uppercase bg-gray-100">
                                      <th colspan="3" scope="col" class="px-4 py-3 text-center">TOTAL</th>
                                      <th colspan="1" scope="col" class="px-4 py-3 text-center">10,00</th>
                                    </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                </dd>
              </div>
            </dl>
          </div>
        </div>
    </div>
  </section>
  {{-- <section aria-label="Related article" class="py-16 antialiased bg-white max-w-7xl w-full">
    <div class="py-4 max-w-7xl w-full px-20">
      <h1 class="border-l-[5px] pl-[10px] text-xl mb-8 font-semibold text-gray-800 capitalize lg:text-2xl" style="border-color: #124676">Outros Eventos</h1>
      <div class="grid gap-4 grid-cols-3 px-8">
        <article class="px-auto max-w-[24rem] rounded-md border border-gray-200 bg-white shadow-md p-4 animate-pulse">
          <div class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded">
            <svg class="w-10 h-10 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/>
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
            </svg>
          </div>
          <div class="h-2.5 bg-gray-200 rounded-full mb-4"></div>
          <div class="h-2 bg-gray-200 rounded-full mb-2.5"></div>
          <div class="h-2 bg-gray-200 rounded-full mb-2.5"></div>
          <div class="h-2 bg-gray-200 rounded-full"></div>
          <div class="flex items-center mt-4 space-x-3">
            <div>
                <div class="h-2.5 bg-gray-200 rounded-full w-32 mb-2"></div>
                <div class="w-48 h-2 bg-gray-200 rounded-full"></div>
            </div>
          </div>
          <span class="sr-only">Loading...</span>
        </article>
        <article class="px-auto max-w-[24rem] rounded-md border border-gray-200 bg-white shadow-md p-4 animate-pulse">
          <div class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded">
            <svg class="w-10 h-10 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/>
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
            </svg>
          </div>
          <div class="text-center  text-gray-400 mb-2.5">Mais eventos em breve</div>
          <div class="h-2.5 bg-gray-200 rounded-full mb-4"></div>
          <div class="h-2 bg-gray-200 rounded-full mb-2.5"></div>
          <div class="h-2 bg-gray-200 rounded-full mb-2.5"></div>
          <div class="h-2 bg-gray-200 rounded-full"></div>
          <div class="flex items-center mt-4 space-x-3">
            <div>
                <div class="h-2.5 bg-gray-200 rounded-full w-32 mb-2"></div>
                <div class="w-48 h-2 bg-gray-200 rounded-full"></div>
            </div>
          </div>
          <span class="sr-only">Loading...</span>
        </article>
        <article class="px-auto max-w-[24rem] rounded-md border border-gray-200 bg-white shadow-md p-4 animate-pulse">
          <div class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded">
            <svg class="w-10 h-10 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/>
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
            </svg>
          </div>
          <div class="h-2.5 bg-gray-200 rounded-full mb-4"></div>
          <div class="h-2 bg-gray-200 rounded-full mb-2.5"></div>
          <div class="h-2 bg-gray-200 rounded-full mb-2.5"></div>
          <div class="h-2 bg-gray-200 rounded-full"></div>
          <div class="flex items-center mt-4 space-x-3">
            <div>
                <div class="h-2.5 bg-gray-200 rounded-full w-32 mb-2"></div>
                <div class="w-48 h-2 bg-gray-200 rounded-full"></div>
            </div>
          </div>
          <span class="sr-only">Loading...</span>
        </article>
      </div>
    </div>
  </section> --}}
@endsection

@section('footer')
  <footer class="bg-white py-4  text-xs max-w-7xl w-full px-20">
    <div class="justify-between flex">
      <p>Ministério Público do Estado do Amapá</p>
      <p>+55 96 3198-1600></p>
    </div>
    <div class="justify-between flex">
      <p>Rua do Araxá, S/N - Bairro do Araxá - Macapá/AP - 68.903-883</p>
      <p>procuradoria@mpap.mp.br></p>
    </div>
    <div>
      <p><strong>Encarregado pelo Tratamento de Dados Pessoais do MPAP</strong>: Promotor de Justiça Horácio Luis Bezerra Coutinho (port. 636/2021-GabPGJ) - <strong>Contato</strong>: encarregadolgpd@mpap.mp.br</p>
    </div>
  </footer>
@endsection