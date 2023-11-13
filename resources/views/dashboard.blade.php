
@extends('layouts.app')

@section('content')
    {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form> --}}
    <div class="flex flex-col">
        <div class="flex flex-row justify-between">
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold">Dashboard</h1>
                <h2 class="text-xl font-bold">Bem vindo, {{ Auth::user()->name }}</h2>
            </div>
            <div class="flex flex-row">
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-1 px-3 rounded-md">Logout</a>
            </div>
        </div>
      <div class="container">
        <table id="tabela" class="min-w-full bg-white rounded-lg overflow-hidden pt-2">
          <thead class="text-white bg-indigo-600">
            <tr>
              <th class="text-left py-3 px-4 font-semibold">ID</th>
              <th class="text-left py-3 px-4 font-semibold">Nome</th>
              <th class="text-left py-3 px-4 font-semibold">CPF</th>
              <th class="text-left py-3 px-4 font-semibold">Genero</th>
              <th class="text-left py-3 px-4 font-semibold">Endereço</th>
              <th class="text-left py-3 px-4 font-semibold">Email</th>
              <th class="text-left py-3 px-4 font-semibold">Telefone</th>
              <th class="text-left py-3 px-4 font-semibold">Telefone adicional</th>
              <th class="text-left py-3 px-4 font-semibold">Curriculo Lattes</th>
              <th class="text-left py-3 px-4 font-semibold">PCD</th>
              <th class="text-left py-3 px-4 font-semibold">Pontuação</th>
              <th class="text-left py-3 px-4 font-semibold">Verificado</th>
              {{-- <th class="text-left py-3 px-4 font-semibold">Ações</th> --}}
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <!-- Linha de dados -->
            @foreach ($dados as $dado)
                <tr>
                    <td class="text-left py-3 px-4">{{ $dado->id }}</td>
                    <td class="text-left py-3 px-4">{{ $dado->nome }}</td>
                    <td class="text-left py-3 px-4">{{ $dado->cpf }}</td>
                    <td class="text-left py-3 px-4">{{ $dado->genero }}</td>
                    <td class="text-left py-3 px-4">
                        {{ $dado->nome_rua }}, {{ $dado->numero_rua }}
                    </td>
                    <td class="text-left py-3 px-4">{{ $dado->email }}</td>
                    <td class="text-left py-3 px-4">{{ $dado->telefone_1 }}</td>
                    <td class="text-left py-3 px-4">
                        @if ($dado->telefone_2)
                            {{ $dado->telefone_2 }}
                        @else
                            Não possui
                        @endif
                    </td>
                    <td class="text-left py-3 px-4">
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

                    <td class="text-left py-3 px-4">
                        @if ($dado->{'possui-deficiencia'})
                            @if ($dado->{'fisica-motora'})
                                Física/Motora
                            @endif
                            @if ($dado->auditiva)
                                , Auditiva
                            @endif
                            @if ($dado->visual)
                                , Visual
                            @endif
                            @if ($dado->neurodivergencia)
                                , Neurodivergência
                            @endif
                        @else
                            Não
                        @endif
                    </td>

                    <td class="text-left py-3 px-4">
                        @if ($dado->pontuacao)
                            {{ $dado->pontuacao }}
                        @else
                            Não possui
                        @endif
                  
                    <td class="text-left py-3 px-4">
                        @if ($dado->codigo_validacao)
                            Sim
                        @else
                            Não
                        @endif
                    </td>
                    {{-- 
                      <td class="text-left py-3 px-4">
                          <button class="bg-blue-500 text-white py-1 px-3 rounded-md">Editar</button>
                          <button class="bg-red-500 text-white py-1 px-3 rounded-md">Excluir</button>
                      </td>
                    --}}
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>  
    @endsection
    @push('scripts')
      <script>
          $(document).ready(function () {
            $('#tabela').DataTable({
              dom: 'Bfrtip',
              lengthMenu: [
                  [ 10, 25, 50, -1 ],
                  [ '10 rows', '25 rows', '50 rows', 'Show all' ]
              ],
              buttons: [
                'pageLength','excel',
              ]
              
            });
        });
      </script>
    @endpush