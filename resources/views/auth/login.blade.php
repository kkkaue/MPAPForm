
@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-2">{{ __('Login') }}</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if (session('success'))
                    <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="border border-gray-400 p-2 w-full" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="border border-gray-400 p-2 w-full" name="password" required autocomplete="current-password">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="mb-4">
                    <div class="flex items-center">
                        <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="text-gray-700 font-bold" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div> --}}

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Login') }}
                    </button>

                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.reset') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
