@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div>
            <div>
                <div>{{ __('Reset Password') }}</div>

                <div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div>
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}"
                                    required autocomplete="email" autofocus>

                                @error('email')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div>
                                <input id="password-confirm" type="password" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection