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
  <body>
    <header class="text-center p-5 mt-44" style="background: #124676;">
      <h1 class="text-white text-xl w-full">
        Eventos
      </h1>
    </header>
    <section class="bg-white ">
      <div class="container py-10 max-w-7xl w-full mx-auto">
          <h1 class="border-l-[5px] pl-[10px] text-2xl font-semibold text-gray-800 capitalize lg:text-3xl" style="border-color: #124676">Evento em destaque</h1>
  
          <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
              <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-md h-72 lg:h-96" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"alt="">
  
              <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                  <p class="text-sm text-blue-600 uppercase">Processo seletivo</p>
  
                  <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
                      All the features you want to know
                  </a>
  
                  <p class="mt-3 text-sm text-gray-500  md:text-sm">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure veritatis sint autem nesciunt,
                      laudantium quia tempore delect
                  </p>
  
                  <a href="#" class="inline-block mt-2 text-blue-600 underline hover:text-blue-500">Read more</a>
              </div>
          </div>
      </div>
    </section>
    <section aria-label="Related article" class="py-16 antialiased bg-white">
      <div class="py-4 max-w-7xl w-full mx-auto ">
        <h1 class="border-l-[5px] pl-[10px] text-2xl mb-8 font-semibold text-gray-800 capitalize lg:text-3xl" style="border-color: #124676">Outros Eventos</h1>
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
