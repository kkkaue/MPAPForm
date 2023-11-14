
@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-2">{{ __('Register') }}</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">{{ __('Name') }}</label>
                    <input id="name" type="text" class="border-2 border-gray-400 p-2 w-full rounded-lg @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="border-2 border-gray-400 p-2 w-full rounded-lg @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="border-2 border-gray-400 p-2 w-full rounded-lg @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-gray-700 font-bold mb-2">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="border-2 border-gray-400 p-2 w-full rounded-lg" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">{{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
