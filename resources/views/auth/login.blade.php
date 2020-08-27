@extends('layouts.main')

@section('title-suffix')
    - Login
@endsection

@section('content')
    <div class="container">
        <div class="mx-auto max-w-lg">
            <h1 class="text-2xl my-2">
                {{ __('Login') }}
            </h1>
            <div class="w-full">
                <form
                    class="bg-white shadow-md rounded p-8"
                    method="POST"
                    action="{{ route('login') }}"
                >
                    @csrf
                    <div class="mb-4">
                        <label
                            for="email"
                            class="block text-gray-700 text-sm font-bold mb-2"
                        >
                            {{ __('E-Mail Address') }}
                        </label>
                        <input
                            id="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            autofocus
                        >
                        @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label
                            for="password"
                            class="block text-gray-700 text-sm font-bold mb-2"
                        >
                            {{ __('Password') }}
                        </label>
                        <div>
                            <input
                                id="password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                                type="password"
                                name="password"
                                autocomplete="current-password"
                            >
                            @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label
                            for="remember"
                            class="text-gray-700 block"
                        >
                            <input
                                class="mr-2 leading-tight"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <span class="text-sm">
                            {{ __('Remember Me') }}
                        </span>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                            {{ __('Login') }}
                        </button>

                        <a
                            href="{{ route('password.request') }}"
                            class="text-green-500 hover:text-green-700 inline-block align-baseline text-sm"
                        >
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
