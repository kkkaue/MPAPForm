
@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-xs">
        <form method="POST" action="{{ route('password.reset') }}">
            @csrf

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">
                    Endereço de E-mail
                </label>
                <input class="border-2 border-gray-400 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Digite seu endereço de e-mail">
                @error('email')
                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Enviar Link de Redefinição de Senha
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
