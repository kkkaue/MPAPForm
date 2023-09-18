<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MPAPForms</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
          <div class="bg-white rounded-xl shadow p-4 sm:p-7">
            <div class="text-center mb-8">
              <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                Ficha de inscrição
              </h2>
              @if(Session::has('mensagem'))
                <div class="p-2 bg-green-100 rounded">
                  {{Session::get('mensagem')}}
                </div>
              @endif
            </div>
            <form id="formulario" action="{{route('form.store')}}" method="post" enctype="multipart/form-data">
              @csrf
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
                    <label for="telefone" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
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
                  <label for="cargo" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
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
              <div id="documentos_comprobatorios" class="hidden grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t last:border-transparent border-gray-200">
                
              </div>
              <div id="draggable-card" class="fixed bottom-0 right-0 m-4 p-4 bg-white shadow-lg rounded-lg floating-card">
                teste
              </div>                
              
              <!-- <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t last:border-transparent border-gray-200">
                <div class="sm:col-span-12">
                  <h2 class="text-lg font-semibold text-gray-800">
                    Links
                  </h2>
                </div>
      
                <div class="sm:col-span-3">
                  <label for="af-submit-application-linkedin-url"
                    class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                    LinkedIn URL
                  </label>
                </div>
      
                <div class="sm:col-span-9">
                  <input id="af-submit-application-linkedin-url" type="text"
                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>
      
                <div class="sm:col-span-3">
                  <label for="af-submit-application-twitter-url"
                    class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                    Twitter URL
                  </label>
                </div>
      
                <div class="sm:col-span-9">
                  <input id="af-submit-application-twitter-url" type="text"
                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>
      
                <div class="sm:col-span-3">
                  <label for="af-submit-application-github-url" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                    Github URL
                  </label>
                </div>
      
                <div class="sm:col-span-9">
                  <input id="af-submit-application-github-url" type="text"
                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>
      
                <div class="sm:col-span-3">
                  <label for="af-submit-application-portfolio-url"
                    class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                    Portfolio URL
                  </label>
                </div>
      
                <div class="sm:col-span-9">
                  <input id="af-submit-application-portfolio-url" type="text"
                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>
      
                <div class="sm:col-span-3">
                  <label for="af-submit-application-other-website"
                    class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                    Other website
                  </label>
                </div>
      
                <div class="sm:col-span-9">
                  <input id="af-submit-application-other-website" type="text"
                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>
      
                <div class="sm:col-start-4 s
                m:col-span-8">
                  <a class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                    href="../docs/index.html">
                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                      <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    Add URL
                  </a>
                </div>
              </div>
      
              <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t last:border-transparent border-gray-200">
                <div class="sm:col-span-12">
                  <h2 class="text-lg font-semibold text-gray-800">
                    Before sending your application, please let us know...
                  </h2>
                </div>
      
                <div class="sm:col-span-3">
                  <label for="af-submit-application-desired-salary"
                    class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                    Desired salary
                  </label>
                </div>
      
                <div class="sm:col-span-9">
                  <input id="af-submit-application-desired-salary" type="text"
                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>
      
                <div class="sm:col-span-3">
                  <label for="af-submit-application-available-start-date"
                    class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                    Available start date
                  </label>
                </div>
      
                <div class="sm:col-span-9">
                  <input id="af-submit-application-available-start-date" type="text"
                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500">
                </div>
              </div>
      
              <div class="py-8 first:pt-0 last:pb-0 border-t last:border-transparent border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">
                  Submit application
                </h2>
                <p class="mt-3 text-sm text-gray-600">
                  In order to contact you with future jobs that you may be interested in, we need to store your personal data.
                </p>
                <p class="mt-2 text-sm text-gray-600">
                  If you are happy for us to do so please click the checkbox below.
                </p>
      
                <div class="mt-5 flex">
                  <input type="checkbox"
                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500"
                    id="af-submit-application-privacy-check">
                  <label for="af-submit-application-privacy-check" class="text-sm text-gray-500 ml-2">Allow
                    us to process your personal information.</label>
                </div>
              </div> -->
      
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
            const card = document.getElementById('draggable-card');
            let isDragging = false;
            let initialX, initialY;
            let xOffset = 0;
            let yOffset = 0;
            
            // Evento de início do arrasto
            card.addEventListener('mousedown', (e) => {
              isDragging = true;
              initialX = e.clientX - xOffset;
              initialY = e.clientY - yOffset;
            });
            
            // Evento de arrasto
            document.addEventListener('mousemove', (e) => {
              if (!isDragging) return;
            
              const currentX = e.clientX - initialX;
              const currentY = e.clientY - initialY;
            
              xOffset = currentX;
              yOffset = currentY;
            
              card.style.transform = `translate(${currentX}px, ${currentY}px)`;
            });
            
            // Evento de soltar
            document.addEventListener('mouseup', () => {
              if (isDragging) {
                isDragging = false;
                card.style.transition = 'transform 0.3s ease'; // Adicione uma transição suave
                
                // Reposicione o card no canto superior direito após um pequeno atraso
                setTimeout(() => {
                  card.style.transform = `translate(0px, 0px)`; // Volta para o canto superior esquerdo
                  card.style.transition = ''; // Remova a transição
                }, 300); // Atraso de 300ms
              }
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
      </body>
</html>
