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
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-orange-100">
        <div class="min-h-screen flex flex-col justify-center items-center">
            <!-- Logo -->
            <div class="h-40 w-40 mt-8">
                <img class="logo" src="https://www.mpap.mp.br/templates/portal/images/logo-mpap.png">
            </div>
        
            <!-- Card de Informações do Usuário -->
            <div class="bg-white text-center px-12 py-8 mb-10 rounded-lg shadow-md">
                <div class="mx-10 max-w-md flex flex-col gap-7">
                    <div class="flex items-center justify-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/1642/1642423.png" alt="" title="" class="w-40 h-40">
                    </div>
                    <div class="">
                        <p class="text-2xl font-semibold mb-4">Sua inscrição foi realizada com sucesso!</p>
                        <p class="text-gray-600 leading-5">Olá, {{$nome}}. Sua inscrição foi realizada com sucesso.<br> Por favor, verifique seu e-mail para a confirmação.</p>
                        
                    </div>
                    <!-- Pergunta de Confirmação de E-mail -->
                    <div>
                        <p class="text-gray-600 mb-3">Você recebeu o e-mail de confirmação?</p>
                        <a href="http://localhost:8000/validar/{{$data}}" class="bg-gray-900 text-white px-4 py-2 mb-4 rounded hover:bg-gray-800">Sim, Confirme</a>
                    </div>
                </div>
            </div>
        
            <!-- Footer -->
            <footer class="text-gray-500 text-sm mb-8">
                &copy; 2023 Sua Empresa. Todos os direitos reservados.
            </footer>
        </div>
    </body>
</html>