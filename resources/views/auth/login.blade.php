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
            <button type="button" class="btn btn-social">
                <i class="fas fa-envelope"></i>
                <span>
                    {{ __('auth.loginWith', ['provider' => 'email']) }}
                </span>
            </button>
        </div>

        <form method="POST" action="{{ route('login') }}" class="auth-form login-form">
            @csrf

            <h3 style="text-align: center;">Login using email</h3>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>

        <p>
            {{ __('No account yet?') }}
            <a href="{{ \url('/register') }}">
                {{ 'Register now' }}
            </a>
        </p>
    </div>
</div>
@endsection