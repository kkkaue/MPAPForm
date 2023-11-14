
@extends('layouts.app')

@section('content')
    <div class="flex flex-col">
        {{-- <div class="flex flex-row justify-between">
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold">Dashboard</h1>
                <h2 class="text-xl font-bold">Bem vindo, {{ Auth::user()->name }}</h2>
            </div>
            <div class="flex flex-row">
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-1 px-3 rounded-md">Logout</a>
            </div>
        </div> --}}
        
    </div>

    
    <div class="bg-gray-100 w-full">
        <div class="min-h-full">
            <div class="bg-gray-800 pb-32">
                {{-- <nav class="bg-gray-800" data-headlessui-state>
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="border-b border-gray-700">
                            <div class="flex h-16 items-center justify-between px-4 sm:px-0">
                                <div class="flex items-center">
                                    <div class="shrink-0">
                                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=500" alt="Your Company">
                                    </div>
                                    <div class="hidden md:block">
                                        <div class="ml-10 flex items-baseline">
                                            <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
                                            <a href="#" class="text-gray-300 space-x-4 rounded-md px-3 py-2 text-sm font-medium hover:text-white hover:bg-gray-700 decoration-inherit">Team</a>
                                            <a href="#" class="text-gray-300 space-x-4 rounded-md px-3 py-2 text-sm font-medium hover:text-white hover:bg-gray-700">Projects</a>
                                            <a href="#" class="text-gray-300 space-x-4 rounded-md px-3 py-2 text-sm font-medium hover:text-white hover:bg-gray-700">Calendar</a>
                                            <a href="#" class="text-gray-300 space-x-4 rounded-md px-3 py-2 text-sm font-medium hover:text-white hover:bg-gray-700">Reports</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden md:block">
                                    <div class="ml-4 flex items-center md:ml-6">
                                        <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 cursor-pointer ">
                                            <span class="absolute inset-1.5"></span>
                                            <span class="sr-only">View notifications</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
                                            </svg>
                                        </button>
                                        <div class="relative ml-3" data-headlessui-state="">
                                            <div>
                                                <button class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm cursor-pointer" id="headlessui-menu-button-1" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                                                    <span class="absolute inset-1.5"></span>
                                                    <span class="sr-only">Open user menu</span>
                                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt=""></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="-mr-2 flex md:hidden">
                                    <button class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 cursor-pointer" id="headlessui-disclosure-button-2" type="button" aria-expanded="false" data-headlessui-state="">
                                        <span class="absolute -inset-0.5"></span>
                                        <span class="sr-only">Open main menu</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="block h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav> --}}
                <header class="py-10">
                    <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-white">Dashboard</h1>

                        <div class="flex justify-between mt-2">
                            <h2 class="text-xl font-bold text-white">Bem vindo, {{ session()->get('usuario.nome') }}</h2>
                            <a href="{{ route('logout') }}" class="inline-flex w-full justify-center rounded-md bg-red-600 px-4 py-3 text-lg font-medium text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Logout</a>
                        </div>
                    </div>
                </header>
            </div>
            <main class="-mt-32">
                <div class="mx-auto max-w-fullxl px-4 pb-12 sm:px-6 lg:px-8">
                    <div class="w-full rounded-lg bg-white px-5 py-6 shadow sm:px-6">
                        <div class="w-full">
                            <div class="flex items-center mb-2">
                                <form action="{{ route('dashboard') }}" method="GET">
                                    <h1 class="mr-2">
                                        Filtrar:
                                    </h1>
                                    <select name="busca" id="">
                                        <option value="2">Assistente Administrativo - CAVINP</option>
                                        <option value="3">Assessor Jurídico - CAVINP</option>
                                        <option value="4">Assistente Social</option>
                                        <option value="5">Pedagogo(a) - CAVINP</option>
                                        <option value="6">Psicólogo(a) - CAVINP</option>
                                    </select>
                                    <button class="ml-4" type="submit">
                                        filtrar
                                    </button>
                                </form>
                            </div>
                            <table id="tabela" class="w-full text-sm text-left text-gray-500 shadow-md">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 rounded-tl-lg">ID</th>
                                        <th class="px-4 py-3">Cargo</th>
                                        <th class="px-4 py-3">Nome</th>
                                        <th class="px-4 py-3">CPF</th>
                                        <th class="px-4 py-3">Genero</th>
                                        <th class="px-4 py-3">Endereço</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Telefone</th>
                                        <th class="px-4 py-3">Telefone adicional</th>
                                        <th class="px-4 py-3">Curriculo Lattes</th>
                                        <th class="px-4 py-3">PCD</th>
                                        <th class="px-4 py-3">Pontuação</th>
                                        <th class="px-4 py-3 rounded-tr-lg">Verificado</th>
                                        <th class="px-4 py-3 rounded-tr-lg">Anexos</th>
                                        {{-- <th class="px-4 py-3">Ações</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Linha de dados -->
                                    @php
                                        $incremental = 1;
                                    @endphp
                                    @foreach ($dados as $dado)
                                        <tr class="border-b bg-white hover:bg-gray-100" >
                                            <td class="font-medium text-gray-900 px-4 py-2" style="vertical-align: top !important;">{{ $incremental++ }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">{{$dado->cargo->nome}}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">{{ $dado->nome }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">{{ $dado->cpf }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">{{ $dado->genero }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">
                                                {{ $dado->nome_rua }}, {{ $dado->numero_rua }}
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">{{ $dado->email }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">{{ $dado->telefone_1 }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">
                                                @if ($dado->telefone_2)
                                                    {{ $dado->telefone_2 }}
                                                @else
                                                    Não possui
                                                @endif
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">
                                                @if (Str::startsWith($dado->curriculo_lattes, 'http://lattes.cnpq.br'))
                                                    <a href="{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">Acessar</a>
                                                @elseif (Str::startsWith($dado->curriculo_lattes, 'https://lattes.cnpq.br'))
                                                    <a href="{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">Acessar</a>
                                                @elseif (Str::startsWith($dado->curriculo_lattes, 'lattes.cnpq.br'))
                                                    <a href="http://{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">Acessar</a>
                                                @elseif (ctype_digit($dado->curriculo_lattes))
                                                    <a href="http://lattes.cnpq.br/{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">Acessar</a>
                                                @else
                                                    <a href="{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">Acessar</a>
                                                @endif
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">
                                                @if ($dado->{'possui-deficiencia'})
                                                    @if ($dado->{'fisica-motora'})
                                                        Física/Motora @if($dado->auditiva), Auditiva @endif @if($dado->visual), Visual @endif @if($dado->neurodivergencia), Neurodivergência @endif
                                                    @endif
                                                @else
                                                    Não
                                                @endif
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">
                                                @if ($dado->pontuacao)
                                                    {{ $dado->pontuacao }}
                                                @else
                                                    Não possui
                                                @endif
                                        
                                            <td class="font-medium text-gray-900 px-4 py-2 whitespace-nowrap" style="vertical-align: top !important;">
                                                @if ($dado->codigo_validacao)
                                                    Sim
                                                @else
                                                    Não
                                                @endif
                                            </td>
                                            <td style="width: 30% !important;vertical-align: top !important;">
                                                {{-- verificar os arquivos da model Anexo que tem o formulario_id igual ao $dado->id --}}
                                                @foreach($dado->anexos as $anexo)
                                                <div style="display: inline-block;">
                                                    <a href="{{ $anexo->arquivo }}" class="text-blue-500 hover:text-blue-800"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg></a>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="bg-white rounded-lg shadow sm:flex sm:items-center sm:justify-between p-4 sm:p-6 xl:p-8 antialiased">
                <p class="mb-4 text-sm text-center text-gray-500 sm:mb-0">
                    &copy; 2023 <a href="https://www.mpap.mp.br/" class="hover:underline" target="_blank">Ministério Público do Estado do Amapá</a>
                </p>
                <div class="flex justify-center items-center space-x-1">
                    <a href="https://www.facebook.com/ministeriopublicoap/" target="_blank" data-tooltip-target="tooltip-facebook" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                        </svg>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <div id="tooltip-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        Curta-nos no Facebook
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <a href="https://x.com/MP_AP?s=20" target="_blank" data-tooltip-target="tooltip-twitter" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path fill="currentColor" d="M12.186 8.672 18.743.947h-2.927l-5.005 5.9-4.44-5.9H0l7.434 9.876-6.986 8.23h2.927l5.434-6.4 4.82 6.4H20L12.186 8.672Zm-2.267 2.671L8.544 9.515 3.2 2.42h2.2l4.312 5.719 1.375 1.828 5.731 7.613h-2.2l-4.699-6.237Z"/>
                        </svg>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <div id="tooltip-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        Follow us on Twitter
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <a href="https://www.instagram.com/mpapoficial/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank" data-tooltip-target="tooltip-instagram" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <div id="tooltip-github" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        Follow us on Intagram
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
              </div>
              </footer>
        </div>
    </div>
@endsection
    @push('scripts')
      <script>
        $(document).ready(function () {
            $('#tabela').DataTable({
                "columnDefs": [
                    { "width": "100%", "targets": 13 }
                ],
                scrollX: true,
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
                },
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 linhas', '25 linhas', '50 linhas', 'Mostrar tudo' ]
                ],
                buttons: [
                    {
                        extend: 'pageLength',
                        text: 'Mostrar mais linhas',
                        className: 'items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200',
                        init: function(api, node, config) {
                            $(node).removeClass('dt-button')
                        }
                    },
                    { 
                        extend: 'excelHtml5',
                        text: '<span class="flex"><svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>Exportar para excel</span>',
                        className: 'items-center justify-center flex-shrink-0 mb-2 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200',
                        init: function(api, node, config) {
                            $(node).removeClass('dt-button')
                        }
                    }
                ],
                
            });
        });
      </script>
    @endpush