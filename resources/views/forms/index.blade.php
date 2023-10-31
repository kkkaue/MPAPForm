<x-layouts.main>
  <body>
    <div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
      <div class="bg-white rounded-xl shadow border p-4 sm:p-6">
        <div class="text-center mb-4">
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
          @if (Session::has('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">Sucesso!</span> {{Session::get('success')}}
              </div>
            </div>
          @endif
          @if (Session::has('error'))
          <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">Erro!</span> {{Session::get('error')}}
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
              <label for="nome" class="after:content-['*'] after:ml-0.5 after:text-red-500 inline-block text-sm font-medium text-gray-500 mt-2.5">
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
              <label for="nome_rua" class="after:content-['*'] after:ml-0.5 after:text-red-500 inline-block text-sm font-medium text-gray-500 mt-2.5">
                Genero
              </label>
            </div>

            <div class="sm:col-span-9 flex">
              <div class="flex items-center">
                <div class="flex items-center mr-3">
                    <input id="masculino" type="radio" value="masculino" name="genero" class="peer/masculino w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <label for="masculino" class="peer-checked/masculino:text-blue-600 ml-1 text-sm font-medium text-gray-500 hover:text-gray-600">Masculino</label>
                </div>
                <div class="flex items-center mr-3">
                    <input id="feminino" type="radio" value="feminino" name="genero" class="peer/feminino w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <label for="feminino" class="peer-checked/feminino:text-blue-600 ml-1 text-sm font-medium text-gray-500 hover:text-gray-600">Feminino</label>
                </div>
                <div class="flex items-center mr-3">
                    <input id="nao-binario" type="radio" value="nao-binario" name="genero" class="peer/naoBinario w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                    <label for="nao-binario" class="peer-checked/naoBinario:text-blue-600 ml-1 text-sm font-medium text-gray-500 hover:text-gray-600">Não Binário</label>
                </div>
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="nome_rua" class="after:content-['*'] after:ml-0.5 after:text-red-500 inline-block text-sm font-medium text-gray-500 mt-2.5">
                Endereço
              </label>
            </div>

            <div class="sm:col-span-9">
              <div class="sm:col-span-9">
                <div class="sm:flex">
                  <input placeholder="Av. Fab" id="nome_rua" name="nome_rua" type="text" class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                  <input placeholder="123" id="numero_rua" name="numero_rua" type="text" class="py-2 px-3 pr-5 block w-1/6 border-gray-200 shadow-sm -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                </div>
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="email" class="after:content-['*'] after:ml-0.5 after:text-red-500 inline-block text-sm font-medium text-gray-500 mt-2.5">
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
                <label for="telefone_1" class="after:content-['*'] after:ml-0.5 after:text-red-500 inline-block text-sm font-medium text-gray-500 mt-2.5">
                  Telefone
                </label>
              </div>
            </div>

            <div class="sm:col-span-9 flex gap-2">
              <div id="divContato" class="w-1/3">
                <input id="telefone_1" name="telefone_1" type="text"
                  placeholder="(__) _____-____"
                  class="telefone p-2 block w-11/12 border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
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
              <label for="curriculo_lattes" class="after:content-['*'] after:ml-0.5 after:text-red-500 inline-block text-sm font-medium text-gray-500 mt-2.5">
                Currículo Lattes
              </label>
            </div>

            <div class="sm:col-span-9">
              <input id="curriculo_lattes" name="curriculo_lattes" type="text"
                placeholder="Ex: lattes.cnpq.br/123456789"
                class="py-2 px-3 block w-1/2 border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div class="sm:col-span-3">
              <label class="after:content-['*'] after:ml-0.5 after:text-red-500 inline-block text-sm font-medium text-gray-500 mt-2.5">
                Você é portador de alguma deficiência (PCD)? Se sim, qual?
              </label>
            </div>

            <div class="sm:col-span-2 mt-5">
              <div class="flex">
                <div id="noPCD" class="flex items-center mr-3" onclick="ocultarTiposDeficiencia()">
                  <input id="nao" type="radio" value="false" name="possui-deficiencia" class="peer/nao w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="nao" class="peer-checked/nao:text-blue-600 ml-1 text-sm font-medium text-gray-500 hover:text-gray-600">Não</label>
                </div>
                <div id="isPCD" class="flex items-center" onclick="exibirTiposDeficiencia()">
                  <input id="sim" type="radio" value="true" name="possui-deficiencia" class="peer/sim w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                  <label for="sim" class="peer-checked/sim:text-blue-600 ml-1 text-sm font-medium text-gray-500 hover:text-gray-600">Sim</label>
                </div>
              </div>
            </div>
            <div class="sm:col-span-7">
              <div id="tipo-deficiencia" class="hidden py-2 px-4 border border-gray-200 rounded-md">
                <label for="nome_rua" class="inline-block mb-4 text-sm font-medium text-gray-500">
                  Nos informe qual tipo de deficiência você possui:
                </label>
                <div class="flex items-center pl-2 mb-2">
                  <input id="fisica-motora" type="checkbox" value="true" name="fisica-motora" class="peer/fisicaMotora w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                  <label for="fisica-motora" class="peer-checked/fisicaMotora:text-blue-600 ml-2 text-sm font-medium text-gray-500 hover:text-gray-600">Física/Motora</label>
                </div>
                <div class="flex items-center pl-2 mb-2">
                  <input id="auditiva" type="checkbox" value="true" name="auditiva" class="peer/auditiva w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                  <label for="auditiva" class="peer-checked/auditiva:text-blue-600 ml-2 text-sm font-medium text-gray-500 hover:text-gray-600">Auditiva</label>
                </div>
                <div class="flex items-center pl-2 mb-2">
                  <input id="visual" type="checkbox" value="true" name="visual" class="peer/visual w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                  <label for="visual" class="peer-checked/visual:text-blue-600 ml-2 text-sm font-medium text-gray-500 hover:text-gray-600">Visual</label>
                </div>
                <div class="flex items-center pl-2">
                  <input id="neurodivergencia" type="checkbox" value="true" name="neurodivergencia" class="peer/neurodivergencia w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                  <label for="neurodivergencia" class="peer-checked/neurodivergencia:text-blue-600 ml-2 text-sm font-medium text-gray-500 hover:text-gray-600">Neurodivergência</label>
                </div>
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="cargo_id" class="after:content-['*'] after:ml-0.5 after:text-red-500 inline-block text-sm font-medium text-gray-500 mt-2.5">
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
          </div>
          <div id="draggable-card" class="hidden fixed top-36 right-12 p-6 bg-white rounded-lg shadow border floating-card">
            <div class="flex flex-col items-center justify-center">
              <h2 class="text-xl font-semibold text-gray-800 mb-2 select-none">Sua pontuação parcial:</h2>
              <span id="pontuacao" class="text-4xl font-bold text-blue-500 select-none">0</span>
            </div>
            <input id="pontuacao-submit" name="pontuacao" class="hidden" type="text">
          </div>
          <button type="submit"
          class="py-3 px-4 w-full inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
          Enviar inscrição
        </button>
        </form>
      </div>
    </div>

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

    <script>
      /* função para exibir os tipos de deficiencia caso seja clicado no elemnto de id "isPCD" */
      function exibirTiposDeficiencia() {
        const isPCD = document.getElementById('isPCD');
        const tipoDeficiencia = document.getElementById('tipo-deficiencia');
        const sim = document.getElementById('sim');

        if (sim.checked) {
          tipoDeficiencia.classList.remove('hidden');
        }
      }

      function ocultarTiposDeficiencia(){
        const isPCD = document.getElementById('noPCD');
        const tipoDeficiencia = document.getElementById('tipo-deficiencia');
        const nao = document.getElementById('nao');

        if (nao.checked) {
          tipoDeficiencia.classList.add('hidden');
        }
      }
    </script>
  </body>
</x-layouts.main>