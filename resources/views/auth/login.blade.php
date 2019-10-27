@extends('layouts.app')

@section('content')
<div class="container">
    <div class="auth-container">
        <h1>{{ __('Login') }}</h1>

        <div class="social-buttons">
            <a href="{{ \url('github/redirect') }}" class="btn btn-social">
                <i class="fab fa-github"></i>
                <span>
                    {{ __('auth.loginWith', ['provider' => 'Github']) }}
                </span>
            </a>
            <a href="{{ \url('google/redirect') }}" class="btn btn-social">
                <i class="fab fa-google"></i>
                <span>
                    {{ __('auth.loginWith', ['provider' => 'Google']) }}
                </span>
            </a>
        </div>

        <div class="separator">
            <span>{{ __('or') }}</span>
        </div>

        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf

            <h3>{{ __('Login using email') }}</h3>

            <div class="form-group">
                <label for="email" for="email">
                    {{ __('Email') }}

                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                </label>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" for="password">
                    {{ __('Password') }}

                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">
                </label>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <a class="forgot-password" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>

            <div class="form-group">
                <label for="remember">
                    {{ __('Remember me') }}

                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
        </form>

        <p>
            {{ __('No account yet?') }}
            <a href="{{ \url('/register') }}">
                {{ 'Register now!' }}
            </a>
        </p>
    </div>
</div>
@endsection