<x-layouts.main>
  <body>
    <div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
      <div class="bg-white rounded-xl shadow border p-4 sm:p-7">
        <div class="text-center mb-8">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
            Ficha de inscrição
          </h2>
        </div>
        <form id="formulario" action="{{route('form.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          @if ( $errors->any() )
            @foreach ( $errors->all() as $error )
              <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">Erro!</span> {{$error}}
                </div>
              </div>
            @endforeach
          @endif
          @if (Session::has('mensagem'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">Sucesso!</span> {{Session::get('mensagem')}}
              </div>
            </div>
          @endif
          <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0">
            <div class="sm:col-span-12">
              <h2 class="text-lg font-semibold text-gray-800">
                Informações pessoais
              </h2>
            </div>

            <div class="sm:col-span-3">
              <label for="nome" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Nome completo/CPF
              </label>
            </div>

            <div class="sm:col-span-9">
              <div class="sm:flex">
                <input placeholder="Digite seu nome completo" id="nome" name="nome" type="text" class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                <input placeholder="123.456.789-00" id="cpf" name="cpf" type="text" class="cpf py-2 px-3 pr-9 block w-1/3 border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="nome_rua" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Endereço
              </label>
            </div>

            <div class="sm:col-span-9">
              <div class="sm:col-span-9">
                <div class="sm:flex mb-2.5">
                  <input placeholder="Av. Fab" id="nome_rua" name="nome_rua" type="text" class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                  <input placeholder="123" id="numero_rua" name="numero_rua" type="text" class="py-2 px-3 pr-5 block w-1/6 border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                </div>
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="email" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Email
              </label>
            </div>

            <div class="sm:col-span-9">
              <input id="email" name="email" type="email"
                placeholder="Insira seu endereço de email"
                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="sm:col-span-3">
              <div class="inline-block">
                <label for="telefone_1" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                  Telefone
                </label>
              </div>
            </div>

            <div class="sm:col-span-9">
              <div id="divContato" class="sm:col-span-9">
                <input id="telefone_1" name="telefone_1" type="text"
                  placeholder="(__) _____-____"
                  class="telefone py-2 px-3 pr-11 block w-1/3 border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
              </div>

              <p id="botaoAdicionarContato" class="mt-3">
                <button type="button" class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium">
                  <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  
                    viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                  </svg>
                  Adicionar telefone
                </button>
              </p>
            </div>

            <div class="sm:col-span-3">
              <label for="curriculo_lattes" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Currículo Lattes
              </label>
            </div>

            <div class="sm:col-span-9">
              <input id="curriculo_lattes" name="curriculo_lattes" type="text"
                placeholder="Ex: http://lattes.cnpq.br/123456789"
                class="py-2 px-3 block w-1/2 border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="sm:col-span-3">
              <label for="cargo_id" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Cargo pretendido
              </label>
            </div>

            <div class="sm:col-span-9">
              <select id="cargo_id" name="cargo_id"
                  class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                  <option>Selecione uma opção</option>
                  @foreach($cargos as $key=>$value)
                  <option value="{{$key}}">{{$value}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div id="documentos_comprobatorios" class=" grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t last:border-transparent border-gray-200">
            {{-- <div class="sm:col-span-12 flex gap-4">
              <h2 class="text-lg font-semibold text-gray-800">
                Documentos comprobatórios - estagio
              </h2>
              <p class="flex text-xs items-center justify-center text-gray-800">(PDF, até 5MB)</p>
            </div>

            <div class="sm:col-span-12 flex items-center justify-center">
              <span class="inline-block text-base font-medium text-gray-800">
                Documentos para análise de Curriculum Vitae
              </span>
            </div>

            <div class="sm:col-span-5 relative">
              <label for="historico_escolar" class="flex items-center text-sm font-medium text-gray-500 mt-2.5">
                Histórico escolar <button id="popover-button" class="ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-help-circle stroke-gray-500"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg></button>
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
            
            <div id="modal" class="fixed invisible top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
              <!-- Div do pop-up -->
              <div id="popup" class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-xl font-medium text-gray-900"">Quanto tempo para a conclusão do curso?</h2>
                <div class="flex mt-2 items-center justify-center gap-4">
                  <div class="flex items-center">
                      <input id="radio-1" type="radio" value="1" name="comprovante_matricula_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                      <label for="radio-1" class="ml-2 text-sm text-gray-700">24 meses ou mais</label>
                  </div>
                  <div class="flex items-center">
                      <input id="radio-2" type="radio" value="2" name="comprovante_matricula_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                      <label for="radio-2" class="ml-2 text-sm text-gray-700">De 23 a 12 meses</label>
                  </div>
                  <div class="flex items-center">
                      <input id="radio-3" type="radio" value="3" name="comprovante_matricula_radio[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                      <label for="radio-3" class="ml-2 text-sm text-gray-700">11 meses ou menos</label>
                  </div>
                </div>
                <div class="mt-5 flex justify-end gap-3">
                  <button type="button" class="flex-1 rounded-lg border border-blue-500 bg-blue-500 px-4 py-2 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-blue-700 hover:bg-blue-700 focus:ring focus:ring-blue-200 disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300">Confirm</button>
                </div>
              </div>
            </div>

            <div class="sm:col-span-4 sm:col-end-13 flex justify-end">
              <div class="flex flex-row items-center w-full text-xs border border-gray-200 rounded-lg">
                <label for="historico_escolar" class="rounded-l-lg border-0 bg-gray-200 mr-3 py-2 px-3">
                  Escolher arquivo
                </label>
                <label for="historico_escolar" id="historico_escolar_file_name">
                  Nenhum arquivo selecionado
                </label>
              </div>
              <input type="file" name="historico_escolar" id="historico_escolar" class="hidden">
            </div>

            <div class="sm:col-span-7">
              <label for="comprovante_matricula" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Comprovante de matrícula
              </label>
            </div>

            <div class="sm:col-span-4 sm:col-end-13">
              <input type="file" name="comprovante_matricula" id="comprovante_matricula" class="block w-full ml-auto border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500
              file:border-0
              file:bg-gray-200 file:mr-4
              file:py-2 file:px-3">
            </div>

            <div class="sm:col-span-7">
              <label for="experiencia_profissional_1" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Experiências Profissionais - Certificados ou Declarações
              </label>
            </div>

            <div class="sm:col-span-4 sm:col-end-13">
              <div id="divDocumento_experiencia_profissional">
                <input type="file" name="experiencia_profissional_1" id="experiencia_profissional_1" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500
                file:border-0
                file:bg-gray-200 file:mr-4
                file:py-2 file:px-3" accept=".pdf" >
              </div>
            </div>

            <div class="sm:col-span-7">
              <label for="trabalho_voluntario_1" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                Trabalhos Voluntários - Certificados ou Declarações
              </label>
            </div>

            <div class="sm:col-span-4 sm:col-end-13">
              <div id="divDocumento_trabalho_voluntario">
                <input type="file" name="trabalho_voluntario_1" id="trabalho_voluntario_1" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500
                file:border-0
                file:bg-gray-200 file:mr-4
                file:py-2 file:px-3">
              </div>  
            </div> --}}
          </div>
          <div id="draggable-card" class="hidden fixed top-36 right-12 p-6 bg-white rounded-lg shadow border floating-card">
            <div class="flex flex-col items-center justify-center">
              <h2 class="text-xl font-semibold text-gray-800 mb-2 select-none">Sua pontuação atual:</h2>
              <span id="pontuacao" class="text-4xl font-bold text-blue-500 select-none">0.00</span>
            </div>
          </div>
          <button type="submit"
            class="py-3 px-4 w-full inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
            Enviar inscrição
          </button>
        </form>
      </div>
    </div>

    <script>
      // JavaScript para mostrar o popover com hover
      const popover = document.getElementById('popover-content');
      const popoverButton = document.getElementById('popover-button');

      popoverButton.addEventListener('mouseover', () => {
        popover.classList.remove('opacity-0', 'invisible');
      });

      popoverButton.addEventListener('mouseout', () => {
        popover.classList.add('opacity-0', 'invisible');
      });
    </script>
    <script>
      // Função para criar um card flutuante arrastável
      function createDraggableCard() {
        // Crie um card flutuante
        const card = document.getElementById('draggable-card');

        // Posição inicial do card
        let initialX;
        let initialY;

        // Posição final do card
        let xOffset = 0;
        let yOffset = 0;

        // Estado do card
        let isDragging = false;

        // Evento de clique
        card.addEventListener('mousedown', (e) => {
          initialX = e.clientX - xOffset;
          initialY = e.clientY - yOffset;
        
          isDragging = true;
        });
        
        // Evento de arrasto
        document.addEventListener('mousemove', (e) => {
          if (isDragging) {
            xOffset = e.clientX - initialX;
            yOffset = e.clientY - initialY;
        
            card.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
          }
        });
        
        // Evento de soltar e ao soltar, o card deve parar de ser arrastado e se direcionar de forma suave para o canto da tela mais proximo
        document.addEventListener('mouseup', (e) => {
          initialX = e.clientX - xOffset;
          initialY = e.clientY - yOffset;
        
          isDragging = false;
        
          xOffset = 0;
          yOffset = 0;
        
          card.style.transition = 'transform 0.3s ease';
          card.style.transform = '';
        
          setTimeout(() => {
            card.style.transition = '';
          }, 300);
        });
      }
      
      // Inicialize a função quando a página carregar
      window.addEventListener('load', createDraggableCard);
    </script>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="module" src="{{asset('js/formularios.js')}}"></script>
    <script type="module" src="{{asset('js/mascara.js')}}"></script>
    <script type="module" src="{{asset('js/adicionarContato.js')}}"></script>
    <script type="module" src="{{asset('js/adicionarDocumento.js')}}"></script>
    <script type="module" src="{{asset('js/atualizarNomeArquivo.js')}}"></script>
    <script type="module" src="{{asset('js/pop-up.js')}}"></script>
  </body>
</x-layouts.main>