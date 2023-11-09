<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ficha de inscrição</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://www.mpap.mp.br/templates/portal/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="bg-orange-100">
        <div class="min-h-screen flex flex-col justify-center items-center">
            
            <!-- Card de Informações do Usuário -->
            @if($reenvio)
            <div class="bg-white text-center px-12 py-8 mb-10 rounded-lg shadow-md">
                <div class="mx-10 max-w-md flex flex-col gap-7">
                    <div class="">
                        <p class="text-gray-600 leading-5">Prezado {{$nome}}, <br>

                        Considerando instabilidades no nosso sistema de inscrição online, solicitamos que você faça uma validação dos seus dados no comprovante abaixo.
                        </p>
                        <div>
                            <a href="https://eventos.mpap.mp.br/gerar-pdf/{{$data}}" class="bg-gray-900 text-white px-4 py-2 mb-4 rounded hover:bg-gray-800">Verificar comprovante</a>
                        </div>
                        <p>
                            Caso exista alguma informação errada, favor enviar as informações corretas para suporte@mpap.mp.br ou entre em contato conosco através do telefone (96) 3198-1690.
                        </p>
                    </div>
                </div>
            </div>
            @else
            <div class="bg-white text-center px-12 py-8 mb-10 rounded-lg shadow-md">
                <div class="mx-10 max-w-md flex flex-col gap-7">
                    <div class="">
                        <p class="text-gray-600 leading-5">Olá, {{$nome}}. Sua inscrição foi realizada com sucesso.<br> Por favor, verifique seu e-mail para a confirmação.</p>
                        
                    </div>
                    <!-- Pergunta de Confirmação de E-mail -->
                    <div>
                        <p class="text-gray-600 mb-3">Você recebeu o e-mail de confirmação?</p>
                        <a href="https://eventos.mpap.mp.br/validar/{{$data}}" class="bg-gray-900 text-white px-4 py-2 mb-4 rounded hover:bg-gray-800">Sim, Confirme</a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Logo -->
            <div class="w-40 my-8">
                <img class="logo" src="https://www.mpap.mp.br/templates/portal/images/logo-mpap.png" width="150">
            </div>
        
            <!-- Footer -->
            <footer class="text-gray-500 text-sm mb-8">
                &copy; 2023 Ministério Público do Estado do Amapá. Rua do Araxá, S/N - Bairro do Araxá - Macapá/AP - 68.903-883.
            </footer>
        </div>
    </body>
</html>