@extends('layouts.app')

@section('content')
<div class="container">
    <div class="auth-container">
        <h1>{{ __('Register') }}</h1>

        <div class="social-buttons">
            <a href="{{ \url('github/redirect') }}" class="btn btn-social">
                <i class="fab fa-github"></i>
                <span>
                    {{ __('auth.registerWith', ['provider' => 'Github']) }}
                </span>
            </a>
            <a href="{{ \url('google/redirect') }}" class="btn btn-social">
                <i class="fab fa-google"></i>
                <span>
                    {{ __('auth.registerWith', ['provider' => 'Google']) }}
                </span>
            </a>
        </div>

        <div class="separator">
            <span>{{ __('or') }}</span>
        </div>

        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf

            <h3>{{ __('Register using email') }}</h3>

            <div class="form-group">
                <label for="name">
                    {{ __('Name') }}

                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                </label>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">
                    {{ __('Email') }}

                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
                </label>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">
                    {{ __('Password') }}

                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">
                </label>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">
                    {{ __('Confirm Password') }}
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </form>

        <p>
            {{ __('Already have an account?') }}
            <a href="{{ \url('/login') }}">
                {{ 'Login now!' }}
            </a>
        </p>
    </div>
</div>
@endsection