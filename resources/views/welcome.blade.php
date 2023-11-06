<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eventos</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://www.mpap.mp.br/templates/portal/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <header class="text-center p-5" style="background: #124676;">
      <h1 class="text-white text-xl w-full">
        Eventos
      </h1>
    </header>
    <section class="bg-white ">
      <div class="container py-10 max-w-7xl w-full mx-auto">
          <h1 class="border-l-[5px] pl-[10px] text-xl font-semibold text-gray-800 capitalize lg:text-2xl" style="border-color: #124676">Evento em destaque</h1>
  
          <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-md h-72 lg:h-96" src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&q=60&w=500&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c3R1ZHl8ZW58MHx8MHx8fDA%3D"alt="">

            <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
              <p class="text-sm text-blue-600 uppercase">Processo seletivo</p>

              <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
                Processo Seletivo CAVINP/MP-AP: Vagas para Equipe Multidisciplinar
              </a>

              <p class="mt-3 text-sm text-gray-500  md:text-sm">
                Participe do Processo Seletivo para a contratação temporária de uma equipe multidisciplinar no Centro de Atendimento às Vítimas Nós Pertencemos do Ministério Público do Estado do Amapá (CAVINP/MP-AP). Este é o seu caminho para fazer a diferença no apoio às vítimas de crimes e violações de direitos humanos, com foco em crimes sexuais, violência doméstica e crimes contra a vida em todo o Estado do Amapá.
              </p>

              <a href="#" class="inline-block mt-2 text-blue-600 underline hover:text-blue-500">Faça a sua inscrição</a>
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
                  <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><a href="" class="text-blue-600 underline hover:text-blue-500">EDITAL - PROCESSO SELETIVO SIMPLIFICADO (CAVINP-2023)</a></dd>
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
                                            <td class="px-4 py-3">1,5</td>
                                        </tr>
                                        <tr class="border-b">
                                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">04</th>
                                            <td class="px-4 py-3">Diploma de conclusão de Curso de mestrado (stricto sensu), na especialidade em que concorre, devidamente reconhecido pelo Ministério da Educação.</td>
                                            <td class="px-4 py-3">Será computado 0,5 ponto por curso de mestrado (stricto sensu).</td>
                                            <td class="px-4 py-3">0,5</td>
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
                                            <td class="px-4 py-3">0,5</td>
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
                                            <td class="px-4 py-3">2,5</td>
                                        </tr>
                                        <tr class="border-b">
                                          <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">08</th>
                                          <td class="px-4 py-3">Experiência na elaboração, coordenação e/ou execução de atividades e/ou pesquisas no âmbito das metodologias de atendimento à pessoa.</td>
                                          <td class="px-4 py-3">Será computado 0,25 ponto por semestre de experiência.</td>
                                          <td class="px-4 py-3">1,5</td>
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
    <section aria-label="Related article" class="py-16 antialiased bg-white">
      <div class="py-4 max-w-7xl w-full mx-auto ">
        <h1 class="border-l-[5px] pl-[10px] text-xl mb-8 font-semibold text-gray-800 capitalize lg:text-2xl" style="border-color: #124676">Outros Eventos</h1>
        <div class="grid gap-4 grid-cols-3">
          <article class="mx-auto max-w-[24rem] rounded-md border border-gray-200 bg-white shadow-md p-4 ">
            <a href="">
              <img class="mb-5 rounded-md" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops-2.png" alt="office laptop working">
            </a>
            <h3 class="mb-2 font-bold tracking-tight text-gray-900 text-2xl">
              <a href="#">Our first project with React</a>
            </h3>
            <p class="mb-3 text-gray-500 ">
              Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.
            </p>
            <a class="inline-flex items-center font-medium text-blue-600" href="">
              Read more
              <svg class="mt-[1px] ml-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path></svg>
            </a>
          </article>
          <article class="mx-auto max-w-[24rem] rounded-md border border-gray-200 bg-white shadow-md p-4 ">
            <a href="">
              <img class="mb-5 rounded-md" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops-2.png" alt="office laptop working">
            </a>
            <h3 class="mb-2 font-bold tracking-tight text-gray-900 text-2xl">
              <a href="#">Our first project with React</a>
            </h3>
            <p class="mb-3 text-gray-500 ">
              Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.
            </p>
            <a class="inline-flex items-center font-medium text-blue-600" href="">
              Read more
              <svg class="mt-[1px] ml-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path></svg>
            </a>
          </article>
          <article class="mx-auto max-w-[24rem] rounded-md border border-gray-200 bg-white shadow-md p-4 ">
            <a href="">
              <img class="mb-5 rounded-md" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/blog/office-laptops-2.png" alt="office laptop working">
            </a>
            <h3 class="mb-2 font-bold tracking-tight text-gray-900 text-2xl">
              <a href="#">Our first project with React</a>
            </h3>
            <p class="mb-3 text-gray-500 ">
              Over the past year, Volosoft has undergone many changes! After months of preparation and some hard work, we moved to our new office.
            </p>
            <a class="inline-flex items-center font-medium text-blue-600" href="">
              Read more
              <svg class="mt-[1px] ml-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path></svg>
            </a>
          </article>
        </div>
      </div>
    </section>
    <footer class="bg-white py-4  text-xs max-w-7xl w-full mx-auto">
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
  </body>
</html>
