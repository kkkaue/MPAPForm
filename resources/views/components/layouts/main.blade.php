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
  {{$slot}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script type="module" src="{{asset('js/formularios.js')}}"></script>
  <script type="module" src="{{asset('js/mascara.js')}}"></script>
  <script type="module" src="{{asset('js/adicionarContato.js')}}"></script>
  <script type="module" src="{{asset('js/adicionarDocumento.js')}}"></script>
  <script type="module" src="{{asset('js/atualizarNomeArquivo.js')}}"></script>
  <script type="module" src="{{asset('js/resetarPontuacao.js')}}"></script>
  <script type="module" src="{{asset('js/pop-up.js')}}"></script>
</html>