
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
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-white">Dashboard</h1>

                        <div class="flex justify-between mt-2">
                            <h2 class="text-xl font-bold text-white">Bem vindo, {{ Auth::user()->name }}</h2>
                            <a href="{{ route('logout') }}" class="inline-flex w-full justify-center rounded-md bg-red-600 px-4 py-3 text-lg font-medium text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Logout</a>
                        </div>
                    </div>
                </header>
            </div>
            <main class="-mt-32">
                <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
                    <div class="rounded-lg bg-white px-5 py-6 shadow sm:px-6">
                        <div class="container">
                            <table id="tabela" class="w-full text-sm text-left text-gray-500 shadow-md">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 rounded-tl-lg">ID</th>
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
                                    @foreach ($dados as $dado)
                                        <tr class="border-b bg-white hover:bg-gray-100">
                                            <td class="font-medium text-gray-900 px-4 py-2">{{ $dado->id }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2">{{ $dado->nome }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2">{{ $dado->cpf }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2">{{ $dado->genero }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2">
                                                {{ $dado->nome_rua }}, {{ $dado->numero_rua }}
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2">{{ $dado->email }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2">{{ $dado->telefone_1 }}</td>
                                            <td class="font-medium text-gray-900 px-4 py-2">
                                                @if ($dado->telefone_2)
                                                    {{ $dado->telefone_2 }}
                                                @else
                                                    Não possui
                                                @endif
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2">
                                                @if (Str::startsWith($dado->curriculo_lattes, 'http'))
                                                    <a href="{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">{{ $dado->curriculo_lattes }}</a>
                                                @elseif (Str::startsWith($dado->curriculo_lattes, 'lattes.cnpq.br'))
                                                    <a href="http://{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">{{ $dado->curriculo_lattes }}</a>
                                                @elseif (ctype_digit($dado->curriculo_lattes))
                                                    <a href="http://lattes.cnpq.br/{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">{{ $dado->curriculo_lattes }}</a>
                                                @else
                                                    <a href="{{ $dado->curriculo_lattes }}" target="_blank" class="text-blue-500 hover:text-blue-800">{{ $dado->curriculo_lattes }}</a>
                                                @endif
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2">
                                                @if ($dado->{'possui-deficiencia'})
                                                    @if ($dado->{'fisica-motora'})
                                                        Física/Motora @if($dado->auditiva), Auditiva @endif @if($dado->visual), Visual @endif @if($dado->neurodivergencia), Neurodivergência @endif
                                                    @endif
                                                @else
                                                    Não
                                                @endif
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2">
                                                @if ($dado->pontuacao)
                                                    {{ $dado->pontuacao }}
                                                @else
                                                    Não possui
                                                @endif
                                        
                                            <td class="font-medium text-gray-900 px-4 py-2">
                                                @if ($dado->codigo_validacao)
                                                    Sim
                                                @else
                                                    Não
                                                @endif
                                            </td>
                                            <td class="font-medium text-gray-900 px-4 py-2">
                                                {{-- verificar os arquivos da model Anexo que tem o formulario_id igual ao $dado->id --}}
                                                @foreach ($anexos as $anexo)
                                                    @if ($anexo->formulario_id == $dado->id)
                                                        <a href="{{ $anexo->arquivo }}" class="text-blue-500 hover:text-blue-800">{{ $anexo->arquivo }}</a>
                                                    @endif
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
        </div>
    </div>
@endsection
    @push('scripts')
      <script>
        $(document).ready(function () {
            $('#tabela').DataTable({
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