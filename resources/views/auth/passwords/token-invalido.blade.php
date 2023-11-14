@extends('layouts.app')

@section('content')
  {{-- <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold mb-4">Error</h2>
      <p class="mb-4">The verification code you entered is invalid or has already been used.</p>
      <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Go back to homepage
      </a>
    </div>
  </div> --}}
  <div class="flex justify-center items-center h-screen">
    <div class="bg-white p-12 rounded-lg shadow-lg text-lg">
      <div class="w-16 h-16 rounded-full bg-red-100 p-4 flex items-center justify-center mx-auto mb-5">
        <svg class="h-10 w-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
        </svg>
        <span class="sr-only">Error</span>
      </div>
      
      <div class="text-center">
        <h1 class="text-3xl font-bold mb-4">Erro!</h1>
        <p class="text-gray-700">O token é inválido ou está expirado.</p>
      </div>
      <div class="text-center mt-6">
        <a href="{{route('login')}}" class="text-blue-500 hover:text-blue-700">Voltar para a página de login</a>
      </div>
    </div>
  </div>
@endsection
