
@extends('layouts.app')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-20 w-auto" src="https://www.mpap.mp.br/templates/portal/images/logo-mpap.png" alt="Your Company">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Entre com sua conta da Intranet</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

            @if (session('success'))
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if (Session::has('errors'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ Session::get('errors') }}p
                </div>
            @endif
            <div>
              <label for="login" class="block text-sm font-medium leading-6 text-gray-900">Usuário da intranet</label>
              <div class="mt-2">
                <input placeholder="Ex: joao.silva" id="login" name="login" type="text" value="{{ old('login') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="senha" class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
              </div>
              <div class="mt-2">
                <input placeholder="123@senha" id="senha" name="senha" type="password" value="{{ old('senha') }}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Entrar</button>
            </div>
          </form>
        </div>
      </div>
      
@endsection
