@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="container main-container">
        <div class="auth-pages">
            <div class="auth-left">
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>{{ __('auth.returning_customer') }}</h2>
                <div class="spacer"></div>

                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}

                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.email') }}" required autofocus>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="{{ __('auth.password_') }}" required>

                    <div class="login-container">
                        <button type="submit" class="auth-button">{{ __('nav.log_in') }}</button>
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('auth.remember_me') }}
                        </label>
                    </div>

                    <div class="spacer"></div>

                    <a href="{{ route('password.request') }}">
                        {{ __('auth.forgot_your_password') }}
                    </a>

                </form>
            </div>

            <div class="auth-right">
                <h2>{{ __('auth.new_customer') }}</h2>
                <div class="spacer"></div>
                <p><strong>{{ __('auth.save_time_now') }}</strong></p>
                <p>{{ __('auth.no_need_an_account_to_checkout') }}</p>
                <div class="spacer"></div>
                <a href="{{ route('guest-checkout.index') }}" class="auth-button-hollow">{{ __('auth.continue_as_guest') }}</a>
                <div class="spacer"></div>
                &nbsp;
                <div class="spacer"></div>
                <p><strong>{{ __('auth.save_time_later') }}</strong></p>
                <p>{{ __('auth.create_an_account_for_fast_checkout') }}</p>
                <div class="spacer"></div>
                <a href="{{ route('register') }}" class="auth-button-hollow">{{ __('auth.create_account') }}</a>

            </div>
        </div>
    </div>
@endsection
