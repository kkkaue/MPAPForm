@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-xs">
        <form method="POST" action="{{ route('password.update') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">
                    {{ __('E-Mail Address') }}
                </label>
                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="password">
                    {{ __('Password') }}
                </label>
                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="password-confirm">
                    {{ __('Confirm Password') }}
                </label>
                <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
