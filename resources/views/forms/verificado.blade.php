

@extends('layouts.app')

@section('content')
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-12 rounded-lg shadow-lg text-lg">
      <div class="w-16 h-16 rounded-full bg-green-100 p-4 flex items-center justify-center mx-auto mb-5">
        <svg aria-hidden="true" class="w-10 h-10 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Success</span>
      </div>
      <div class="text-center">
        <h1 class="text-3xl font-bold mb-4">Email verificado</h1>
        <p class="text-gray-700">Seu email foi verificado com sucesso!</p>
        <p class="text-gray-700">
          Caso deseje retornar para a página do evento, clique no botão abaixo
        </p>
      </div>
      <div class="text-center mt-6">
        <a href="https://eventos.mpap.mp.br/" class="text-blue-500 hover:text-blue-700">Voltar para a página do evento</a>
      </div>
    </div>
  </div>
@endsection
