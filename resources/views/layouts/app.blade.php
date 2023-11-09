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
  <body class="flex flex-col items-center justify-center">
    @yield('header')

    @yield('content')

    @yield('footer')
  </body>
</html>
