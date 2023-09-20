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
              <div id="documentos_comprobatorios" class="hidden grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t last:border-transparent border-gray-200">
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
      </body>
</html>
